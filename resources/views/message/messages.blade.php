@extends('layouts.app')

@section('content')
<div class="container text-center">

    <h1>MY messages</h1>

    <div class="row text-center w-75">
        <div class="col">
        <form>
        <a class="btn btn-primary" class="nav-link" href="{{ route('message-edit') }}">{{ __('Edit your informations') }}</a>
        </form>
        </div>  
    </div>


    <div class="container text-center w-50"> 
<form method="POST" action="{{ route('message-edit') }}">
    @csrf
     
</form>
</div>


</div>

@endsection