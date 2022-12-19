<?php

namespace App\Http\Controllers;

use App\Exports\ContactExport;
use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactRegistered as MailContactRegistered;
use App\Models\Configuration;
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

}
