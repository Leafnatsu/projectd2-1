@extends('layouts.promote')
@section('content')

    <section class="mt-5 mb-5 h-100" style="background-image: url(images/bg_1.jpg);">

        <script>
            function submitFrom(id)
            {
                document.getElementById(id).submit();
            }

            function editSize(cart_id=null, size=null)
            {
                var url = "{{ route('cart.edit.size') }}" + "?cart_id=" + cart_id + "&size=" + size;
                document.location.href = url;
            }
        </script>
        <style>
            input[type=number] {
                color: black !important;
            }
        </style>

        <div 
            class="container h-100 py-5"
            style="background-color: rgba(255, 255, 255, 0.884); padding: 20px; border-radius: 15px; color: black;"
        >
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0" style="color: black;">
                            ตะกร้าสินค้า
                        </h3>
                    </div>
                    
                    @if(!$carts->isEmpty())

                        @foreach($carts as $cart)

                            <div class="card rounded-3 mb-4 mt-2">
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="{{ asset($cart->product->image) }}" class="img-fluid rounded-3">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">

                                            <p class="lead fw-normal mb-2" style="color: black;">
                                                {{ $cart->product->name }}
                                            </p>

                                            @if($cart->product->size == 1)

                                                <div class="btn-group" role="group" aria-label="Basic example">

                                                    {{-- <button 
                                                        type="button"
                                                        class="{{ !empty($cart->size) && ($cart->size == "S") ? 'btn btn-danger' : 'btn btn-primary' }}"
                                                        onclick="editSize('{{ $cart->id }}', 'S')"
                                                    >
                                                        Small
                                                    </button> --}}

                                                    <form 
                                                        id="cartEditSizeId{{ $cart->id }}"
                                                        class="text-dark"
                                                        action="{{ route('cart.edit.size') }}" 
                                                        method="get"
                                                    >
                                                        <input type="hidden" name="cart_id" value="{{ $cart->id }}" />
                                                        <select
                                                            name="size"
                                                            class="form-select text-dark"
                                                            onchange="submitFrom('cartEditSizeId{{ $cart->id }}');"
                                                        >
                                                            <option value="">
                                                                --เลือกขนาดถาด--
                                                            </option>
                                                            @foreach($size_cart as $i)
                                                                <option value="{{ $i->size }}" class="text-dark" {{ $cart->size == $i->size ? 'selected' : null }}>
                                                                    {{ $i->name }} +{{ number_format($i->price, 2) }}฿
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </form>

                                                </div>

                                            @endif

                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                                                onclick="">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <form id="cartEditQtyId{{ $cart->id }}" action="{{ route('cart.edit.qty') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="cart_id" value="{{ $cart->id }}" />
                                                <input type="hidden" name="product_id" value="{{ $cart->product->id }}" />
                                                <input 
                                                    min="0" 
                                                    name="quantity" 
                                                    value="{{ $cart->quantity }}" 
                                                    type="number"
                                                    class="form-control form-control-sm"
                                                    onchange="submitFrom('cartEditQtyId{{ $cart->id }}');"
                                                />
                                            </form>

                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                                                onclick="">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h5 class="mb-0" style="color: black;">
                                                {{ number_format($cart->price, 2) }}฿
                                            </h5>
                                        </div>

                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <form
                                                action="{{ route('cart.delete', $cart->id) }}"
                                                method="get"
                                            >
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    ลบ
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        @endforeach

                    @else

                        <div class="mx-5 h1 text-center">
                            <span class="badge bg-danger text-light">
                                ไม่มีรายการ
                            </span>
                        </div>

                    @endif
                    
                    @if(!$carts->isEmpty())
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('cart.checkout') }}" class="btn btn-warning btn-block btn-lg" style="color: black;">
                                    <h4>
                                        สั่งซื้อสินค้า
                                    </h4>
                                </a>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>

@endsection
