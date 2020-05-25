@extends('layouts.app')

@section('content')

<div>
    <p>
        Page profil
    </p>

    <img src="/avatar/{{ Auth::User()->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">

    <h3>Changer photo de profil: </h3>
    <form enctype="multipart/form-data" action="{{ route('update_avatar') }}" method="POST">
        <label>Update Profile Image</label>
        <input type="file" name="avatar">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="pull-right btn btn-sm btn-primary">
    </form>

</div>

@endsection
