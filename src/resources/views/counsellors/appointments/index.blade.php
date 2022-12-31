@extends('layouts.app')

@section('title', 'Appointments')

@section('content')

<div class="card mt-5">
  <div class="card-body">
    <div class="card-title">All Appointments</div>
    <table class="table table-bordered" id="appointments-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Appointment Method</th>
          <th>Appointment Date</th>
          <th>Appointment Time</th>
          <th>User Mail</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($appointments as $appointment)
        <tr>
          <td>{{ $loop->index + 1 }}</td>
          <td>{{ AppointmentMethod::getLabel($appointment->appointment_method) }}</td>
          <td>{{ $appointment->appointment_date }}</td>
          <td>{{ $appointment->appointment_time }}</td>
          <td>{{ $appointment->user_email }}</td>
          <td><a href="{{ route('appointments.show', [ $appointment->id ]) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i>View</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection


@section('script')
<script>
  $(document).ready( function () {
    var table = $('#appointments-table').DataTable();
  });
</script>
@endsection
