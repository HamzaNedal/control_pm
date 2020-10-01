<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class createProviderRequest extends FormRequest
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
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'payment_method' => 'required|string',
            'education_level' => 'required|string',
            'name_university' => 'required|string',
            'years_experience' => 'required|numeric',
            'subjects' => 'required',
            'country' => 'required|string',
            'whats_up' => 'required',
            'capacity_day'=>'required|numeric',
        ];
    }

}
