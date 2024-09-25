@extends('index')

@section('content')
<div class="container card m-2 p-2">
    <h2>Tutorial List</h2>

    @if($tutorials->isEmpty())
        <p>No tutorials available.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student ID</th>
                    <th>Year</th>
                    <th>Subject 1</th>
                    <th>Subject 2</th>
                    <th>Subject 3</th>
                    <th>Subject 4</th>
                    <th>Subject 5</th>
                    <th>Subject 6</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tutorials as $tutorial)
                    <tr>
                        <td>{{ $tutorial->id }}</td>
                        <td>{{ $tutorial->student_id }}</td>
                        <td>{{ $tutorial->year->name ?? 'N/A' }}</td>
                        <td>{{ $tutorial->subject_one }}</td>
                        <td>{{ $tutorial->subject_two }}</td>
                        <td>{{ $tutorial->subject_three }}</td>
                        <td>{{ $tutorial->subject_four }}</td>
                        <td>{{ $tutorial->subject_five }}</td>
                        <td>{{ $tutorial->subject_six }}</td>
                        <td>
                            @if(Auth::check() && Auth::user()->role !== 'student')
                            {{-- <a href="{{ route('tutorial.show', $tutorial->id) }}" class="btn btn-info btn-sm">View</a> --}}
                            <a href="{{ route('tutorial.edit', $tutorial->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tutorial.destroy', $tutorial->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this tutorial?')">Delete</button>
                            </form>
                            @else
                            <!-- Disable or hide buttons for students -->
                            <span class="btn btn-secondary btn-sm disabled">Edit</span>
                            <span class="btn btn-secondary btn-sm disabled">Delete</span>
                        @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection
