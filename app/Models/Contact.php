<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Contact extends Model
{
    use HasFactory;

    protected $fillable = ["civilite", "prenom", "nom","email", "date_naissance", "telephone", "adresse", "code_postal", "ville", "pays_id", "societe", "destinataire_id", "message", "newsletter", "ip_visiteur"];

    public function destinataire()
    {
        return $this->belongsTo(Destinataire::class);
    }

    public function pays()
    {
        return $this->belongsTo(Pays::class,"pays_id","pay_id");
    }

    public function nomContact(): Attribute
    {
        return Attribute::make( get: fn($value,$attributes) =>  $attributes['civilite'] ." ".$attributes['nom']." ".$attributes['prenom'] );
    }

    public function dateHumain(): Attribute
    {
        return Attribute::make( get: fn($value,$attributes) =>  Carbon::parse($attributes['created_at'])->format('d/m/Y  H\hm') );
        
    }

    public function newsletterParser(): Attribute
    {
        
        return Attribute::make( get: fn($value,$attributes) =>  isset($attributes['newsletter']) == true ? "Oui" : "Non");
        
    }

    public function destinataireParser(): Attribute
    {
        
        return Attribute::make( get: fn($value,$attributes) =>$this->destinataire()->find($attributes['destinataire_id'])->service ." (". $this->destinataire()->find($attributes['destinataire_id'])->email .")");
        
    }

    public function paysParser(): Attribute
    {
        
        return Attribute::make( get: fn($value,$attributes) => isset($attributes['pays_id']) == true ? $this->pays()->where('pay_id', '=', $attributes['pays_id'])->first()->pay_nom : null );
        
    }

    public function dateNaissance(): Attribute
    {
        
        return Attribute::make( get: fn($value,$attributes) => Carbon::parse($attributes['date_naissance'])->format('d/m/Y') );
        
    }


}



