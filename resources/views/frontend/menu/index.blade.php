@extends('layouts.promote')
@section('content')

    <section class="home-slider owl-carousel img" style="background-image: url(assets/fn/images/bg_3.jpg);">

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
                            <div class="col-lg-4 d-flex ftco-animate mx-auto br">
                                <div class="services-wrap d-flex border border-start-0 border-5 border-dark">
                                    <a href="{{ asset($product->image) }}" data-lightbox="{{ $product->id }}"
                                        data-title="{{ $product->name }}" class="img text-dark border border-start-0 border-5 border-dark"
                                        style="background-image: url('{{ asset($product->image) }}');"></a>
                                    <div class="text p-4">
                                        <h4 class="text-dark">
                                            <b>{{ $product->name }}</b>
                                        </h4>
                                        <small class="text-dark h6 mt-auto">{{ $product->detail }}</small>
                                        <p class="price">
                                            <form action="{{ route('cart.add') }}" method="post" class="mt-2 text-dark ">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                {{-- @if ($product->size == 1)
                                                    <select name="size" class="form-control mb-2 text-dark h7" style="color:black;">
                                                        <option value="S" class="text-dark">ขนาด S</option>
                                                        <option value="M" class="text-dark">ขนาด M</option>
                                                        <option value="L" class="text-dark">ขนาด L</option>
                                                    </select>
                                                @endif --}}
                                                <input type="number" name="quantity" value="1" min="1" class="form-control mb-2 text-dark">
                                                <button type="submit" class="btn btn-dark btn-outline-white btn-lg">
                                                    สั่งอาหาร
                                                    
                                                </button>
                                                <a style="float: right; font-weight: bold;">{{ number_format($product->price, 2) }}฿</a>

                                            </form>
                                            <br>
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
    <br>

@endsection
