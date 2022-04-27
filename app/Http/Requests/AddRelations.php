<?php

namespace App\Http\Requests;


class AddRelations extends ApiRequest
{
  
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'teacher_id'=>'required|integer',
            'student_id'=>'required|integer',
            'is_curator'=>'boolean'
        ];
    }
}
