@extends('index')

@section('content')
<div class="container card">
    <h1>User List</h1>
    {{-- @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}

    {{-- <form action="{{ route('user.index') }}" method="GET" class="mb-4">
        <div class="form-group">
            <label for="role">Role:</label>
            <select name="role" id="role" class="form-control" onchange="this.form.submit()">
                <option value="">All Roles</option>
                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="student" {{ request('role') == 'student' ? 'selected' : '' }}>Student</option>
                <option value="teacher" {{ request('role') == 'teacher' ? 'selected' : '' }}>Teacher</option>
            </select>
        </div>
    </form> --}}
    <form action="{{ route('user.index') }}" method="GET" class="mb-4">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="role">Filter by Role:</label>
                <select name="role" id="role" class="form-control" onchange="this.form.submit()">
                    <option value="">All Roles</option>
                    <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="student" {{ request('role') == 'student' ? 'selected' : '' }}>Student</option>
                    <option value="teacher" {{ request('role') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                </select>
            </div>

            @if(request('role') == 'student')
                <div class="form-group col-md-4">
                    <label for="year_id">Filter by Year:</label>
                    <select name="year_id" id="year_id" class="form-control" onchange="this.form.submit()">
                        <option value="">All Years</option>
                        @foreach($years as $year)
                            <option value="{{ $year->id }}" {{ request('year_id') == $year->id ? 'selected' : '' }}>
                                {{ $year->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Position</th>
                <th>Phone</th>
                <th class="text-nowrap">Roll Number</th>
                <th>Year</th>
                <th>Address</th>
                <th>Role</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name ?? 'N/A' }}</td>
                    <td>{{ $user->email ?? 'N/A' }}</td>

                    <td>{{ $user->position ?? 'N/A' }}</td>
                    <td>{{ $user->phone ?? 'N/A' }}</td>

                    <td>{{ $user->roll_number  ?? 'N/A'}}</td>
                    <td>{{ $user->year->name ?? 'N/A' }}</td>
                    <td>{{ $user->address ?? 'N/A' }}</td>
                    <td>{{ $user->role ?? 'N/A' }}</td>

                    <td>
                        @if($user->image)
                            <img src="{{ asset('storage/users/'.$user->image) }}" alt="User Image" style="width: 50px; height: 50px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        {{-- <!-- You can add action buttons here, like Edit and Delete -->
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> --}}
                          @if(Auth::check() && Auth::user()->role !== 'student')
                            <!-- Show edit and delete buttons only if the logged-in user is not a student -->
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
</div>

@endsection
