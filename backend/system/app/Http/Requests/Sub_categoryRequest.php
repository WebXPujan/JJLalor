<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Sub_categoryRequest extends FormRequest
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
            'name'=>'required',
            'category'=>'required',
            'height'=>'required',
            'width'=>'required'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Sub Category Name is required!',
            'category.required' => 'Category  is required!',
            'image.required' => 'Image  is required!'
        ];
    }

}
