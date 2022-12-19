<?php

namespace App\Http\Controllers;

use App\Exports\ContactExport;
use App\Http\Traits\ConfigurationTrait;
use App\Mail\ContactRegistered;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use App\Models\Destinataire;
use App\Models\Pays;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller
{
    use ConfigurationTrait;
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
            
        }
        return  Redirect::back()->with('message', 'message remercions');
    }

    // show destination
    public function show()
    {
        // eager loading contact destination 
        $contacts= Contact::with('destinataire')->paginate(25);
        return view("contact.show",["contacts"=>$contacts]);
    }

    public function SendContactNotification(Contact $contact)
    {
        $adminEmail = $this->fistOrConfigurationeMail();
        try {
           return Mail::to($adminEmail)->cc($contact->destinataire->email)->send(new ContactRegistered($contact));

        } catch (\Throwable $th) {
            Log::alert("l'e-mail n'a pas été envoyé". $th);
        }
        
    }

    // export contacts and destinataires
    public function export() 
    {
        $arrays =  Contact::select('contacts.*','destinataires.service','destinataires.email as destinataires_email')->join('destinataires', 'destinataires.id', '=', 'contacts.destinataire_id')->get()->toArray();
       
        $naming = env("APP_NAME"). "_contacts_". Carbon::now()->format('jmYhs');

        return Excel::download(new ContactExport($arrays), $naming.'.xlsx');

    }

}
