<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'title'=>'required|string',
            'number_words'=>'required|integer',
            'information'=>'required|string',
            'added_date'=>'required|date',
            'deadline'=>'required|date',
            'provider_id'=>'required|integer',
            'client_id'=>'required|integer',
            'files.*'=>'sometimes|nullable|file|mimes:jpeg,png,jpg,doc,docx,ppt,pps,pptx,xls,xlsx,pdf|max:5120',
            'files' => 'array|max_uploaded_file_size:5000',
        ];
    }
}
