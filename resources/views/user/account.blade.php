@extends('layouts.app')

@section('content')
<div class="container text-center">

    <h1>MY ACCOUNT</h1>

    @if($user->image)
    <div class="col">
        <img src="{{ asset("images/$user->image") }} " class="m-1 rounded-circle" style="width: 10vw; height:10vw" alt="imageUtilisateur">
    </div>
    @else
    <img src="{{ asset("images/default_user.jpg") }} " class="m-1 rounded-circle" style="width: 20vw; height:20vw" alt="imageUtilisateur">
    @endif

    <div class="row text-center w-75">
        <div class="col">
        <form>
        <a class="btn btn-primary" class="nav-link" href="{{ route('account-edit') }}">{{ __('Edit your informations') }}</a>
        </form>
        </div>
        <div class="col">
        <form>
            <button class="btn btn-danger" type="submit">Delete your account</button>
        </form>
        </div>

      
    </div>


    <div class="row flex-column">
        <div class="col">
            <span>first name :</span>
            <span>{{ $user->first_name }}</span>
        </div>
        <div class="col">
            <span>last name :</span>
            <span>{{ $user->last_name }}</span>
        </div>
        <div class="col">
            <span>pseudo :</span>
            <span>{{ $user->pseudo }}</span>
        </div>
        <div class="col">
            <span>email :</span>
            <span>{{ $user->email }}</span>
        </div>
    </div>

</div>

@endsection
