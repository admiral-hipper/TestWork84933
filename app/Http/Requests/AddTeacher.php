<?php

namespace App\Http\Requests;


class AddTeacher extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|string',
            'rating'=>'required|integer',
            'start_of_work'=>'required|date',
            'subject'=>'required|string'
        ];
    }
    

}
