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
                    {{-- <h5 class="card-header">Table user</h5> --}}
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
                                @if(!$user->isEmpty())
                                    @foreach ($user as $key => $item)
                                        <tr>
                                            <td>{{ $user->total() - ($user->firstItem() + $key) + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->password }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>
                                            @if ($item->status)
                                                <a href="{{ route('dashboard.user.disable', $item->id) }}" class="btn btn-danger btn-sm">
                                                    <i class='bx bx-x-circle'></i> ปิดการใช้งาน
                                                </a>
                                            @else
                                                <a href="{{ route('dashboard.user.enable', $item->id) }}" class="btn btn-success btn-sm">
                                                    <i class='bx bxs-check-circle'></i> เปิดการใช้งาน
                                                </a>
                                            @endif
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

            @if(!$user->isEmpty())
                <div class="d-flex mx-auto mt-4">
                    {{ $user->links() }}
                </div>
            @endif
            {{-- <div class="content-backdrop fade"></div> --}}

        </div>
    </div>
@endsection
