@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> User</h4>
   <a href="/admin/user/from" class="btn btn-primary">

    ปุ่มเพิ่ม

      </a>
      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">Table User</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Password</th>
                <th>Phone</th>
                <th>created_at</th>
                <th>updated_at</th>
              </tr>
            </thead>
            {{-- <tbody class="table-border-bottom-0">
              @foreach ($user as $item)
              <tr>
              <td>{{ $user->firstItem()+$loop->index}}</td>
              <td>{{ $item->username }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->address }}</td>
              <td>{{ $item->password }}</td>
              <td>{{ $item->phone }}</td>
              <td>{{ $item->created_at }}</td>
              <td>{{ $item->updated_at }}</td>
              <td>
                <a href="{{ route('about.edit',$item->id) }}"><i class='bx bxs-edit'>Edit</i></a>
                <a href="{{ route('about.delete',$item->id) }}"><i class='bx bx-trash'>Delete</i></a>
              </td>
              </tr>
              @endforeach
            </tbody> --}}
          </table>
        </div>
      </div>
      <!--/ Basic Bootstrap Table -->

      {{-- <hr class="my-5">

      {{ $user->links('pagination::bootstrap-5') }} --}}


    <div class="content-backdrop fade"></div>
  </div>

@stop
