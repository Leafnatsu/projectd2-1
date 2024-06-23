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
@extends('layouts.admin')
@section('search.target', route("dashboard.user.index"))
@section('content')
    <div class="content-wrapper">

        <div class="container mt-5">
            <div class="float-start">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">
                    จัดการ/</span> สมาชิก
                </h4>
        <!-- Content -->
        <div class="container-xxl flex-grow-1">

            <!-- Basic Bootstrap Table -->
            <div class="float-center">
                <div class="card">
                    {{-- <h5 class="card-header">Table Product</h5> --}}
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="">ลำดับ</th>
                                    <th>ชื่อ</th>
                                    <th>Email</th>
                                    <th>ที่อยู่</th>
                                    <th>รหัส</th>
                                    <th>เบอร์โทรศัพท์</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @if(!$products->isEmpty())
                                    @foreach ($products as $key => $item)
                                        <tr>
                                            <td>{{ $products->total() - ($products->firstItem() + $key) + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                                <td>
                                                    @if(!empty($item->category->name))
                                                        {{ $item->category->name }}
                                                    @else
                                                        <span class="text-danger">
                                                            ไม่ระบุ
                                                        </span>
                                                    @endif
                                                </td>
                                            <td>
                                                {{ number_format($item->price, 2) }}
                                            </td>
                                            <td>
                                                <a href="{{ asset($item->image) }}"
                                                    data-lightbox="{{ $item->id }}"
                                                    data-title="{{ $item->name }}"
                                                >
                                                    <img
                                                        src="{{ asset($item->image) }}"
                                                        width="100px"
                                                        height="80px"
                                                        alt=""
                                                    />
                                                </a>
                                            </td>
                                            <td>
                                                {{ $item->detail }}
                                            </td>
                                            <td>

                                                <a href="{{ route('dashboard.product.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                                    <i class='bx bxs-edit'></i>
                                                    แก้ไข
                                                </a>

                                                <button
                                                    class="btn btn-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#confrimDeleteId{{ $item->id }}"
                                                >
                                                    <i class='bx bx-trash'></i>
                                                    ลบ
                                                </button>

                                                <div class="modal fade" id="confrimDeleteId{{ $item->id }}" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    ยืนยันการลบ
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                คุณต้องการลบสินค้า "{{ $item->name }}" หรือไม่ ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                                    ยกเลิก
                                                                </button>
                                                                <a
                                                                    href="{{ route('dashboard.product.delete', $item->id) }}"
                                                                    class="btn btn-danger"
                                                                >
                                                                    ยืนยันการลบ
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center text-danger fw-bolder h5">
                                            <span class="bx bx-block"></span>
                                            ไม่มีข้อมูล
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!--/ Basic Bootstrap Table -->

            {{-- <hr class="my-5"> --}}

            @if(!$products->isEmpty())
                <div class="d-flex mx-auto mt-4">
                    {{ $products->links() }}
                </div>
            @endif
            {{-- <div class="content-backdrop fade"></div> --}}

        </div>
    </div>
@endsection
