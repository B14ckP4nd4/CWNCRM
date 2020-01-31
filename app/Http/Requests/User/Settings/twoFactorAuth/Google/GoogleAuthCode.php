<?php

namespace App\Http\Requests\User\Settings\twoFactorAuth\Google;

use Illuminate\Foundation\Http\FormRequest;

class GoogleAuthCode extends FormRequest
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
            'googleAuth' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'googleAuth.required' => __('Google Authentication is require'),
        ];
    }

}
