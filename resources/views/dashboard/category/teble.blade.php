@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Category</h4>
   <a href="{{ route('dashboard.category.from') }}" class="btn btn-primary">

    ปุ่มเพิ่ม

      </a>
      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">Table Category</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>created_at</th>
                  <th>updated_at</th>
                </tr>
              </thead>
          {{-- <tbody class="table-border-bottom-0">
              @foreach ($typeproduct as $item)
              <tr>
              <td>{{ $typeproduct->firstItem()+$loop->index}}</td>
              <td>{{ $item->name }}</td>
              <td>
                <img src="{{ asset('admin/upload/type_product/'.$item->image)}}" width="100px" height="80px" alt="">
              </td>
              <td>{{ $item->created_at }}</td>
              <td>{{ $item->updated_at }}</td>
              <td>
                <a href="{{ route('adminpage.type-product.edit',$item->id) }}"><i class='bx bxs-edit btn btn-warning'>Edit</i></a>
                <a href="{{ route('adminpage.type-product.delete',$item->id) }}"><i class='bx bx-trash btn btn-danger'>Delete</i></a>
              </td>
              </tr>
              @endforeach
            </tbody> --}}
          </table>
        </div>
      </div>
      <!--/ Basic Bootstrap Table -->

      {{-- <hr class="my-5">

      {{ $product->links('pagination::bootstrap-5') }} --}}


    <div class="content-backdrop fade"></div>
  </div>

@stop
