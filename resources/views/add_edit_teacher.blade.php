@extends('layouts.app')

@section('title', 'Teachers')

@section('content')
<div class="center"><h2>Student management system - {{ $action['title'] }} Teachers</h2></div>
<div>
    @if(! empty (session('form_message')))
        <div style="color:green">{{ session('form_message') }}</div>
        <br>
    @endif
    <form method="POST" action="{{ url('teachers/store') }}">
        @csrf
        <div class="row">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="" placeholder="Name">
            </div>
        </div>
        <div>
            <button type="submit" class="btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection