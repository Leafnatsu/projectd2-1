@extends('layouts.promote')
@section('content')

    <section class="home-slider owl-carousel img" style="background-image: url(assets/fn/images/bg_1.jpg);">

        <div class="slider-item" style="background-image: url(assets/fn/images/bg_3.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Our Menu</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
                            <span>Menu</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">

        @if (!empty($categorys))
        @foreach ($categorys as $item)
        <div class="container mt-5">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">
                        {{ $item->name }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="container-wrap">
            <div class="row no-gutters d-flex">

                @if (!empty($item->product))
                    @foreach ($item->product as $product)
                        <div class="col-lg-4 d-flex ftco-animate">
                            <div class="services-wrap d-flex">
                                <a href="{{ asset($product->image) }}" data-lightbox="{{ $product->id }}"
                                    data-title="{{ $product->name }}" class="img"
                                    style="background-image: url('{{ asset($product->image) }}');"></a>
                                <div class="text p-4">
                                    <h3>
                                        {{ $product->name }}
                                    </h3>
                                    <p>{{ $product->detail }}</p>
                                    <p class="price">
                                        <span>{{ number_format($product->price, 2) }}฿</span>
                                        <form action="#" method="POST" class="mt-2">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="number" name="quantity" value="1" min="1" class="form-control mb-2">
                                            <button type="submit" class="btn btn-white btn-outline-white">สั่งอาหาร</button>
                                        </form>
                                    </p>
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

@endsection
