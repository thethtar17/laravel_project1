@extends('index')

@section('content')
<div class="container card p-3 ">
    <h2>Create User</h2>

    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        {{--  --}}
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="position">Position:</label>
            <input type="text" class="form-control" id="position" name="position" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <textarea class="form-control" id="address" name="address" required></textarea>
        </div>

        <div class="form-group">

                <label for="role">Role</label>
                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="roleAdmin" value="admin">
                        <label class="form-check-label" for="roleAdmin">
                            Admin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="roleStudent" value="student">
                        <label class="form-check-label" for="roleStudent">
                            Student
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="roleTeacher" value="teacher" >
                        <label class="form-check-label" for="roleTeacher">
                            Teacher
                        </label>
                    </div>

            </div>


        </div>
        {{-- <div class="form-group">
            <label for="roll_number">Roll Number:</label>
            <input type="text" class="form-control" id="roll_number" name="roll_number" required>
        </div>
        <div class="form-group">
            <label for="year_id">Year</label>
            <select name="year_id" id="year_id" class="form-control" required>
                <!-- Assuming you have a collection of years, loop through them -->
               @foreach($years as $year)
                    <option value="{{ $year->id }}">{{ $year->name }}</option>
                @endforeach
            </select>
        </div> --}}

        <div class="form-group">
            <label for="roll_number">Roll Number:</label>
            <input type="text" class="form-control" id="roll_number" name="roll_number" disabled>
        </div>

        <div class="form-group">
            <label for="year_id">Year</label>
            <select name="year_id" id="year_id" class="form-control" disabled>
                @foreach($years as $year)
                    <option value="{{ $year->id }}">{{ $year->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">Profile Image:</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

</div>

@endsection
