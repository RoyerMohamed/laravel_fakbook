@extends('layouts.app')

@section('content')
<div class="container text-center w-50"> 
<form method="POST" action="{{ route('account-update') }}">
    @csrf
      <div class="mb-3">
    <label for="first_name" class="form-label">Edit your first name </label>
    <input name="first_name" type="text" class="form-control" id="first_name" aria-describedby="emailHelp" value={{ $user->first_name }} >
  </div>
  <div class="mb-3">
    <label for="last_name" class="form-label">Edit your last name</label>
    <input name="last_name" type="text" class="form-control" id="last_name" value={{ $user->last_name }} >
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Edit your profil picture</label>
    <input type="file"  id="image" name="image">
  </div>
  <input type="submit" class="btn btn-primary" value="Valider">
</form>
</div>






<div class="container text-center w-50"> 
<form method="POST" action="{{ route('account-updatePassword') }}">
    @csrf
<div class="mb-3">
    <label for="oldpassword" class="form-label">Enter your current password </label>
    <input name="oldpassword" type="password" class="form-control" id="oldpassword" aria-describedby="emailHelp"  >
</div>

<div class="mb-3">
    <label for="newPassword" class="form-label">Enter your new password</label>
    <input name="newPassword" type="password" class="form-control" id="newPassword"  >
</div>

<div class="mb-3">
    <label for="ConfirmPassword" class="form-label">Confirm your new password</label>
    <input type="password"  id="ConfirmPassword" name="ConfirmPassword" class="form-control">
</div>

  <input type="submit" class="btn btn-primary" value="Valider">
</form>
</div>

@endsection
