<?php

namespace App\Http\Requests;


class ChangeStudent extends ApiRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'teacher',
            'name'=>'string',
            'points'=>'between:0,100.0'
        ];
    }
    
}
