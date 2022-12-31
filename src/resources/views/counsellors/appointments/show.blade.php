@extends('layouts.app')

@section('title', 'Appointment')

@section('content')

<div class="card mt-5">
  <div class="card-body">
    <div class="card-title">Appointment Detail</div>
    <form method="POST" action="{{ route('appointments.update', [ $appointment->id ]) }}" id="appointent-form">
      @csrf
      @method('PATCH')
      <input type="hidden" name="status" id="status">
      <div class="form-group row">
        <label for="name" class="col-md-2 col-form-label">Appointment Method</label>
        <div class="col-md-10">
          <input type="text" class="form-control" value="{{ AppointmentMethod::getLabel($appointment->appointment_method) }}" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-md-2 col-form-label">Appointment Date</label>
        <div class="col-md-10">
          <input type="text" class="form-control" value="{{ $appointment->appointment_date }}" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-md-2 col-form-label">Appointment Time</label>
        <div class="col-md-10">
          <input type="text" class="form-control" value="{{ $appointment->appointment_time }}" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-md-2 col-form-label">User Mail</label>
        <div class="col-md-10">
          <input type="text" class="form-control" value="{{ $appointment->user_email }}" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-md-2 col-form-label">Appointment Status</label>
        <div class="col-md-10">
          <input type="text" class="form-control" value="{{ AppointmentStatus::getLabel($appointment->status) }}" readonly>
        </div>
      </div>
      <div class="form-group row mb-0">
        <div class="col-md-2"></div>
        <div class="col-md-10">
          <a href="javascript:void(0)" class="btn btn-secondary back-btn">Back</a>
          <a href="javascript:void(0)" class="btn btn-danger action-btn" onclick="clickAction({{ AppointmentStatus::Decline }})">Decline</a>
          <a href="javascript:void(0)" class="btn btn-primary action-btn" onclick="clickAction({{ AppointmentStatus::Accept }})">Accept</a>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection


@section('script')
<script>
  const clickAction = (actionStatus) => {
    $('#status').val(actionStatus);
    $('#appointent-form')[0].submit();
  };
</script>
@endsection
