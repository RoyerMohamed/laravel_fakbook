@extends('layouts.app')

@section('content')
    <div class="container w-50">
        <form method="POST" action="{{ route('message.store') }}" class="mb-5 mt-5">
            @csrf
            <div class="mb-3">
                <label for="content" class="form-label">Enter your messge </label>
                <input name="content" type="text" class="form-control" id="content" aria-describedby="emailHelp"
                    placeholder="Message">
            </div>

            <div class="mb-3">
                <label for="tags" class="form-label">Enter your tags</label>
                <input name="tags" type="text" class="form-control" id="tags" placeholder="Tags">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Message picture</label>
                <input type="text" id="image" name="image">
            </div>

            <input type="submit" class="btn btn-primary" value="Valider">

        </form>
        <div class="row pt-5">
            @foreach ($messages as $message)
                <div class="message">
                    <div class="message-top">
                        <div class="row">
                            <!-- profile pic  -->
                            @if ($message->user->image)
                                <div class="col">
                                    <img src="images/{{ $message->user->image }}" class="m-1 rounded-circle"
                                        style="width: 3vw; height:3vw" alt="imageUtilisateur">
                                </div>
                            @else
                                <div class="col">
                                    <img src="{{ asset('images/default_user.jpg') }} " class="m-1 rounded-circle"
                                        style="width: 3vw; height:3vw" alt="imageUtilisateur">
                                </div>
                            @endif
                            <!-- userPseudo -->
                            <div class="col">
                                <h4>{{ $message->user->pseudo }}</h4>
                            </div>
                            <!-- date of post  -->
                            <div class="col">
                                <h4>{{ $message->user->created_at }}</h4>
                            </div>
                        </div>

                    </div>
                    <div class="message-content">
                        <!-- messages image -->
                        <div class="content-image">
                            @if ($message->user->image)
                                <div class="col">
                                    <img src="images/{{ $message->image }}  " class="m-1 rounded-circle"
                                        style="width: 3vw; height:3vw" alt="messages_image">
                                </div>
                            @else
                                <div class="d-none">
                                </div>
                            @endif
                        </div>
                        <form method="POST" action="{{ route('message.destroy', $message->id) }}"
                            class="mb-5 mt-5">
                            @csrf
                            @method("DELETE")
                            <input type="submit" class="btn btn-primary" value="X">
                        </form>
                        <!-- messages content -->
                        <div class="content-text">
                            <p>{{ $message->content }}</p>
                        </div>
                        <!-- messages tages -->
                        <div class="content-tags">
                            <p>{{ $message->tags }} </p>
                        </div>

                        <div class="content-commentaire">
                            @foreach ($message->comments as $comment)
                                <p>{{ $comment->content }}</p>
                                <form method="POST" action="{{ route('comment.destroy', $comment->id) }}"
                                    class="mb-5 mt-5">
                                    @csrf
                                    @method("DELETE")
                                    <input type="submit" class="btn btn-primary" value="X">
                                </form>
                            @endforeach
                        </div>

                        <a class="btn btn-primary"
                            href="{{ route('message.edit', $message) }}">{{ __('Modifier') }}</a>

                        <button class="btn btn-primary" onclick="myFunction({{ $message->id }})">Commenter</button>



                        <div id="comment-form{{ $message->id }}" class="text-center">
                            <form method="POST" action="{{ route('comment.store') }}" class="mb-5 mt-5" style="display: none">
                                @csrf
                                <div class="mb-3">
                                    <label for="content" class="form-label">Enter your comment </label>
                                    <input name="content" type="text" class="form-control" id="content"
                                        aria-describedby="emailHelp" placeholder="comment">
                                </div>

                                <div class="mb-3">
                                    <label for="tags" class="form-label">Enter your comment tags</label>
                                    <input name="tags" type="text" class="form-control" id="tags" placeholder="Tags">
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Comment picture</label>
                                    <input type="text" id="image" name="image">
                                </div>

                                <input type="hidden" class="btn btn-primary" name="message_id"
                                    value="{{ $message->id }}">
                                <input type="submit" class="btn btn-primary" value="Valider">

                            </form>
                            @foreach ($message->comments as $comment)
                                <a class="btn btn-primary"
                                    href="{{ route('comment.edit', $comment) }}">{{ __('Edit your comment ') }}</a>
                            @endforeach
                        </div>
                    

                        {{-- <a class="btn btn-primary" href="{{ route('comment.create' ) }}">{{ __('Add Comment') }}</a> --}}
                    </div>

                </div>
            @endforeach
            <div class="col-md-2 offset-md-5 w-100">
                {{ $messages->links() }}
            </div>
        </div>
    </div>
@endsection
<script>
    function myFunction(message_id) {
        var x = document.getElementById("comment-form" + message_id);
        if (x.style.display == "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
