<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StepRequest extends FormRequest
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
            'category'=>'required',
            'sub_category'=>'required',
            'step_position'=>'required',
            'step_name'=>'required',
            'cover_type'=>'required',
            'step_type'=>'required',
            
        ];
    }
}
