@extends('layouts.app')

@section('title', 'Category')

@section('content')

<div class="card">
  <div class="card-body">
    <div class="card-title">Choose Question Category</div>
    <div class="list-group">
      @foreach ($categories as $category)
      <a href="{{ route('users.questions', [ $category->id ]) }}" class="list-group-item list-group-item-action" aria-current="true">
        {{ $category->name }}
      </a>
      @endforeach
    </div>
  </div>
</div>

@endsection
