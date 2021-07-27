<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentMarkRequest extends FormRequest
{
    public function rules()
    {
        return [
            'maths'          => ['required'],
            'science'        => ['required'],
            'history'        => ['required'],
            'term'           => ['required'],
            'student_id'     => ['required']
        ];
    }
}
