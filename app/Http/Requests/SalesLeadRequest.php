<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SalesLeadRequest extends Request
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
            'full_name'=>'required',
            'position'=>'required',
            'company_name'=>'required',
            'country'=>'required',
            'email'=>'required|email|unique:users',
            'pitch_for'=>'required|integer',
            'pack'=>'required',
        ];
    }
}
