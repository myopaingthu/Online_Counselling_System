@extends('layouts.app')

@section('title', 'Questions')

@section('content')

<div class="card">
  <div class="card-body">
    <div class="card-title">Answer Questions.</div>
    <form method="POST" action="{{ route('users.answers') }}" autocomplete="off">
      @csrf
      @foreach ($questions as $question)
      <div class="form-group row">
        <label class="col-md-4 col-form-label">{{ $question->text }}</label>
        <div class="col-md-8">
          <select class="form-control @error('answer_ids') is-invalid @enderror" name="answer_ids[]">
            @foreach ($question->answers as $answer)
            <option value="{{ $answer->id }}">{{ $answer->text }}</option>
            @endforeach
          </select>
          @error('answer_ids')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      @endforeach
      <div class="form-group row mb-0">
        <div class="col-md-4"></div>
        <div class="col-md-8">
          <a href="javascript:void(0)" class="btn btn-secondary back-btn">Cancel</a>
          <button type="submit" class="btn btn-primary">
            Submit
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection
