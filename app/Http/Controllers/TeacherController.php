<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;

class TeacherController extends Controller
{	
	public function index()
    {
        $teachers = Teacher::all();

        return view('teachers', [
                'teachers'    => $teachers
            ]
        );
    }

    public function addTeacher()
    {
        return view('add_edit_teacher', [
                'action'    => ['key' => 'create', 'title'  => 'Add'],
            ]
        );
    }

    public function storeTeacher(TeacherRequest $request)
    {
        $attributes = $request->validated();
        
        if ($request->isMethod('post'))
        {
            $teacher = new Teacher();
            $teacher->name = $attributes['name'];

            $teacher->save();

            session()->flash('form_message', 'Item added successfully');

            return redirect('teachers/add');
        }
    }
}
