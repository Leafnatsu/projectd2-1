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
                    @foreach ($recommended_menu->slice(0,1) as $key => $item)
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
                    @foreach ($recommended_menu->slice(1,1) as $key => $item)
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
                    <ul class="social-icon" style="width: 100%; height: auto; padding-bottom: 30%; position: relative;">
                        <li style="position: absolute; width: 100%; height: 100%; top: 0; left: 0;">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d576.0063025007262!2d100.64052671540321!3d13.785318513189845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d62186a242343%3A0x60da7c43ad9d2a3c!2zNDU2IOC4i-C4reC4oiDguYHguK7guJvguJvguLXguYnguYHguKXguJnguJTguYwgMSDguYHguKLguIEgMyDguYHguILguKfguIfguITguKXguK3guIfguIjguLHguYjguJkg4LmA4LiC4LiV4Lia4Liy4LiH4LiB4Liw4Lib4Li0IOC4geC4o-C4uOC4h-C5gOC4l-C4nuC4oeC4q-C4suC4meC4hOC4oyAxMDI0MA!5e0!3m2!1sth!2sth!4v1724701263024!5m2!1sth!2sth" 
                                style="border:0; width: 100%; height: 100%;" 
                                allowfullscreen="" 
                                loading="lazy">
                            </iframe>
                        </li>
                    </ul>
                </div>
                              
            </div>
        </div>
    </section>
    <br>
    <section class="ftco-about d-md-flex">
        <div class="one-half img mx-4" style="background-image: url(assets/fn/images/about.jpg);"></div>
        <div class="one-half ftco-animate " style="background-color: #fac564;">
            <div class="heading-section ftco-animate ">
                <h2 class="mb-4 text-dark">Welcome to <span class="flaticon-pizza text-dark">Giant Pizza</span></h2>
            </div>
            <hr>
            <div>
                <h3 class="text-dark">It's All Delicious</h3>
                    <p class="h5 text-dark">
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
                    <h1 class="mb-4">Best Seller</h1>
                </div>
            </div>
        </div>
        <div class="container-wrap">
            <div class="row no-gutters d-flex">
                @foreach ($recommended_menu->slice(0,3) as $key => $item)
                    <div class="col-lg-4 d-flex ftco-animate mx-auto">
                        <div class="services-wrap d-flex">
                            <a href="{{ asset($item->product->image) }}" data-lightbox="{{ $item->product->id }}"
                                data-title="{{ $item->product->name }}" class="img text-dark border border-start-0 border-5 border-dark"
                                style="background-image: url('{{ asset($item->product->image) }}'); background-size: cover; width: 50%;"></a>
                            <div class="text p-4 d-flex flex-column justify-content-between">
                                <div>
                                    <h4 class="text-dark"><b>{{ $item->product->name }}</b></h4>
                                    <hr>
                                    <small class="text-dark h5 mt-auto">{{ $item->product->detail }}</small>
                                </div>
                                <div class="mt-auto">
                                    <p class="text-dark h3">จำนวน</p>
                                    <form action="{{ route('cart.add') }}" method="post" class="mt-2 text-dark">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                        <input type="number" style="text-align:right;" name="quantity" value="1" min="1" class="form-control mb-2 text-dark">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <button type="submit" class="button">สั่งอาหาร</button>
                                            <span style="font-weight: bold; color: #343a40;">{{ number_format($item->product->price, 2) }}฿</span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@stop
