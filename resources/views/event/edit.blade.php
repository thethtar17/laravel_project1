@extends('index')

@section('content')

<div class="container card m-2 p-2">
    <h1>Edit Event</h1>
    {{-- @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Event Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}" required>
        </div>
        <div class="form-group">
            <label for="date">Event Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $event->date }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ $event->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Event Image</label>
            <input type="file" class="form-control" id="image" name="image">
                <img src="{{ asset('storage/events/' . $event->image) }}" alt="Event Image" style="width: 100px; height: 100px; margin-top: 10px;">

        </div>
        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>


@endsection
