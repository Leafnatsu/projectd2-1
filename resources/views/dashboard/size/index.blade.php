@extends('layouts.admin')
@section('search.target', route("dashboard.size.index"))
@section('content')
    <div class="content-wrapper">

        <div class="container mt-5">
            <div class="float-start">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">
                    จัดการ/</span> ขนาดของสินค้า
                </h4>
            </div>

            <div class="float-end">
                <a href="{{ route('dashboard.size.add') }}" class="btn btn-primary">
                    <span class="bx bx-add-to-queue"></span>
                    เพิ่มขนาดของสินค้า
                </a>
            </div>
        </div>

        <!-- Content -->
        <div class="container-xxl flex-grow-1">

            <!-- Basic Bootstrap Table -->
            <div class="float-center">
                <div class="card">
                    {{-- <h5 class="card-header">Table category</h5> --}}
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="">ลำดับ</th>
                                    <th>ชื่อขนาดของสินค้า</th>
                                    <th>ขนาดของสินค้า</th>
                                    <th>ราคาของสินค้า</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @if(!$size->isEmpty())
                                    @foreach ($size as $key => $item)
                                        <tr>
                                            <td>{{ $size->total() - ($size->firstItem() + $key) + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->size }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>
                                                <a href="{{ route('dashboard.size.edit', $item->id) }}" class="btn btn-warning btn-sm">
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
                                                                คุณต้องการลบขนาด "{{ $item->name }}" หรือไม่ ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                                    ยกเลิก
                                                                </button>
                                                                <a
                                                                    href="{{ route('dashboard.size.delete', $item->id) }}"
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

            @if(!$size->isEmpty())
                <div class="d-flex mx-auto mt-4">
                    {{ $size->links() }}
                </div>
            @endif
            {{-- <div class="content-backdrop fade"></div> --}}

        </div>
    </div>
@endsection
