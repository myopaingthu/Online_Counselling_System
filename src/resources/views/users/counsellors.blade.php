@extends('layouts.app')

@section('title', 'Counsellors')

@section('content')

<div class="card">
  <div class="card-body">
    <div class="card-title">Counsellors that match with your answers</div>
    <table class="table table-bordered" id="counsellors-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Counsellor Name</th>
          <th>Counsellor Email</th>
          <th>Counsellor Phone</th>
          <th>Counsellor Address</th>
          <th>Counsellor Gender</th>
          <th>Counsellor Age</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($counsellors as $counsellor)
          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td><a href="{{ route('users.appointment', [ $counsellor->id ]) }}">{{ $counsellor->name }}</a></td>
            <td>{{ $counsellor->email }}</td>
            <td>{{ $counsellor->phone }}</td>
            <td>{{ $counsellor->address }}</td>
            <td>{{ CounsellorGender::getLabel($counsellor->gender) }}</td>
            <td>{{ $counsellor->age }}</td>
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
    var table = $('#counsellors-table').DataTable();
  });
</script>
@endsection
