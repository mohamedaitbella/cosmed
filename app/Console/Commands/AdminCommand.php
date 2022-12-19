<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cosmed:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Créer un utilisateur ayant accès au backoffice Cosmed';

 
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // Créer un utilisateur
        $user = $this->getUser();

        // l'utilisateur n'est pas retourné
        if (!$user) {
            exit;
        }

        $user->save();

        $this->info("L'utilisateur a maintenant un accès complet à votre site.");
    }
    

    /**
     * Create user.
     *
     * @param bool $create
     *
     * @return \App\Models\User
     */
    protected function getUser()
    {
        
        $email = $this->ask("Entrez l'adresse e-mail de l'administrateur");
        $name = $this->ask("Entrez le nom de l'administrateur");
        $password = $this->secret('Entrez le mot de passe administrateur');
        $confirmPassword = $this->secret('Confirmez le mot de passe');
        
        // Obtenir le Model Responsable de l'authentification
        $model = Auth::guard()->getProvider()->getModel();
        $model = Str::start($model, '\\');
        // Create a new user 
       
          

        $validator = Validator::make([
            'name' => $name ,
            'email' => $email,
            'password' => $password,
            'password_confirmation' =>$confirmPassword
        ], [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required','confirmed', 'min:8'],
        ]);
    
        if ($validator->fails()) {
            $this->info("Utilisateur non créé. Voir les messages d'erreur ci-dessous :");
        
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            exit;
        }

        $this->info("Création d'un compte administrateur");

        return call_user_func($model.'::forceCreate', [
            'name'     => $name,
            'email'    => $email,
            'password' => Hash::make($password),
        ]);

    }
}
