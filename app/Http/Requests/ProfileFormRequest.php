<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $authUserId = auth()->user()->id;

        return [
            'name'     => 'required',
            'email'    => "required|email:filter|unique:users,email,{$authUserId}",
            'password' => 'nullable',
            'image'    => 'nullable|image'
        ];
    }
}
