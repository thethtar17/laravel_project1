
@extends('index')

@section('content')
<div class="container card m-2 p-lg-2">
    <h2>Create Tutorial</h2>

    <form action="{{ route('tutorial.store') }}" method="POST" class="">
        {{--  --}}
        @csrf
        <div class="form-group">
            <label for="student_id">Student ID</label>
            <input type="text" name="student_id" id="student_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="year_id">Year</label>
            <select name="year_id" id="year_id" class="form-control" required>
                <!-- Assuming you have a collection of years, loop through them -->
               @foreach($years as $year)
                    <option value="{{ $year->id }}">{{ $year->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subject_one">Subject One</label>
            <input type="text" name="subject_one" id="subject_one" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="subject_two">Subject Two</label>
            <input type="text" name="subject_two" id="subject_two" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="subject_three">Subject Three</label>
            <input type="text" name="subject_three" id="subject_three" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="subject_four">Subject Four</label>
            <input type="text" name="subject_four" id="subject_four" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="subject_five">Subject Five</label>
            <input type="text" name="subject_five" id="subject_five" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="subject_six">Subject Six</label>
            <input type="text" name="subject_six" id="subject_six" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
