<?php

namespace App\Http\Controllers;

use App\Http\Traits\ConfigurationTrait;
use App\Models\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ConfigurationController extends Controller
{   
    use ConfigurationTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {

        $email = $this->fistOrConfigurationeMail();
        return view("configuration.index",["email" => $email]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Support\Facades\Redirect;
     */
    public function update(Request $request)
    {   
        $request->validate([
            'email' => 'required|email'
        ]);
        $configuration = Configuration::first();

        if(!$configuration){
            Configuration::create(["email"=>$request->email]);
        }else {
            $configuration->update(["email" => $request->email]);
        }
 
        return Redirect::back()->with('alert_success', "l'enregistrement  avec succès");

    }

}
