@extends('layouts.app')

@section('title', 'Students')

@section('content')
<div class="center"><h2>Student management system - Students</h2>
    <a href="{{ url('students/add') }}">( + Add New )</a>
</div><br>
<div>
    <table id="myTable">
    	<thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Reporting Teacher</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
            	<tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->teacher->name }}</td>
                    <td>
                        <a href="{{ url('students/edit', [ $student->id]) }}" data-toggle="tooltip" data-original-title="Edit">Edit</a>&nbsp;
                        <a href="{{ url('students/delete', [$student->id]) }}" class="delete-btn" data-toggle="tooltip" data-original-title="Delete">Delete</a>
                    </td>
                </tr>
            @empty
                <div >
                    <td colspan=6 class="text-center">No result</td>
                </div>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $('.delete-btn').on("click", function (e) {
            e.preventDefault();
            if (confirm('Are you sure to delete?'))
                window.location = $(this).attr('href')+'?confirm=1';
        });
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endsection