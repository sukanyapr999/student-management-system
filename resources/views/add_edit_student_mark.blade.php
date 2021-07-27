@extends('layouts.app')

@section('title', 'Student Marks')

@section('content')
<div class="center"><h2>Student management system - {{ $action['title'] }} Student Marks</h2></div> <br>
<div>
    @if(! empty (session('form_message')))
        <div style="color:green">{{ session('form_message') }}</div>
        <br>
    @endif
    <form method="POST" action="{{ url('student-marks/store', [($studentMark->id ?? null)]) }}">
        @csrf
        @if ($action['key'] == "update") @method('PATCH') @endif
        <div class="row">
            <div class="form-group">
                <label>Student</label>
                <select name="student_id" class="form-control">
                    <option value="">Select</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ old('student_id', ($studentMark)->student_id ?? null) == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>Term</label>
                <select name="term" class="form-control">
                    <option value="">Select</option>1
                    <option value="1" {{ old('term', ($studentMark)->term ?? null) == 1 ? 'selected' : '' }}>One</option>
                    <option value="2" {{ old('term', ($studentMark)->term ?? null) == 2 ? 'selected' : '' }}>Two</option>
                </select>
            </div>
        </div>
        <hr>
        <h5>Subject</h5>
        <div class="row">
            <div class="form-group">
                <label>Maths</label>
                <input type="text" class="form-control" name="maths" value="{{ old('maths', ($studentMark)->maths ?? null) }}" placeholder="Maths">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>Science</label>
                <input type="text" name="science" class="form-control" value="{{ old('science', ($studentMark)->science ?? null) }}" placeholder="Science">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>History</label>
                <input type="text" name="history" class="form-control" value="{{ old('history', ($studentMark)->history ?? null) }}" placeholder="History">
            </div>
        </div>
        <div>
            <button type="submit" class="btn-primary">Submit</button>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissable">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
    </form>
</div>

@endsection