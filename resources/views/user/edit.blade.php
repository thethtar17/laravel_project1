@extends('index')

@section('content')


<div class="container card m-2 p-2">
    <h1>Edit User</h1>

    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="password">Password (Leave blank to keep current password)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ $user->position }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
        </div>
        <div class="form-group">
            <label for="roll_number">Roll Number</label>
            <input type="text" class="form-control" id="roll_number" name="roll_number" value="{{ $user->roll_number }}" required>
        </div>
        <div class="form-group">
            <label for="year_id">Year ID</label>
            <input type="number" class="form-control" id="year_id" name="year_id" value="{{ $user->year_id }}" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" required>
        </div>
        {{-- <div class="form-group">
            <label for="role">Role</label>
            <input type="text" class="form-control" id="role" name="role" value="{{ $user->role }}" required>
        </div> --}}
        <div class="form-group">
            <label for="role">Role</label>
            <div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="roleAdmin" value="admin" {{ old('role', $user->role) == 'admin' ? 'checked' : '' }}>
                    <label class="form-check-label" for="roleAdmin">
                        Admin
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="roleStudent" value="student" {{ old('role', $user->role) == 'student' ? 'checked' : '' }}>
                    <label class="form-check-label" for="roleStudent">
                        Student
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="roleTeacher" value="teacher" {{ old('role', $user->role) == 'teacher' ? 'checked' : '' }}>
                    <label class="form-check-label" for="roleTeacher">
                        Teacher
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <div class="form-group">
            @if($user->image)
            <img src="{{ asset('storage/users/'.$user->image) }}" alt="User Image" style="width: 100px; height: 100px;">
        @else
            No Image
        @endif
        </div>
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>

@endsection
