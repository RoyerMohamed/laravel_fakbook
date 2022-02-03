@extends('layouts.app')

@section('content')
    <div class="container w-50" >
        <form method="POST" action="{{ route('comment.store') }}" class="mb-5 mt-5">
            @csrf
            <div class="mb-3">
                <label for="content" class="form-label">Enter your comment </label>
                <input name="content" type="text" class="form-control" id="content" aria-describedby="emailHelp"
                    placeholder="comment">
            </div>

            <div class="mb-3">
                <label for="tags" class="form-label">Enter your comment  tags</label>
                <input name="tags" type="text" class="form-control" id="tags" placeholder="Tags">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Comment picture</label>
                <input type="text" id="image" name="image">
            </div>

            <input type="submit" class="btn btn-primary" value="Valider">

        </form>
    </div>
@endsection
