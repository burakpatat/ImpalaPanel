<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="container">
        <div class="footer-text">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ft-about">
                        <div class="logo">
                            <img src="{{asset('front/')}}/img/neamfooter.jpg" style="width:50%;height:50%; border-radius: 5px;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="ft-about">
                        <div class="fa-social" style="margin-top:60px;">
                            <a href="{{$config->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="{{$config->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="{{$config->linkedin}}" target="_blank"><i class="fa fa-tripadvisor"></i></a>
                            <a href="{{$config->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="ft-contact">
                        <h6>İletişim</h6>
                        <ul>
                            <li>(+90) 532 650 9657</li>
                            <li>info@neamakri.com</li>
                            <li>Kayaköy | Fethiye / Muğla / Turkey</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="co-text"><p>
                            &copy;<script>document.write(new Date().getFullYear());</script> Nea Makri Kayaköy | Design by <a href="http://impalasoftware.co/" target="_blank" style="color:#FF1850;">Impala Software</a>
                            <!-- Impala Software | Poison Develop --></p></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search model Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- Js Plugins -->
<script src="{{asset('front/')}}/js/jquery-3.3.1.min.js"></script>
<script src="{{asset('front/')}}/js/bootstrap.min.js"></script>
<script src="{{asset('front/')}}/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('front/')}}/js/jquery.nice-select.min.js"></script>
<script src="{{asset('front/')}}/js/jquery-ui.min.js"></script>
<script src="{{asset('front/')}}/js/jquery.slicknav.js"></script>
<script src="{{asset('front/')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('front/')}}/js/main.js"></script>
@yield('DifJS')

</body>

</html>
