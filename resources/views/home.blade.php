
 @extends('index')

@section('content')
<div class="container">
    <h1>Welcome to the School Management System</h1>

    <div class="section">
        <h2>Recent Tutorials</h2>

        <ul class="activity-list">
            @if($tutorials->isEmpty())
            <li>No tutorials available.</li>
        @else
            @foreach($tutorials->sortByDesc('updated_at')->take(2) as $tutorial)
            <li>
                <h3>{{$tutorial->student_id}}</h3>

                <p class="timestamp">Last updated: {{$tutorial->updated_at}}</p>
            </li>
            @endforeach
            <!-- More tutorial entries -->
            @endif
        </ul>

    </div>

    <div class="section">
        <h2>Upcoming Events</h2>
        <ul class="activity-list">
            @if($events->isEmpty())
            <li>No events available.</li>
        @else
            @foreach($events->sortByDesc('updated_at')->take(2) as $event)
            <li>
                <h3>{{$event->title}}</h3>
                <p>{{$event->date}}</p>
                <p class="timestamp">Last updated: {{$event->updated_at}}</p>
            </li>
            @endforeach
            <!-- More event entries -->
            @endif
        </ul>
    </div>

    <div class="section">
        <h2>New Books</h2>
        <ul class="activity-list">
            @if($books->isEmpty())
            <li>No books available.</li>
        @else
            @foreach($books->sortByDesc('updated_at')->take(2) as $book)
            <li>
                <h3>{{$book->title}}</h3>
                <p>{{$book->level}}</p>
                <p class="timestamp">Last updated:{{$book->updated_at}}</p>
            </li>
            @endforeach

            @endif

        </ul>
    </div>

    {{-- <div class="section">
        <h2>Year Updates</h2>
        <ul class="activity-list">
            @if($years->isEmpty())
            <p>No years available.</p>
        @else
            @foreach($books->sortByDesc('updated_at')->take(2) as $book)
            <li>
                <h3>2024-2025 Academic Year</h3>
                <p>Managed by Admin</p>
                <p class="timestamp">Last updated: September 1, 2024</p>
            </li>
            <!-- More year entries -->
        </ul>
    </div> --}}
    @if(Auth::check() && Auth::user()->role !== 'student')
    <div class="section">
        <h2>New Users</h2>
        <ul class="activity-list">
            @if($users->isEmpty())
            <li>No users</li>
        @else
            @foreach($users->sortByDesc('created_at')->take(2) as $user)
            <li>
                <h3>{{$user->name}}</h3>
                <p>Join :{{$user->created_at}}</p>
            </li>
            <!-- More user entries -->
            @endforeach

            @endif
        </ul>
    </div>
@endif
</div>
@endsection
