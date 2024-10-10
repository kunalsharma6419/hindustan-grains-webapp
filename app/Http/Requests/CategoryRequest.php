<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules():array
    {
        return [
       
            'description'     => 'required|max:60',
            'category_name'   =>'required|max:100'
        ];
    }

    public function messages()
    {
        return  [
       
            'description.required'   => 'Please write a short description',
            'category_name.required' => "Please give the category name"
        ];  
    }
}
