    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center justify-content-between no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="{{ route('home') }}">
                                    <img height="55px" width="230px" src="{{asset('img/attorney_logo.png')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-8">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ route('home')}}">home</a></li>
                                        <li><a href="{{ route('about')}}">About</a></li>
                                        <li><a href="contact.html">Contact</a></li>

                                        @auth

                                        @else
                                              <li><a href="{{ route('get.register')}}">Become an Attorney</a></li>
                                        @endauth
                                       
                                        {{-- <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">blog</a></li>
                                                <li><a href="single-blog.html">single-blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="elements.html">elements</a></li>
                                            </ul>
                                        </li> --}}
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div>
                            @auth
                            <a href="{{ route('get.attorney.profile.edit', Auth::user()->uuid) }}" style="background-color: rgb(242,198,77); color: white; border: none; padding: 10px 20px; cursor: pointer; text-decoration: none;">Attorney Profile</a>

                            <a href="{{ route('post.logout') }}" style="background-color: rgb(242,198,77); color: white; border: none; padding: 10px 20px; cursor: pointer; text-decoration: none;">Logout</a>
                            @else
                                <a href="{{ route('get.attorney.dashboard') }}" style="background-color: rgb(242,198,77); color: white; border: none; padding: 10px 20px; cursor: pointer; text-decoration: none;">Attorney Dashboard</a>
                                {{-- <a href="{{ route('get.register')}}" style="background-color: rgb(242,198,77); color: white; border: none; padding: 10px 20px; cursor: pointer;">Register</a> --}}
                            @endauth
                        </div>
                        {{-- <div class="col-xl-3 col-lg-2 d-none d-lg-block">
                            <div class="social_media_links">
                                <ul>
                                    <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                    <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                                    <li><a href="#"> <i class="fa fa-instagram"></i> </a></li>
                                </ul>
                            </div>
                        </div> --}}
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->