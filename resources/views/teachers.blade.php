@extends('layouts.app')

@section('title', 'Teachers')

@section('content')
<div class="center"><h2>Student management system - Teachers</h2>
    <a href="{{ url('teachers/add') }}">( + Add New )</a>
</div>
<table id="myTable">
	<thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        @forelse($teachers as $teacher)
        	<tr>
                <td>{{ $teacher->name }}</td>
            </tr>
        @empty
            <div>
                <td colspan=1 class="text-center">No result</td>
            </div>
        @endforelse
    </tbody>
</table>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endsection