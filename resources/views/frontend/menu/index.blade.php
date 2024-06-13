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
                            <span>Menu</span></p>
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
                                        <a
                                            href="{{ asset($product->image) }}"
                                            data-lightbox="{{ $product->id }}"
                                            data-title="{{ $product->name }}"
                                            class="img"
                                            style="background-image: url('{{ asset($product->image) }}');"
                                        ></a>
                                        <div class="text p-4">
                                            <h3>
                                                {{ $product->name }}
                                            </h3>
                                            <p>{{ $product->detail }}</p>
                                            <p class="price">
                                                <span>{{ number_format($product->price, 2) }}฿</span>
                                                <a href="#" class="ml-2 btn btn-white btn-outline-white">
                                                    สั่งอาหาร
                                                </a>
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


        <div class="container">
            <div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Pizza Menu</h2>
                    <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img" style="background-image: url(assets/fn/images/pizza-1.jpg);"></div>
                        <div class="desc pl-3">
                            <div class="d-flex text align-items-center">
                                <h3><span>Hawaiian Pizza</span></h3>
                                <span class="price">149.00฿</span>
                            </div>
                            <div class="d-block">
                                <p>ทำจากแป้งพิซซ่าและซอสพิซซ่าสูตรพิเศษ โรยหน้าด้วยมอสซาเรลล่าชีส ใส่ท็อปปิ้ง เป็นแฮมไก่
                                    และสับปะรด โรยหน้าทับด้วยมอสซาเรลล่าชีส อีก 1 ชั้น</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img" style="background-image: url(assets/fn/images/pizza-2.jpg);"></div>
                        <div class="desc pl-3">
                            <div class="d-flex text align-items-center">
                                <h3><span>Seafood Pizza</span></h3>
                                <span class="price">149.00฿</span>
                            </div>
                            <div class="d-block">
                                <p>ทำจากแป้งพิซซ่าและซอสพิซซ่าสูตรพิเศษ โรยหน้าด้วยน็อตซาเรลล่าชีส ใส่ท็อปปิ้ง เป็นกุ้ง ปู
                                    หมึกหลอด ในซอสต้มยำ โรยหน้าด้วยมอสซาเรลล่าชีส อีก 1 ชั้น</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img" style="background-image: url(assets/fn/images/pizza-3.jpg);"></div>
                        <div class="desc pl-3">
                            <div class="d-flex text align-items-center">
                                <h3><span>Mala Pizza</span></h3>
                                <span class="price">149.00฿</span>
                            </div>
                            <div class="d-block">
                                <p>ทำจากแป้งพิซซ่า และซอสพิซซ่าสูตรพิเศษ โรยหน้าด้วยมอสซาเรลล่าชีส ใส่ท็อปปิ้ง
                                    เป็นแฮมและไส้กรอกรมควัน ในซอสหม่าล่า และโรยหน้าด้วยมอสซาเรลล่าชีสอีก 1 ชั้น</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img" style="background-image: url(assets/fn/images/pizza-4.jpg);"></div>
                        <div class="desc pl-3">
                            <div class="d-flex text align-items-center">
                                <h3><span>Seafood Cocktail Pizza</span></h3>
                                <span class="price">149.00฿</span>
                            </div>
                            <div class="d-block">
                                <p>ทำจากแป้งพิซซ่า และซอสพิซซ่าสูตรพิเศษ โรยหน้าด้วยมอสซาเรลล่าชีส ใส่ท็อปปิ้งเป็น กุ้ง
                                    ปูอัด หมึกหลอด และสับปะรด โรยหน้าด้วยมอสซาเรลล่าชีสอีก 1 ชั้น</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img" style="background-image: url(assets/fn/images/pizza-5.jpg);"></div>
                        <div class="desc pl-3">
                            <div class="d-flex text align-items-center">
                                <h3><span>Panang Chicken Pizza</span></h3>
                                <span class="price">149.00฿</span>
                            </div>
                            <div class="d-block">
                                <p>ทำจากแป้งพิซซ่า และซอสพิซซ่า สูตรพิเศษ โรยหน้าด้วยมอสซาเรลล่าชีส
                                    ใส่ท็อปปิ้งเป็นไก่ซอสพะแนง และโรยหน้าทับด้วยมอสซาเรลล่าชีสอีก 1 ชั้น</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img" style="background-image: url(assets/fn/images/pizza-6.jpg);"></div>
                        <div class="desc pl-3">
                            <div class="d-flex text align-items-center">
                                <h3><span>Pizza with Chicken Green Curry</span></h3>
                                <span class="price">149.00฿</span>
                            </div>
                            <div class="d-block">
                                <p>ทำจากแป้งพิซซ่าและซอสพิซซ่าสูตรพิเศษ โรยหน้าด้วยมอสซาเรลล่าชีส ใส่ท็อปปิ้ง
                                    เป็นไก่ในซอสเขียวหวาน โรยหน้าด้วยมอสซาเรลล่าชีสอีก 1 ชั้น</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img" style="background-image: url(assets/fn/images/pizza-7.jpg);"></div>
                        <div class="desc pl-3">
                            <div class="d-flex text align-items-center">
                                <h3><span>Ham and Sausage Pizza</span></h3>
                                <span class="price">$49.91</span>
                            </div>
                            <div class="d-block">
                                <p>ทำจากแป้งพิซซ่าและซอสพิซซ่าสูตรพิเศษ โรยหน้าด้วยมอสซาเรลล่าชีส ใส่ท็อปปิ้ง เป็นแฮมไก่
                                    และไส้กรอกรมควัน โรยหน้าทับด้วยมอสซาเรลล่าชีส อีก 1 ชั้น</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img" style="background-image: url(assets/fn/images/pizza-8.jpg);"></div>
                        <div class="desc pl-3">
                            <div class="d-flex text align-items-center">
                                <h3><span>Crab stick Sausage Pizza</span></h3>
                                <span class="price">149.00฿</span>
                            </div>
                            <div class="d-block">
                                <p>ทำจากแป้งพิซซ่า และซอสพิซซ่าสูตรพิเศษ โรยหน้าด้วยมอสซาเรลล่าชีส ใส่ท็อปปิ้งเป็นปูอัด
                                    และโรยหน้าทับด้วยมอสซาเรลล่าชีสอีก 1 ชั้น</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img" style="background-image: url(assets/fn/images/pizza-9.jpg);"></div>
                        <div class="desc pl-3">
                            <div class="d-flex text align-items-center">
                                <h3><span>Pizza with Cheese</span></h3>
                                <span class="price">149.00฿</span>
                            </div>
                            <div class="d-block">
                                <p>ทำจากแป้งพิซซ่า และซอสพิซซ่าสูตรพิเศษ โรยด้วย มอสซาเรลล่าชีส</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img" style="background-image: url(assets/fn/images/pizza-10.jpg);"></div>
                        <div class="desc pl-3">
                            <div class="d-flex text align-items-center">
                                <h3><span>Pizza with Sausage</span></h3>
                                <span class="price">149.00฿</span>
                            </div>
                            <div class="d-block">
                                <p>ทำจากแป้งพิซซ่า และซอสพิซซ่าสูตรพิเศษ โรยหน้าด้วยมอสซาเรลล่าชีส ใส่ท็อปปิ้ง
                                    เป็นไส้กรอกรมควัน และโรยหน้าทับด้วย มอสซาเรลล่าชีสอีก 1 ชั้น</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img" style="background-image: url(assets/fn/images/pizza-11.jpg);"></div>
                        <div class="desc pl-3">
                            <div class="d-flex text align-items-center">
                                <h3><span>Bacon Pizza</span></h3>
                                <span class="price">149.00฿</span>
                            </div>
                            <div class="d-block">
                                <p>ทำจากแป้งพิซซ่าและซอสพิซซ่าสูตรพิเศษ โรยหน้าด้วยมอสซาเรลล่าชีส ใส่ท็อปปิ้ง เป็นแฮมไก่
                                    โรยหน้าทับด้วยมอสซาเรลล่าชีสอีก 1 ชั้น</p>
                            </div>
                        </div>
                    </div>

                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img" style="background-image: url(assets/fn/images/pizza-12.jpg);"></div>
                        <div class="desc pl-3">
                            <div class="d-flex text align-items-center">
                                <h3><span>Pizza with Ham and Mushrooms</span></h3>
                                <span class="price">149.00฿</span>
                            </div>
                            <div class="d-block">
                                <p>ทำจากแป้งพิซซ่าและซอสพิซซ่าสูตรพิเศษ โรยหน้าด้วยมอสซาเรลล่าชีส ใส่ท็อปปิ้ง เป็นแฮมไก่
                                    และเห็ด โรยหน้าทับด้วยมอสซาเรลล่าชีส อีก 1 ชั้น</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
