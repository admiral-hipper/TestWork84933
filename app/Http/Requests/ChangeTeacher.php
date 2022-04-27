<?php

namespace App\Http\Requests;


class ChangeTeacher extends ApiRequest
{
   
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'string',
            'rating'=>'integer',
            'start_of_work'=>'date',
            'subject'=>'string'
        ];
    }
   
    
}
