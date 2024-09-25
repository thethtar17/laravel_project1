
<!-- resources/views/events/create.blade.php -->
@extends('index')

@section('content')
<div class="container">
    <h2>Create Event</h2>

    <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
        {{-- {{ route('events.store') }} --}}
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
