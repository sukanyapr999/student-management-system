@extends('layouts.app')

@section('title', 'Student Marks')

@section('content')
<div class="center"><h2>Student management system - Student Marks</h2>
    <a href="{{ url('student-marks/add') }}">( + Add New )</a>
</div>
<table id="myTable">
	<thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Maths</th>
            <th>Science</th>
            <th>History</th>
            <th>Term</th>
            <th>Total Marks</th>
            <th>Created On</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($marks as $mark)
        	<tr>
                <td>{{ $mark->id }}</td>
                <td>{{ $mark->student->name }}</td>
                <td>{{ $mark->maths }}</td>
                <td>{{ $mark->science }}</td>
                <td>{{ $mark->history }}</td>
                <td>{{ ($mark->term == 1) ? 'One' : 'Two' }}</td>
                <td>{{ $mark->maths + $mark->science + $mark->history }}</td>
                <td>{{ date('d F, Y g:i A', strtotime($mark->created_at)) }}</td>
                <td>
                    <a href="{{ url('student-marks/edit', [ $mark->id]) }}" data-toggle="tooltip" data-original-title="Edit">Edit</a>
                    <a href="{{ url('student-marks/delete', [$mark->id]) }}" class="delete-btn" data-toggle="tooltip" data-original-title="Delete">Delete</a>
                </td>
            </tr>
        @empty
            <div>
                <td colspan=9 class="text-center">No result</td>
            </div>
        @endforelse
    </tbody>
</table>
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