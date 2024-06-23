@extends('layouts.promote')
@section('content')

    <section class="h-100" style="background-image: url(images/bg_1.jpg);">

        <style>
            input[type=number] {
                color: black !important;
            }
        </style>

        <div class="container h-100 py-5"
            style="background-color: rgba(255, 255, 255, 0.884); padding: 20px; border-radius: 15px; color: black;">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0" style="color: black;">ตะกร้าสิ้นค้า</h3>
                    </div>
                    @if (!empty($item->cart))

                        @foreach ($item->cart as $cart)

                            <div class="card rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            @if(!empty($item->products->image))
                                            <a href="{{ asset($product->image) }}" data-lightbox="{{ $product->id }}"
                                                class="img"
                                                style="background-image: url('{{ asset($product->image) }}');"></a>
                                                @else
                                                    <span class="text-danger">
                                                        ไม่ระบุ
                                                    </span>
                                                @endif
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-normal mb-2" style="color: black;">
                                                @if(!empty($item->products->name))
                                                    {{ $item->products->name }}
                                                @else
                                                    <span class="text-danger">
                                                        ไม่ระบุ
                                                    </span>
                                                @endif
                                            </p>
                                            <p><span class="text-muted" style="color: black;">Size: </span>medium<span
                                                    class="text-muted" style="color: black;"></span></p>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <input id="form1" min="0" name="quantity" value="2" type="number"
                                                class="form-control form-control-sm" />

                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h5 class="mb-0" style="color: black;">
                                                @if(!empty($item->product->price))
                                                    {{ $item->product->price }}
                                                @else
                                                    <span class="text-danger">
                                                        ไม่ระบุ
                                                    </span>
                                                @endif
                                            </h5>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="#!" class="btn btn-sm btn-danger" onclick="removeItem(this)">ลบ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center text-danger fw-bolder h5">
                                <span class="bx bx-block"></span>
                                ไม่มีข้อมูล
                            </td>
                        </tr>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-warning btn-block btn-lg" style="color: black;">

                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
