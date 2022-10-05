<div class="trending-bar-dark hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="trending-bar-title">Trending News</h3>
                <div class="trending-news-slider">
                    @foreach($newses as $key => $row)
                        @if($key <= 5)
                            <div class="item">
                                <div class="post-content">
                                    <h2 class="post-title title-sm">
                                        <a href="{{ route('single.post', $row->id) }}">{{ $row->title }}</a>
                                    </h2>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>


            <div class="col-md-12 col-sm-12 col-xs-12 top-nav-social-lists text-lg-right col-lg-4 ml-lg-auto">
                <ul class="list-unstyled mt-4 mt-lg-0">
                    <li>
                        <a href="https://www.facebook.com/arif.raihan.1069/">
                            <span class="social-icon">
                                <i class="fa fa-facebook-f"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span class="social-icon">
                                <i class="fa fa-twitter"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span class="social-icon">
                                <i class="fa fa-google-plus"></i>
                            </span>
                        </a>
                        <a href="#">
                            <span class="social-icon">
                                <i class="fa fa-youtube"></i>
                            </span>
                        </a>
                        <a href="https://www.linkedin.com/in/arif-raihan-6853b1202/">
                            <span class="social-icon">
                                <i class="fa fa-linkedin"></i>
                            </span>
                        </a>
                        <a href="https://www.pinterest.com/arifraihan387/">
                            <span class="social-icon">
                                <i class="fa fa-pinterest-p"></i>
                            </span>
                        </a>
                        <a href="https://github.com/Arif-Raihan99">
                            <span class="social-icon">
                                <i class="fa fa-github"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>

<header class="header-navigation d-none d-lg-block">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xs-12 col-sm-3 col-md-3">
                <!-- Logo -->
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('/') }}frontend/images/logos/logo.png" alt=""> <!-- Replace Logo Here -->
                    </a>
                </div>
                <!-- End Logo -->
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9">
                <div class="top-ad-banner float-right">
                    <a href="#">
                        <img src="{{ asset('/') }}frontend/images/banner-ads/ad-pro.png" class="img-fluid" alt="banner-ads">
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
