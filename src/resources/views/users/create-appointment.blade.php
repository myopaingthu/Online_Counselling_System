@extends('layouts.app')

@section('title', 'Appointment')

@section('content')

<div class="card">
  <div class="card-body">
    <div class="card-title">Create Appointment with Counsellor {{ $counsellor->name }}</div>
    <form method="POST" action="{{ route('users.appointments.store') }}" autocomplete="off">
      @csrf
      <input type="hidden" name="counsellor_id" value="{{ $counsellor->id }}">
      <div class="form-group row">
        <label class="col-md-4 col-form-label">Appointment Method</label>
        <div class="col-md-8">
          <select class="form-control @error('appointment_method') is-invalid @enderror" name="appointment_method">
            <option value="{{ AppointmentMethod::Offline }}">{{ AppointmentMethod::getLabel(AppointmentMethod::Offline) }}</option>
            <option value="{{ AppointmentMethod::Online }}">{{ AppointmentMethod::getLabel(AppointmentMethod::Online) }}</option>
          </select>
          @error('appointment_method')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-4 col-form-label">Your Email</label>
        <div class="col-md-8">
          <input type="text" class="form-control @error('user_email') is-invalid @enderror" name="user_email" value="{{old('user_email')}}" >
          @error('user_email')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-4 col-form-label">Appointment Date</label>
        <div class="col-md-8">
          <input type="date" class="form-control @error('appointment_date') is-invalid @enderror" name="appointment_date" value="{{old('appointment_date')}}" >
          @error('appointment_date')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-4 col-form-label">Appointment Time</label>
        <div class="col-md-8">
          <input type="time" class="form-control @error('appointment_time') is-invalid @enderror" name="appointment_time" value="{{old('appointment_time')}}" >
          @error('appointment_time')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
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
