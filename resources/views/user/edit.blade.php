@extends('layouts.app')

@section('content')
<div class="container text-center w-50"> 
<form method="POST" action="{{ route('account-update') }}">
      <div class="mb-3">
    <label for="edit_first_name" class="form-label">Edit your first name </label>
    <input name="edit_first_name" type="text" class="form-control" id="edit_first_name" aria-describedby="emailHelp" value={{ $user->first_name }} >
  </div>
  <div class="mb-3">
    <label for="edit_last_name" class="form-label">Edit your last name</label>
    <input name="edit_last_name" type="text" class="form-control" id="edit_last_name" value={{ $user->last_name }} >
  </div>
  <div class="mb-3">
    <label for="edit_image" class="form-label">Edit your profil picture</label>
    <input type="file"  id="edit_image" name="edit_image">
  </div>
  <input type="submit" class="btn btn-primary" value="Valider">
</div>
@endsection
