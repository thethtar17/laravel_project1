@extends('index')

@section('content')
    <h1>Book List</h1>
    @if($books->isEmpty())
    <p>No books available.</p>
@else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Level</th>
                <th>Thesis File</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ Str::limit($book->content, 100) }}</td>
                    <td>{{ $book->level }}</td>
                    <td>

                     {{ $book->thesis_file}}
                     <a href="{{ asset('storage/books/' . $book->thesis_file) }}" target="_blank" class="btn btn-dark">
                        download
                     </a>
                    </td>
                    <td>
                        @if(Auth::check() && Auth::user()->role !== 'student')
                        {{-- <a href="{{ route('book.show', $book->id) }}" class="btn btn-info btn-sm">View</a> --}}
                        <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('book.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
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
@endsection
