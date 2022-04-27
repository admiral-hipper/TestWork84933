<?php
namespace App\Http\Requests;


class AddStudent extends ApiRequest
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
            'points'=>'required|between:0,100.0'
        ];
    }
   
}
