<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommandeRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'fname' => 'required|string|min:3|max:100',
            'lname' => 'required|string|min:3|max:100',
            'wilaya'=> 'required',
            'commune' => 'required|string|min:3|max:255',
            'adress' => 'required|min:3|max:255',
            'code_postale' => 'required|min:3|max:255',
            'num_tlfn' => 'required|min:3|max:255',
            'email' => 'required|email|string|min:3|max:255',
            ];
    }

     public function messages()
    {
        return [
            'required'     => 'Ce champ est obligatoire',
            'fname.string'  => 'le nom est obliger d\'étre des caractére',
            'lname.string'  => 'le prénom est obliger d\'étre des caractére',
            'commune.string'  => 'la commune est obliger d\'étre des caractére',
            'fname.max'     => 'le nom ne peut pas étre plus de 100 caractére',
            'lname.max'     => 'le nom ne peut pas étre plus de 100 caractére',
            'adress.max'   => ' ce champ ne peut pas depasser 255 caractere',
            'email.email' => 'cette adress email n\'est plus valide ,veuillez changez votre email ',
            'num_tlfn.min'=> 'le numéro de telephone doit étre plus de 3 caractére',
            'code_postale.min'=> 'le code postale doit étre plus de 3 caractére',

            ];
    }
}
