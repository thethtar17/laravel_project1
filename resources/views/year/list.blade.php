@extends('index')

@section('content')
<div class="container card m-2 p-2">
    <h2>Year List</h2>

    @if($years->isEmpty())
        <p>No years available.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($years as $year)
                    <tr>
                        <td>{{ $year->id }}</td>
                        <td>{{ $year->name }}</td>
                        <td>
                            @if(Auth::check() && Auth::user()->role !== 'student')
                            {{-- <a href="{{ route('year.show', $year->id) }}" class="btn btn-info btn-sm">View</a> --}}
                            <a href="{{ route('year.edit', $year->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('year.destroy', $year->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this year?')">Delete</button>
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
