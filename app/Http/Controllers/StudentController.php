<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\StudentMarkRequest;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\StudentMark;

class StudentController extends Controller
{	
	public function index()
    {
        $students = Student::with('teacher')->get();

        return view('students', [
                'students'    => $students
            ]
        );
    }

    public function addStudent()
    {
        $teachers = Teacher::all();

        return view('add_edit_student', [
                'action'    => ['key' => 'create', 'title'  => 'Add'],
                'teachers'  => $teachers
            ]
        );
    }

    public function storeStudent(StudentRequest $request, $studentId = null)
    {
        $attributes = $request->validated();
        
        if ($request->isMethod('post'))
        {
            $student = new Student();
            $student->name = $attributes['name'];
            $student->age = $attributes['age'];
            $student->gender = $attributes['gender'];
            $student->teacher_id = $attributes['teacher_id'];

            $student->save();

            session()->flash('form_message', 'Item added successfully');

            return redirect('students/add');
        }
        elseif ($request->isMethod('patch'))
        {
            $student = Student::where('id', $studentId)->first();

            $student->name = $attributes['name'];
            $student->age = $attributes['age'];
            $student->gender = $attributes['gender'];
            $student->teacher_id = $attributes['teacher_id'];

            $student->save();

            session()->flash('form_message', 'Item updated successfully');

            return redirect('students/edit/'.$studentId);
        }
    }

    public function editStudent($studentId)
    {
        $student = Student::where('id', $studentId)->first();
        $teachers = Teacher::all();

        return view('add_edit_student', [
                'action'        => ['key' => 'update', 'title'  => 'Edit'],
                'student'       => $student,
                'teachers'      => $teachers
            ]
        );
    }
    
    public function deleteStudent(Request $request, $studentId = null)
    {
        if ($request->input('confirm') == "1")
        {
            $studentMark = StudentMark::where('student_id', $studentId)->first();

            $studentMark->delete();

            $student = Student::where('id', $studentId)->first();

            $student->delete();
        }
        
        return redirect('students');
    }

    public function studentMarks()
    {
        $marks = StudentMark::with('student')->get();
        
        return view('student_marks', [
                'marks'    => $marks
            ]
        );
    }

    public function addStudentMark()
    {
        $students = Student::all();

        return view('add_edit_student_mark', [
                'action'    => ['key' => 'create', 'title'  => 'Add'],
                'students'  => $students
            ]
        );
    }

    public function storeStudentMark(StudentMarkRequest $request, $studentMarkId = null)
    {
        $attributes = $request->validated();
        
        if ($request->isMethod('post'))
        {
            $studentMark = new StudentMark();
            $studentMark->maths = $attributes['maths'];
            $studentMark->science = $attributes['science'];
            $studentMark->history = $attributes['history'];
            $studentMark->student_id = $attributes['student_id'];
            $studentMark->term = $attributes['term'];

            $studentMark->save();

            session()->flash('form_message', 'Item added successfully');

            return redirect('student-marks/add');
        }
        elseif ($request->isMethod('patch'))
        {
            $studentMark = StudentMark::where('id', $studentMarkId)->first();

            $studentMark->maths = $attributes['maths'];
            $studentMark->science = $attributes['science'];
            $studentMark->history = $attributes['history'];
            $studentMark->student_id = $attributes['student_id'];
            $studentMark->term = $attributes['term'];

            $studentMark->save();

            session()->flash('form_message', 'Item updated successfully');

            return redirect('student-marks/edit/'.$studentMarkId);
        }
    }

    public function editStudentMark($studentMarkId)
    {
        $studentMark = StudentMark::where('id', $studentMarkId)->first();
        $students = Student::all();

        return view('add_edit_student_mark', [
                'action'        => ['key' => 'update', 'title'  => 'Edit'],
                'studentMark'   => $studentMark,
                'students'      => $students
            ]
        );
    }
    
    public function deleteStudentMark(Request $request, $studentMarkId = null)
    {
        if ($request->input('confirm') == "1")
        {
            $studentMark = StudentMark::where('id', $studentMarkId)->first();

            $studentMark->delete();
        }
        
        return redirect('student-marks');
    }
}
