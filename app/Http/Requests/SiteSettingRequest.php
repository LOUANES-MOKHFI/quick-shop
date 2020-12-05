<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteSettingRequest extends FormRequest
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
            'site_name'=> 'required|max:255|min:3',
            'slegon'=> 'required|max:255|min:3',
            'site_email'=> 'required|email',
            'site_phone'=> 'required|max:14|min:10',
            'adress'=> 'required|max:255|min:3'
        ];
    }
}
