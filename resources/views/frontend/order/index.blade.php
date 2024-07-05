@extends('layouts.promote')
@section('content')

    <section class="mt-5 mb-5 h-100" style="background-image: url(images/bg_1.jpg);">

        <div class="container h-100 py-5"
            style="background-color: rgba(255, 255, 255, 0.884); padding: 20px; border-radius: 15px; color: black;">
            <div class="row d-flex justify-content-center h-100">
                <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0" style="color: black;">
                            คำสั่งซื้อ
                        </h3>
                    </div>
                    
                    @foreach($orders as $i)

                        <div class="card rounded-3">
                            <div class="card-body">
                                <div class="card-title text-dark fw-bolder h4 mx-3">
                                    หมายเลขคำสั่งซื้อ {{ $i->order_code }}

                                    @if($i->status >= 1)
                                        @if($i->status == 2)
                                            <span class="badge rounded-pill bg-danger text-light">
                                                ยกเลิกรายการ
                                            </span> 
                                        @else
                                            <span class="badge rounded-pill bg-success text-light">
                                                ชำระเงินแล้ว
                                            </span> 
                                        @endif
                                    @else
                                        <span class="badge rounded-pill bg-secondary text-light">
                                            รอชำระเงิน
                                        </span> 
                                    @endif
                                </div>
                                <small class="text-dark mx-3 h5">
                                    วันที่สั่งซื้อ : {{ $i->created_at->thaidate('j F Y, H:i'); }}
                                    {{-- วันที่สั่งซื้อ : วันที่ 26 มิถุนายน 2567, 14:15 --}}
                                </small>

                                <hr class="mx-3" />
                                
                                    <div class="row">

                                        @foreach($i->carts as $cart)

                                            <div class="col-12 mb-2 mt-2">
                                                <div class="float-left mx-3">
                                                    {{-- <a style="text-align: left">asd</a> --}}
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
                                    </div>

                                <hr class="mx-3" />
                                <small class="text-dark mx-3">
                                    <div class="float-right mx-3 h6">
                                        ยอดรวมการสั่งซื้อ <span class="font-weight-bold text-dark">฿{{ number_format($i->total_price, 2) }}</span>
                                    </div>
                                </small>
                            </div>
                            <div class="mb-3 d-inline p-2 text-center">
                                @if(
                                    $i->status == 0 ||
                                    $i->status == 1
                                )
                                    <button 
                                        type="button" 
                                        class="btn btn-success btn-lg" 
                                        data-toggle="modal" 
                                        data-target="#confirmId{{$i->id}}"
                                    >
                                        {{ $i->status == 1 ? 'รายละเอียดการชำระเงิน' : 'แจ้งชำระเงิน' }}
                                    </button>
                                @endif
                                @if(
                                    $i->status == 0
                                )
                                    <button 
                                        type="button" 
                                        class="btn btn-danger btn-lg"
                                        data-toggle="modal"
                                        data-target="#cancelId{{$i->id}}"
                                    >
                                    {{ $i->status == 0 ? 'ยกเลิกรายการ' : null }}
                                    </button>
                                @endif
                            </div>
                            {{-- cancel order --}}
                            <div class="modal fade" id="cancelId{{$i->id}}" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="exampleModalLabel">
                                                ยืนยันการยกเลิกรายการ
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            คุณต้องการยกเลิก หรือไม่ ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                ปิดหน้าต่าง
                                            </button>
                                            <a
                                                href="{{ route('order.cancel', ["order_id" => $i->id, "order_code" => $i->order_code]) }}"
                                                class="btn btn-danger"
                                            >
                                                ยืนยันการยกเลิกรายการ
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- confirm payment --}}
                            <div class="modal fade" id="confirmId{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="confirmIdLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="confirmIdLabel">
                                                {{ $i->status == 1 ? 'รายละเอียดการชำระเงิน' : 'ยืนยันการชำระเงิน' }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">
                                                    &times;
                                                </span>
                                            </button>
                                        </div>
                                        <form action="{{route('order.confirm')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="order_id" value="{{$i->id}}" required />
                                            <div class="modal-body text-dark">
                                                <div class="form-group mx-2">

                                                    @if(!empty($i->approve_payment))

                                                    <a 
                                                        href="{{ asset($i->approve_payment) }}" 
                                                        data-lightbox="{{ $i->id }}">
                                                        <img 
                                                            src="{{ asset($i->approve_payment) }}" 
                                                            width="50%"
                                                            height="50%"
                                                            class="img-fluid rounded mx-auto d-block img-thumbnail mb-1" 
                                                            alt="OrderPayment"
                                                        />
                                                    </a>

                                                        @if($i->status == 0)
                                                            <div class="h5 mb-3 text-warning mx-auto text-center font-weight-bold">
                                                                รอการตรวจสอบจากเจ้าหน้าที่
                                                            </div>
                                                        @else
                                                            <div class="h5 mb-3 text-success mx-auto text-center font-weight-bold">
                                                                ตรวจสอบเอกสารการชำระเงินสำเร็จ
                                                            </div>
                                                        @endif

                                                    @endif
                                                    
                                                    @if($i->status == 0)
                                                        <div class="mx-auto d-block">
                                                            <label for="confirmSlip">
                                                                แนบใบรายการชำระเงิน
                                                            </label>
                                                            <input 
                                                                type="file" 
                                                                class="" 
                                                                id="confirmSlip" 
                                                                name="confirmSlip" 
                                                                placeholder="ใบรายการชำระเงิน"
                                                                accept="image/png, image/jpg, image/jpeg"
                                                                required
                                                            />
                                                            <small id="confirmSlip" class="form-text text-muted">
                                                                รองรับไฟล์รูปภาพ jpeg, jpg, png
                                                            </small>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    ปิดหน้าต่าง
                                                </button>
                                                @if($i->status == 0)
                                                    <button type="submit" class="btn btn-primary">
                                                        ยืนยันการชำระเงิน
                                                    </button>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    @endforeach

                </div>
            </div>
        </div>

    </section>

@endsection
