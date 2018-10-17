<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateMettingRequest extends Request
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
            'edit_meeting_time_zone'=>'required',
            'edit_meeting_date'=>'required',
            'edit_meeting_time'=>'required',
            'edit_attendent'=>'required',
        ];
    }
}
