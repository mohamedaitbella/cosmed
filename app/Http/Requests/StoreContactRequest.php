<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'civilite' => 'required|in:Monsieur,Madame,Mademoiselle',
            'prenom' => 'required|string|max:30',
            'nom' => 'required|string|max:30',
            'email' => 'required|email|max:150',
            'date_naissance' => 'nullable|date|max:10',
            'telephone' => 'nullable|string|max:50',
            'adresse' => 'nullable|string|max:150',
            'code_postal' => 'nullable|string|max:10',
            'ville' => 'nullable|string|max:50',
            'pays' => 'nullable|exists:pays,pay_id',
            'societe' => 'nullable|string|max:150',
            'destinataire' => 'required|exists:destinataires,id',
            'message' => 'required|string|max:500',
            'newsletter' => 'nullable|boolean|in:0,1',
            
        ];
    }
}
