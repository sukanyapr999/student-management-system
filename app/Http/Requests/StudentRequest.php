<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'          => ['required'],
            'age'           => ['required'],
            'gender'        => ['required'],
            'teacher_id'    => ['required']
        ];
    }
}
