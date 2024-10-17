<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryProductRequest extends FormRequest
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
    public function rules():array
    {
        return [
       
           'category_name'    => 'required',
           'product_name'     => 'required|max:40',
        //    'product_rating'   => 'required',
           'original_price'   => 'required',
           'selling_price'    => 'required',
           'discounted_price' => 'required',
           's_description'    => 'required|max:120',
           'l_description'    => 'required',
           'product_quality'  => 'required'
           
        ];
    }

    public function messages()
    {
        return  [
       
           'category_name.required'    => 'Please select category',
           'product_name.required'     => 'Please give product name',
        //    'product_rating.required'   => 'Please choose product rating',
           'original_price.required'   => 'Please give orginal price',
           'selling_price.required'    => 'Please give selling price',
           'discounted_price.required' => 'Please give discounted price',
           's_description.required'    => 'Please write a short description',
           'l_description.required'    => 'Please write a long description',
           'product_quality.required'  => 'Please choose product quality'
        ];  
    }
}
