@extends('layouts.app')

@section('content')
    <div class="container text-center w-50">
        <form method="POST" action="{{ route('message.update', $message) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="content" class="form-label">Edit your message text </label>
                <input name="content" type="text" class="form-control" id="content" aria-describedby="emailHelp"
                value="{{ $message->content  }}">
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Edit your tags </label>
                <input name="tags" type="text" class="form-control" id="tags" value="{{ $message->tags }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Edit image</label>
                <input type="text" id="image" name="image">
            </div>
            <input type="submit" class="btn btn-primary" value="Valider">
        </form>
    </div>

@endsection
