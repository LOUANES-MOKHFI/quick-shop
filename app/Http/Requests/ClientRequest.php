<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'fname'  => 'required|max:255|min:3',
            'lname'   => 'required|max:255|min:3',
            'email'       => 'required|max:255|min:3|email',
            'num_tlfn'    => 'required|max:14|min:9',
            'wilaya'    => 'required|min:3',
            'commune'    => 'required|min:3',
            'code_postale' => 'required|min:3'
        ];
    }
}
