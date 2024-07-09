@extends('layouts.promote')
@section('content')

<section class="home-slider owl-carousel img" style="background-image: url(assets/fn/images/bg_1.png);">
    <div class="slider-item" style="background-image: url(assets/fn/images/bg_3.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <span class="subheading">Giant Pizza</span>
                    <h1 class="mb-4">It's All delicious</h1>
                    <p><a
                        href="{{ route('menu.index') }}"
                        class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="slider-item">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text align-items-center" data-scrollax-parent="true">
                    @foreach ($recommended_menu->slice(2,1) as $key => $item)
                        <div class="col-md-6 col-sm-12 ftco-animate">
                            <span class="subheading">Delicious</span>
                            <h1 class="mb-4">{{ $item->product->name }}</h1>
                            <p>
                                <a
                                    href="{{ route('menu.index') }}"
                                    class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3"
                                >
                                    View Menu
                                </a>
                            </p>
                        </div>
                        <div class="col-md-6 ftco-animate">
                            <img src="{{ asset($item->product->image) }}" class="img-fluid rounded-circle" alt="">
                        </div>
                    @endforeach
                        
                </div>
            </div>
        </div>

        <div class="slider-item">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text align-items-center" data-scrollax-parent="true">
                    @foreach ($recommended_menu->slice(3,1) as $key => $item)
                        <div class="col-md-6 col-sm-12 order-md-last ftco-animate">
                            <span class="subheading">Crunchy</span>
                            <h1 class="mb-4">{{ $item->product->name }}</h1>
                            <p>                                <a
                                href="{{ route('menu.index') }}"
                                class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3"
                            >
                                View Menu
                            </a></p>
                        </div>
                        <div class="col-md-6 ftco-animate">
                            <img src="{{ asset($item->product->image) }}" class="img-fluid rounded-circle" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </section>

    <section class="ftco-intro">
        <div class="container-wrap">
            <div class="wrap d-md-flex">
                <div class="info">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-phone"></span></div>
                            <div class="text">
                                <h3>090 - 664 - 6949</h3>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-my_location"></span></div>
                            <div class="text">
                                <h3>456 หมู่บ้านเสนาวิลล่า</h3>
                                <p class="text-light">ถนนแฮปปี้แลนด์ แขวงคลองจั่น เขตบางกะปิ กรุงเทพฯ 10240</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-clock-o"></span></div>
                            <div class="text">
                                <h3>Open on Friday-Wednesday</h3>
                                <p class="text-light">10:00am - 9:00pm</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social d-md-flex pl-md-5 p-4 align-items-center">
                    <ul class="social-icon">
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section class="ftco-about d-md-flex">
        <div class="one-half img mx-4" style="background-image: url(assets/fn/images/about.jpg);"></div>
        <div class="one-half ftco-animate">
            <div class="heading-section ftco-animate ">
                <h2 class="mb-4">Welcome to <span class="flaticon-pizza">Giant Pizza</span></h2>
            </div>
            <div>
                <h3>It's All Delicious</h3>
                    <p class="h5">
                    เมนูพิซซ่าของเราแบ่งเป็น 2 ประเภท ได้แก่ พิซซ่าดั้งเดิม และพิซซ่าฟิวชั่น พิซซ่าดั้งเดิมประกอบด้วย
                    พิซซ่าไส้กรอก พิซซ่าปูอัด พิซซ่าแฮม พิซซ่าฮาวายเอี้ยน พิซซ่าซีฟู๊ดค็อกเทล และพิซซ่าชีสซี่
                    พิซซ่าทุกชนิดของเราทำด้วยแป้งสูตรพิเศษ ทาด้วยซอสพิซซ่าโฮมเมด โรยด้วยมอสซาเรลล่าชีส
                    แล้วใส่ท็อปปิ้งหน้าต่างๆ และโรยด้วยมอสซาเรลล่าชีสอีกชั้นหนึ่ง</p>
            </div>
        </div>
    </section>
    <br>
    <section class="ftco-introl">
        <div class="container-wrap">
            <div class="wrap d-md-flex">
                <div class="social d-md-flex pl-md-5 p-4 align-items-center">
                    <ul class="social-icon">
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="ftco-section ftco-services ">
        <div class="overlay"></div>
        <div class="container">
            <hr>
            <div class="text-dark text-center h9 ">بِسْمِ ٱللَّٰهِ ٱلرَّحْمَٰنِ ٱلرَّحِيمِ</div>
            <hr>
    </section> --}}

    
        {{-- <table class="table">
            <tr>
                <th>no</th>
                <th>product</th>
                <th>qty</th>
            </tr>
            @foreach ($recommended_menu as $key => $item)
            <tr>
                <td>
                    {{ $key+1 }}
                </td>
                <td>
                    {{ $item->product_id }}
                </td>
                <td>
                    {{ $item->product->name }}
                </td>
            </tr>
            @endforeach
        </table> --}}


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Hot Menu</h2>
                </div>
            </div>
        </div>
        <div class="container-wrap">
            <div class="row no-gutters d-flex">
                @foreach ($recommended_menu->slice(6,3) as $key => $item)
                    <div class="col-lg-4 d-flex ftco-animate mx-auto">
                        <div class="services-wrap d-flex">
                            <a href="#" class="img border border-start-0 border-5" style="background-image">
                                <img 
                                    src="{{ asset($item->product->image) }}" 
                                    width="100%"
                                    height="100%"
                                    alt=""
                                >
                            </a>
                            <div class="text p-4">
                                <h3 class="text-dark">{{ $item->product->name }}</h3>
                                <p class="text-dark">{{ $item->product->detail }}</p>
                                <p class="price"><span class="text-dark">{{ $item->product->price }}฿</span>
                                    <a href="{{ route('menu.index') }}" class="ml-2 btn btn-dark btn-outline-white">View Menu</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@stop
