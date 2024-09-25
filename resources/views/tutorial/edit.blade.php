@extends('index')

@section('content')

<div class="container card m-2 p-2">
    <h1>Edit Tutorial</h1>

    <form action="{{ route('tutorial.update', $tutorial->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="student_id">Student ID</label>
            <input type="text" class="form-control" id="student_id" name="student_id" value="{{ $tutorial->student_id }}" required>
        </div>
        <div class="form-group">
            <select name="year_id" id="year">
                @foreach ($years as $year)
                <option value="{{$year->id}}" {{$tutorial->year_id==$year->id ? 'selected':'' }}>{{$year->name}}</option>
                @endforeach

            </select>
            {{-- <label for="year_id">Year ID</label>
            <input type="number" class="form-control" id="year_id" name="year_id" value="{{ $tutorial->year->name }}" required> --}}
        </div>
        <div class="form-group">
            <label for="subject_one">Subject One</label>
            <input type="text" class="form-control" id="subject_one" name="subject_one" value="{{ $tutorial->subject_one }}" required>
        </div>
        <div class="form-group">
            <label for="subject_two">Subject Two</label>
            <input type="text" class="form-control" id="subject_two" name="subject_two" value="{{ $tutorial->subject_two }}" required>
        </div>
        <div class="form-group">
            <label for="subject_three">Subject Three</label>
            <input type="text" class="form-control" id="subject_three" name="subject_three" value="{{ $tutorial->subject_three }}" required>
        </div>
        <div class="form-group">
            <label for="subject_four">Subject Four</label>
            <input type="text" class="form-control" id="subject_four" name="subject_four" value="{{ $tutorial->subject_four }}" required>
        </div>
        <div class="form-group">
            <label for="subject_five">Subject Five</label>
            <input type="text" class="form-control" id="subject_five" name="subject_five" value="{{ $tutorial->subject_five }}" required>
        </div>
        <div class="form-group">
            <label for="subject_six">Subject Six</label>
            <input type="text" class="form-control" id="subject_six" name="subject_six" value="{{ $tutorial->subject_six }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Tutorial</button>
    </form>
</div>


@endsection
