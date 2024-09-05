@extends('layouts.promote')
@section('content')

    <section class="home-slider owl-carousel img" style="background-image: url(assets/fn/images/bg_3.jpg);">

        <div class="slider-item" style="background-image: url(assets/fn/images/bg_3.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Our Menu</h1>
                        <p class="breadcrumbs"><span class="box-1"><a href="{{ route('home') }}" class="btn btn-one">Home</a></span>
                            <span class="box-1"><a class="btn btn-one">Menu</a></span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">

        @if (!empty($categorys))
        @foreach ($categorys as $item)
        
        <section class="ftco-introl" style="padding: 0;">
            <div class="container-wrap" style="background-color: #f4a261; text-align: center;">
                <div class="wrap d-md-flex" style="line-height: 1;">
                    <div class="social d-md-flex align-items-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-7 heading-section ftco-animate">
                                    <h2 class="text-dark" style="margin: 0; padding: 10px 0;">
                                        {{ $item->name }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
            {{-- <div class="container mt-5">
                <div class="row justify-content-center mb-5 pb-3">
                    <div class="col-md-7 heading-section ftco-animate text-center">
                        <h2 class="mb-4">
                            {{ $item->name }}
                        </h2>
                    </div>
                </div>
            </div> --}}

            <div class="container-wrap">
                <div class="row no-gutters d-flex">
                    @if (!empty($item->product))
                        @foreach ($item->product as $product)
                            <div class="col-lg-4 d-flex ftco-animate mx-auto br">
                                <div class="services-wrap d-flex border border-start-0 border-5 border-dark h-100">
                                    <!-- รูปภาพทางซ้าย -->
                                    <a href="{{ asset($product->image) }}" data-lightbox="{{ $product->id }}"
                                        data-title="{{ $product->name }}" class="img text-dark border border-start-0 border-5 border-dark"
                                        style="background-image: url('{{ asset($product->image) }}'); background-size: cover; width: 50%;"></a>
                                    <!-- เนื้อหาทางขวา -->
                                    <div class="text p-4 d-flex flex-column justify-content-between">
                                        <div>
                                            <h4 class="text-dark"><b>{{ $product->name }}</b></h4>
                                            <hr>
                                            <small class="text-dark h5 mt-auto">{{ $product->detail }}</small>
                                        </div>
                                        <div class="mt-auto">
                                            <p class="text-dark h3">จำนวน</p>
                                            <form action="{{ route('cart.add') }}" method="post" class="mt-2 text-dark">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="number" style="text-align:right;" name="quantity" value="1" min="1" class="form-control mb-2 text-dark">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <button type="submit" class="button">สั่งอาหาร</button>
                                                    <span style="font-weight: bold; color: #343a40;">{{ number_format($product->price, 2) }}฿</span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-lg-4 d-flex ftco-animate text-center text-danger h1">
                            ไม่มีเมนูอาหาร
                        </div>
                    @endif
                </div>
            </div>
            
            
            
            
            


        @endforeach

        @else
            <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
                    <div class="col-md-7 heading-section ftco-animate text-center">
                        <h2 class="mb-4 h1 text-center fw-bolder text-danger">
                            ไม่มีข้อมูลอาหาร
                        </h2>
                    </div>
                </div>
            </div>
        @endif
    </section>
    <br>

@endsection
