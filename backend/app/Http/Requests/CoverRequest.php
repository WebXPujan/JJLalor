<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoverRequest extends FormRequest
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
            'sub_category'=>'required',
            'cover_type'=>'required',
            'cover_type_html'=>'required',
            'cover_type_text'=>'required',            
            'photo'=>'required',            
        ];
    }
}
