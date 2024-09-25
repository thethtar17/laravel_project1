
@extends('index')

@section('content')
<div class="container card m-3 p-3 accent-danger w-75  ">
    <h2>Create Year</h2>
    <form action="{{ route('year.store') }}" method="POST" class="p-2">
        {{-- {{ route('year.store') }} --}}
        @csrf
        <div class="form-group">
            <label for="name" >Name:</label>
            <input type="text" id="name" name="name" class="form-control" required >
        </div>
        <button type="submit"  class="btn btn-primary ">Submit</button>
    </form>
</div>
@endsection
