<?php

namespace App\Http\Controllers;

use App\Exports\ContactExport;
use App\Mail\ContactRegistered;
use App\Models\Configuration;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use App\Models\Destinataire;
use App\Models\Pays;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {   
        $destinataire = Destinataire::all()->pluck('service','id');
        $pays = Pays::all()->pluck('pay_nom','pay_id');
        return view("contact.index",["pays" =>$pays,"destinataire"=>$destinataire]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Support\Facades\Redirect;
     */
    public function store(StoreContactRequest $request)
    {
        // ajouter destinataire_id et ip de visiteur
        $validated = $request->safe()->merge(['destinataire_id' => $request->destinataire,
                                             "ip_visiteur" => $request->ip(),
                                             "pays_id" => $request->pays
                                             ])->toArray();
        $contact= Contact::create($validated);
        if(!$this->SendContactNotification($contact)){
            // code ou message pour email pas envoyer 
                // votre code ici
        }
        return  Redirect::back()->with('message', 'message remercions');
    }

    public function SendContactNotification(Contact $contact)
    {
        try {
            $adminEmail = Configuration::firstOrFail();
            $adminEmail->email;
        } catch (\Throwable $th) {
            //  s'il n'est pas encore configuré, récupérer à partir de env file
            $adminEmail = env("MAIL_FROM_ADDRESS");
        }
       
        
        if(!$adminEmail){
            
          
        }
        try {
           return Mail::to($adminEmail)->cc($contact->destinataire->email)->send(new ContactRegistered($contact));

        } catch (\Throwable $th) {
            Log::alert("l'e-mail n'a pas été envoyé". $th);
        }
        
    }

}
