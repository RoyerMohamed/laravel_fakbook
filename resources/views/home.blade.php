@extends('layouts.app')

@section('content')
<div class="container w-50">
    <form method="POST" action="{{ route('message.store') }}" class="d-flex">
        @csrf
        <div class="mb-3">
            <label for="content" class="form-label">Enter your messge </label>
            <input name="content" type="text" class="form-control" id="content" aria-describedby="emailHelp" placeholder="Enter your message">
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Edit the message tags</label>
            <input name="tags" type="text" class="form-control" id="tags">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Edit your message picture</label>
            <input type="text" id="image" name="image">
        </div>
        <input type="submit" class="btn btn-primary" value="Valider">
    </form>
    @foreach ($messages as $message)
    <div>
        <p>{{ $message->content }}</p>
    </div> 
    @endforeach
</div>
@endsection