@extends('index')

@section('content')
<div class="container card m-2 p-2">
    <h1>Edit Year</h1>
    {{-- @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <form action="{{ route('year.update', $year->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Year Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $year->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Year</button>
    </form>
</div>



@endsection
