@extends('layouts.app')

@section('title', 'Student')

@section('content')
<div class="center"><h2>Student management system - {{ $action['title'] }} Student</h2></div>
<div>
    @if(! empty (session('form_message')))
        <div style="color:green">{{ session('form_message') }}</div>
        <br>
    @endif
    <form method="POST" action="{{ url('students/store', [($student->id ?? null)]) }}">
        @csrf
        @if ($action['key'] == "update") @method('PATCH') @endif
        <div class="row">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', ($student)->name ?? null) }}" placeholder="Name">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>Age</label>
                <input type="text" name="age" class="form-control" value="{{ old('age', ($student)->age ?? null) }}" placeholder="Age">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>Gender</label>
                <input type="text" name="gender" class="form-control" value="{{ old('gender', ($student)->gender ?? null) }}" placeholder="Gender">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>Reporting Teacher</label>
                <select name="teacher_id" class="form-control">
                    <option value="">Select</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ old('teacher_id', ($student)->teacher_id ?? null) == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                    @endforeach
                </select>
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