@extends('index')

@section('content')
<div class="container">
    <h2>Create Book</h2>

    <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
        {{-- {{ route('books.store') }} --}}
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label for="level">Level</label>
            <input type="text" name="level" id="level" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="thesis_file">Thesis File</label>
            <input type="file" name="thesis_file" id="thesis_file" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
