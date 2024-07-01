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
                                    <th>หมายเลขคำสั่งซื้อ</th>
                                    <th>ผู้สั่ง</th>
                                    <th>ราคารวม</th>
                                    <th>วันที่สั่งซื้อ</th>
                                    <th>สถานะ</th>
                                    <th>สลิปการโอนเงิน</th>
                                    <th>รายละเอียดคำสั่งซื้อ</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @if(!$order->isEmpty())
                                    @foreach ($order as $key => $item)
                                        <tr>
                                            <td>{{ $order->total() - ($order->firstItem() + $key) + 1 }}</td>
                                            <td>{{ $item->order_code }}</td>
                                            <td>
                                            @if(!empty($item->user->name))
                                                {{ $item->user->name }}
                                            @else
                                                <span class="text-danger">
                                                    ไม่ระบุ
                                                </span>
                                            @endif
                                            </td>
                                            <td>{{ $item->total_price }}</td>
                                            <td>{{ $item->created_at->thaidate('j F Y, H:i'); }}</td>
                                            <td>
                                                @if($item->status >= 1)
                                                @if($item->status == 2)
                                                <span class="badge rounded-pill bg-danger text-white">
                                                    ยกเลิกรายการ
                                                        </span> 
                                                    @else
                                                        <span class="badge rounded-pill bg-success text-white">
                                                            ชำระเงินแล้ว
                                                        </span> 
                                                    @endif
                                                @else
                                                    <span class="badge rounded-pill bg-secondary text-white">
                                                        รอชำระเงิน
                                                    </span> 
                                                @endif
                                            </td>
                                            <td>
                                            @if(!empty($item->approve_payment))
                                                <a href="{{ asset($item->approve_payment) }}"
                                                    data-lightbox="{{ $item->id }}"
                                                    data-title="{{ $item->name }}"
                                                >
                                                    <img
                                                        src="{{ asset($item->approve_payment) }}"
                                                        width="100px"
                                                        height="80px"
                                                        alt=""
                                                    />
                                                </a>
                                            @else
                                                <span class="badge text-danger">
                                                    Nopic
                                                </span>
                                            @endif
                                            </td>
                                            <td>
                                                <button
                                                class="btn btn-primary btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#discriptionId{{ $item->id }}"
                                            >
                                                <i></i>
                                                รายละเอียดคำสั่งซื้อ
                                            </button>

                                            <div class="modal fade" id="discriptionId{{ $item->id }}" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                ยืนยันการลบ
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        @foreach($item->carts as $cart)

                                                            <div class="col-12 mb-2 mt-2">
                                                                <div class="float-left mx-3">
                                                                    <img 
                                                                        class="img-fluid rounded mx-2" 
                                                                        width="64px"
                                                                        height="64px"
                                                                        src="{{ asset($cart->product->image) }}" 
                                                                        alt="product image"
                                                                    />
                                                                    {{ $cart->product->name }}   
                                                                    <small class="text-dark">
                                                                        (ราคาต่อชิ้น {{ !empty($cart->size) ? number_format($cart->product->price + $cart->GetSize->price, 2) : number_format($cart->price, 2) }}฿)
                                                                        {{ !empty($cart->size) ? '(ขนาดถาด '.$cart->GetSize->name.')' : null }}
                                                                    </small>
                
                                                                    <span class="mx-2">
                
                                                                    </span>
                
                                                                </div>
                                                                <div class="float-right mx-3">
                                                                    ชิ้น: {{ $cart->quantity }}
                                                                </div>
                                                            </div>
            
                                                        @endforeach
                                                                                                            
                                                        <small class="text-dark mx-3">
                                                            <div class="float-right mx-3 h6">
                                                                ยอดรวมการสั่งซื้อ <span class="font-weight-bold text-dark">฿{{ number_format($item->total_price, 2) }}</span>
                                                            </div>
                                                        </small>
                                                        @if(
                                                            $item->status == 0
                                                        )
                                                            <div class="modal-footer text-center">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                                    ยกเลิก
                                                                </button>
                                                                <a
                                                                    href="{{ route('dashboard.order.update', $item->id) }}"
                                                                    class="btn btn-success"
                                                                >
                                                                    อณุมิตคำสั่งซื้อ
                                                                </a>
                                                            </div>
                                                        @else
                                                        @endif
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

            {{-- <div class="content-backdrop fade"></div> --}}

        </div>
    </div>
@endsection
