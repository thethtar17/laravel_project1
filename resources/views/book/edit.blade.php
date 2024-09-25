@extends('index')

@section('content')


<div class="container card m-2 p-2">
    <h1>Edit Book</h1>
    {{-- @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Book Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ $book->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="level">Level</label>
            <input type="text" class="form-control" id="level" name="level" value="{{ $book->level }}" required>
        </div>
        <div class="form-group">
            <label for="thesis_file">Thesis File</label>
            <input type="file" class="form-control" id="thesis_file" name="thesis_file">
            @if($book->thesis_file)
                <p>Current File: {{ $book->thesis_file }}</p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update Book</button>
    </form>
</div>


@endsection
