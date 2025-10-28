<footer class="footer-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>About Us</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Newsletter</h6>
                    <p>Stay update with our latest</p>
                    <form target="_blank" novalidate="true" action="#" method="get" class="form-inline">
                        <input class="form-control" name="EMAIL" placeholder="Enter Email"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required=""
                            type="email">
                        <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right"></i></button>
                    </form>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget mail-chimp">
                    <h6 class="mb-20">Instagram Feed</h6>
                    <ul class="instafeed d-flex flex-wrap">
                        @for ($i = 0; $i < 8; $i++)
                            <li><img src="{{ asset('assets/img/user/i1.jpg') }}" alt=""></li>
                        @endfor
                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Follow Us</h6>
                    <p>Let us be social</p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
            <p class="footer-text m-0">
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script>
                All rights reserved | Made with <i class="fa fa-heart-o"></i> by <a
                    href="https://colorlib.com">Colorlib</a>
            </p>
        </div>
    </div>
</footer>
