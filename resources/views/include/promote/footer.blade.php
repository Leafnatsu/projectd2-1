<footer class="ftco-footer ftco-section img">
    <div class="overlay"></div>
    <div class="container">
        <div class="row ">
            <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2 ">About Us</h2>
                    <p class="h5">ร้าน Giant Pizza ของคุณอาภัชรี เวชรเดชา
                        มีจุดเริ่มต้นจากการที่คุณอาภัชรีต้องการหารายได้เสริมจากการทำงานประจำ
                        จึงเริ่มจากการทำอาหารที่รักและต้องการท้าทายตัวเองโดยเลือกทำเมนูที่ตัวเองไม่เคยทำมาก่อน
                        ก็คือพิซซ่า โดยคุณอาภัชรีเริ่มจากการคิดสูตรและทดลองต่างๆ    
                        จนได้รสชาติที่อร่อยลงตัวและถูกปากลูกค้าเป็นอย่างมาก
                        จนตอนนี้คุณอาภัชรีได้ออกจากงานประจำแล้วหันมาทำร้านเต็มตัว</p>
                    {{-- <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul> --}}
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2 ">Contact Us</h2>
                    <div class="block-23 mb-3 h5">
                        <ul>
                            <li><span class="icon icon-map-marker h5"></span><span class="text">2456
                                    หมู่บ้านเสนาวิลล่าถนนแฮปปี้แลนด์ แขวงคลองจั่น เขตบางกะปิ กรุงเทพฯ 10240</span></li>
                            <li><a><span class="icon icon-phone h5"></span><span class="text">090 - 664 -
                                        6949</span></a></li>
                            <li><a><span class="icon icon-envelope h5"></span><span
                                        class="text">yaminlunla@hotmail.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2 h5">หน้าหลัก</h2>
                    <div class="block-23 mb-3 h5">
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">หน้าแรก</a>
                            </li>
                            <li>
                                <a href="{{ route('menu.index') }}">รายการสินค้า</a>
                            </li>
                            @auth
                            <li><a href="{{ route('cart.index') }}">
                                    ตะกร้าสินค้า
                                </a></li>
                            <li><a href="{{ route('order.index') }}">
                                    คำสั่งซื้อ
                                </a></li>
                            @else
                            <li><a href="{{ route('login') }}">
                                ตะกร้าสินค้า
                                </a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


<script src="{{ asset('assets/fn/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/fn/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('assets/fn/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/fn/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/fn/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('assets/fn/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/fn/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('assets/fn/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/fn/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/fn/js/aos.js') }}"></script>
<script src="{{ asset('assets/fn/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('assets/fn/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/fn/js/jquery.timepicker.min.js') }}"></script>
<script src="{{ asset('assets/fn/js/scrollax.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('assets/fn/js/google-map.js') }}"></script>
<script src="{{ asset('assets/fn/js/main.js') }}"></script>

<script src="{{ asset('assets/lightbox2/js/lightbox.min.js') }}"></script>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
