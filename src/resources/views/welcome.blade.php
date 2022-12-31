@extends('layouts.app')

@section('title', 'Welcome')

@section('content')

<div class="card">
  <div class="card-body">
    <h1>Welcome to Online Counselling System.</h1>
    <div>
      <a href="{{ route('users.welcome') }}" class="btn btn-primary">Find Counsellor</a>
      <a href="{{ route('admin.login') }}" class="btn btn-primary">Admin Login</a>
      <a href="{{ route('counsellor.login') }}" class="btn btn-primary">Counsellor Login</a>
    </div>
  </div>
</div>

@endsection
