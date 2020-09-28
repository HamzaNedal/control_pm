<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceRequest extends FormRequest
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
            'down_payment'=>'required|integer',
            'payment_method'=>'required|string|max:255',
            'provider_id'=>'required|integer',
            'file'=>'sometimes|nullable|file|mimes:jpeg,png,jpg,pdf|max:5000',
        ];
    }
}
