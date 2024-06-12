@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">

        <div class="container mt-5">
            <div class="float-start">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">
                    จัดการ/</span> สินค้า
                </h4>
            </div>

            <div class="float-end">
                <a href="{{ route('dashboard.product.add') }}" class="btn btn-primary">
                    <span class="bx bx-add-to-queue"></span>
                    เพิ่มสินค้า
                </a>
            </div>
        </div>

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
                                    <th>ชื่อสินค้า</th>
                                    <th>ประเภท</th>
                                    <th>ราคา</th>
                                    <th>รูปภาพ</th>
                                    <th>รายละเอียด</th>
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
                                            <td>{{ $item->price }}</td>
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
                                            <td>{{ $item->detail }}</td>
                                            <td>
                                                <a href="{{ route('dashboard.product.edit') }}" class="btn btn-warning btn-sm">
                                                    <i class='bx bxs-edit'></i>
                                                    แก้ไข
                                                </a>
                                                <a href="#" class="btn btn-danger btn-sm">
                                                    <i class='bx bx-trash'></i>
                                                    ลบ
                                                </a>
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

            {{-- {{ $products->links() }} --}}
            <div class="content-backdrop fade"></div>

        </div>
    </div>
@endsection
