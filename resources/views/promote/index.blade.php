@extends('layouts.promote')
@section('content')

    <section class="home-slider owl-carousel img" style="background-image: url(assets/fn/images/bg_1.jpg);">
        <div class="slider-item">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text align-items-center" data-scrollax-parent="true">

                    <div class="col-md-6 col-sm-12 ftco-animate">
                        <span class="subheading">Delicious</span>
                        <h1 class="mb-4">Crab stick sausage pizza</h1>
                        <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a
                                href="{{ route('promote.menu') }}"
                                class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
                    </div>
                    <div class="col-md-6 ftco-animate">
                        <img src="assets/fn/images/12345.png" class="img-fluid" alt="">
                    </div>

                </div>
            </div>
        </div>

        <div class="slider-item">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text align-items-center" data-scrollax-parent="true">

                    <div class="col-md-6 col-sm-12 order-md-last ftco-animate">
                        <span class="subheading">Crunchy</span>
                        <h1 class="mb-4">Panang Chicken Pizza</h1>
                        <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a
                                href="{{ route('promote.menu') }}"
                                class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
                    </div>
                    <div class="col-md-6 ftco-animate">
                        <img src="assets/fn/images/1122.png" class="img-fluid" alt="">
                    </div>

                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image: url(assets/fn/images/bg_3.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <span class="subheading">Welcome</span>
                        <h1 class="mb-4">It's All delicious</h1>
                        <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a
                                href="{{ route('promote.menu') }}"
                                class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
                    </div>

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
                                <p>ถนนแฮปปี้แลนด์ แขวงคลองจั่น เขตบางกะปิ กรุงเทพฯ 10240</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-clock-o"></span></div>
                            <div class="text">
                                <h3>Open on Friday-Wednesday</h3>
                                <p>10:00am - 9:00pm</p>
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

    <section class="ftco-about d-md-flex">
        <div class="one-half img" style="background-image: url(assets/fn/images/about.jpg);"></div>
        <div class="one-half ftco-animate">
            <div class="heading-section ftco-animate ">
                <h2 class="mb-4">Welcome to <span class="flaticon-pizza">Giant Pizza</span></h2>
            </div>
            <div>
                <h5>It's All Delicious</h5>
                    <p>
                    เมนูพิซซ่าของเราแบ่งเป็น 2 ประเภท ได้แก่ พิซซ่าดั้งเดิม และพิซซ่าฟิวชั่น พิซซ่าดั้งเดิมประกอบด้วย
                    พิซซ่าไส้กรอก พิซซ่าปูอัด พิซซ่าแฮม พิซซ่าฮาวายเอี้ยน พิซซ่าซีฟู๊ดค็อกเทล และพิซซ่าชีสซี่
                    พิซซ่าทุกชนิดของเราทำด้วยแป้งสูตรพิเศษ ทาด้วยซอสพิซซ่าโฮมเมด โรยด้วยมอสซาเรลล่าชีส
                    แล้วใส่ท็อปปิ้งหน้าต่างๆ และโรยด้วยมอสซาเรลล่าชีสอีกชั้นหนึ่ง</p>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-services">
        <div class="overlay"></div>
        <div class="container">
        </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">menu recommend</h2>
                </div>
            </div>
        </div>
        <div class="container-wrap">
            <div class="row no-gutters d-flex">
                <div class="col-lg-4 d-flex ftco-animate">
                    <div class="services-wrap d-flex">
                        <a href="#" class="img" style="background-image: url(assets/fn/images/pizza-1.jpg);"></a>
                        <div class="text p-4">
                            <h3>Hawaiian Pizza</h3>
                            <p>ทำจากแป้งพิซซ่าและซอสพิซซ่าสูตรพิเศษ โรยหน้าด้วยมอสซาเรลล่าชีส ใส่ท็อปปิ้ง เป็นแฮมไก่ และสับปะรด โรยหน้าทับด้วยมอสซาเรลล่าชีส อีก 1 ชั้น</p>
                            <p class="price"><span>149.00฿</span> <a href="#"
                                    class="ml-2 btn btn-white btn-outline-white">Order</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex ftco-animate">
                    <div class="services-wrap d-flex">
                        <a href="#" class="img" style="background-image: url(assets/fn/images/pizza-2.jpg);"></a>
                        <div class="text p-4">
                            <h3>Seafood Cocktail Pizza</h3>
                            <p>ทำจากแป้งพิซซ่าและซอสพิซซ่าสูตรพิเศษ โรยหน้าด้วยน็อตซาเรลล่าชีส ใส่ท็อปปิ้ง เป็นกุ้ง ปู หมึกหลอด ในซอสต้มยำ โรยหน้าด้วยมอสซาเรลล่าชีส อีก 1 ชั้น</p>
                            <p class="price"><span>149.00฿</span> <a href="#"
                                    class="ml-2 btn btn-white btn-outline-white">Order</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex ftco-animate">
                    <div class="services-wrap d-flex">
                        <a href="#" class="img"
                            style="background-image: url(assets/fn/images/pizza-3.jpg);"></a>
                        <div class="text p-4">
                            <h3>Mala Pizza</h3>
                            <p> ทำจากแป้งพิซซ่า และซอสพิซซ่าสูตรพิเศษ โรยหน้าด้วยมอสซาเรลล่าชีส ใส่ท็อปปิ้ง เป็นแฮมและไส้กรอกรมควัน ในซอสหม่าล่า และโรยหน้าด้วยมอสซาเรลล่าชีสอีก 1 ชั้น</p>
                            <p class="price"><span>149.00฿</span> <a href="#"
                                    class="ml-2 btn btn-white btn-outline-white">Order</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
