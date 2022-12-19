<?php

namespace Database\Seeders;

use App\Models\Destinataire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinataireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $destinataires = ["Directeur commercial" => "k.benani@cosmed.ma","Responsable SAV" => "h.mourad@cosmed.ma", "Responsable ressources humaines" => "a.jouda@cosmed.ma"];
        
        foreach($destinataires as $service => $email){

            $destinataire = Destinataire::where('email', $email)->first();
           
            if (!$destinataire) {
                Destinataire::create([
                    'service' => $service,
                    'email' => $email
                ]);
            }
           
        }
    }
}
