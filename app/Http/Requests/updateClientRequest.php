<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class updateClientRequest extends FormRequest
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
            'name' => 'required|unique:users,name,'.$this->id,
            'email' => 'required|email|exists:users,id,delete,0|unique:users,email,'.$this->id,
            'phone' => 'required|numeric',
            'payment' => 'required|numeric',
            'words' => 'required|numeric',
        ];
    }
    



}
