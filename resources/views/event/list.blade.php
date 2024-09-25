@extends('index')

@section('content')
    <h1>Event List</h1>
    @if($events->isEmpty())
    <p>No events available.</p>
@else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Date</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>
                        <img src="{{ asset('storage/events/' . $event->image) }}"  width="100">
                    </td>
                    <td>{{ $event->date }}</td>
                    <td>{{ Str::limit($event->content, 100) }}</td>
                    <td>
                        @if(Auth::check() && Auth::user()->role !== 'student')
                        {{-- <a href="{{ route('events.show', $event->id) }}" class="btn btn-info btn-sm">View</a> --}}
                        <a href="{{ route('event.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('event.destroy', $event->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
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
