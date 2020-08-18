<header id="header" class="header-one">
    <div class="container">
        <div class="row">
            <div class="logo-area clearfix">
                <div class="logo col-xs-12 col-md-2 col-sm-12">
                    <a href="{{'index'}}">
                        <img src="{{asset('images/mark_engineering.png')}}" width="90px" height="90px" alt="Mark Engineering Consultancy">
                    </a>
                </div><!-- logo end -->

                <div class="col-xs-12 col-md-10 col-sm-12">
                    <ul class="top-info-box">
                        <li>
                            <div class="info-box">
                                <div class="info-box-content">
                                    <p class="info-box-title">Call Us</p>
                                    <p class="info-box-subtitle">061-561914 (Head Office)</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="info-box">
                                <div class="info-box-content">
                                    <p class="info-box-title">Email Us</p>
                                    <p class="info-box-subtitle">mark.engineer2074@gmail.com</p>
                                </div>
                            </div>
                        </li>
                        <li class="last">
                            <div class="info-box last">
                                <div class="info-box-content">
                                    <p class="info-box-title">Working Hours</p>
                                    <p class="info-box-subtitle">Sunday - Friday : 10:00 AM - 5:30 PM</p>
                                </div>
                            </div>
                        </li>
                    </ul><!-- Ul end -->
                </div><!-- header right end -->
            </div><!-- logo area end -->

        </div><!-- Row end -->
    </div><!-- Container end -->

    <nav class="site-navigation navigation navdownz">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="site-nav-inner pull-left ">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="collapse navbar-collapse navbar-responsive-collapse ">
                            <ul class="nav navbar-nav">
                                <li class="{{request()->is('index') ?'active':'' }}">
                                    <a href="{{route('indexHome')}}">Home</a>
                                </li>

                                <li class="{{request()->is('about-us') ?'active':'' }}">
                                    <a href="{{'/about-us'}}">About Us </a>
                                </li>

                                <li class="{{request()->is('services') ?'active':'' }}">
                                    <a href="{{'/services'}}">Services </a>
                                </li>

                                <li class="{{request()->is('projects') ?'active':'' }}">
                                    <a href="{{'/projects'}}">Projects </a>
                                </li>

                                <li class="{{request()->is('careers') ?'active':'' }}">
                                    <a href="{{'/careers'}}">Careers </a>
                                </li>

                                <li class="{{request()->is('news') ?'active':'' }}">
                                    <a href="{{'/news'}}">News </a>
                                </li>

                                <li class="{{request()->is('contact') ?'active':'' }}">
                                    <a href="{{'/contact'}}">Contact</a>
                                </li>

                            </ul>
                            <!--/ Nav ul end -->
                        </div>
                        <!--/ Collapse end -->

                    </div><!-- Site Navbar inner end -->

                </div>
                <!--/ Col end -->
            </div>
            <!--/ Row end -->

        </div>
        <!--/ Container end -->

    </nav>
    <!--/ Navigation end -->
</header>