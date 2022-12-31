@extends('layouts.app')

@section('title', 'Counsellors')

@section('content')

<div class="card mt-5">
  <div class="card-body">
    <div class="card-title">All Counsellors</div>
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
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($counsellors as $counsellor)
        <tr>
          <td>{{ $loop->index + 1 }}</td>
          <td>{{ $counsellor->name }}</td>
          <td>{{ $counsellor->email }}</td>
          <td>{{ $counsellor->phone }}</td>
          <td>{{ $counsellor->address }}</td>
          <td>{{ CounsellorGender::getLabel($counsellor->gender) }}</td>
          <td>{{ $counsellor->age }}</td>
          <td><button class="btn btn-sm btn-danger delete-button" data-id="{{ $counsellor->id }}"><i class="fas fa-trash"></i>Delete</button></td>
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

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    $(document).on('click', '.delete-button', function(){
      var id = $(this).data('id');
      Swal.fire({
            title: 'Are you sure want to delete?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {
            if (result.isConfirmed) {
              $.ajax({
                   url : 'api/counsellors/' + id,
                   type : 'DELETE',
                   success : function() {
                    Toast.fire({
                      icon: 'success',
                      title: "Counsellor deleted successfully."
                    });
                    setTimeout(() => {
                      window.location.reload();
                    }, 3000);
                   }
               });
            }
        });
    });
  });
</script>
@endsection