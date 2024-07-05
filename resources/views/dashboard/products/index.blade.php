@extends('layouts.admin')
@section('search.target', route("dashboard.product.index"))

@section('content')

    <script>
        function editSize(url=null)
        {
            document.location.href = url;
        }
    </script>

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
                                    <th>เลือกขนาดของสินค้า</th>
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
                                                {{-- {{ $item->detail }} --}}
                                                <button 
                                                    class="btn btn-info btn-sm"
                                                    onclick="Swal.fire('{{ $item->detail }}')"
                                                >
                                                    อ่านเพิ่ม
                                                </button>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input 
                                                        class="form-check-input" 
                                                        type="checkbox"
                                                        onclick="editSize('{{ route('dashboard.product.edit.enableSize', ['id' => $item->id, 'size' => $item->size == 0 ? '1' : '0']) }}')"
                                                        id="sizeId{{ $item->id }}"
                                                        {{ $item->size == 1 ? 'checked' : null }}
                                                    />
                                                  </div>
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
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
