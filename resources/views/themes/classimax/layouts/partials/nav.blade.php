<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light navigation">
                <a class="navbar-brand" href="{{ route('theme.home') }}">
                    <img src="{{ asset('themes/classimax/images/logo.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto main-nav ">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('theme.home') }}">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('theme.home') }}">Community</a>
                        </li>
                        <li class="nav-item dropdown dropdown-slide">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Dashboard<span><i class="fa fa-angle-down"></i></span>
                            </a>

                            <!-- Dropdown list -->
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="dashboard.html">Dashboard</a>
                                <a class="dropdown-item" href="dashboard-my-ads.html">Dashboard My Ads</a>
                                <a class="dropdown-item" href="dashboard-favourite-ads.html">Dashboard Favourite Ads</a>
                                <a class="dropdown-item" href="dashboard-archived-ads.html">Dashboard Archived Ads</a>
                                <a class="dropdown-item" href="dashboard-pending-ads.html">Dashboard Pending Ads</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-slide">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pages <span><i class="fa fa-angle-down"></i></span>
                            </a>
                            <!-- Dropdown list -->
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('theme.about') }}">About Us</a>
                                <a class="dropdown-item" href="{{ route('theme.contact') }}">Contact Us</a>
                                <a class="dropdown-item" href="{{ route('theme.store') }}">Store Single</a>
                                <a class="dropdown-item" href="user-profile.html">User Profile</a>
                                <a class="dropdown-item" href="404.html">404 Page</a>
                                <a class="dropdown-item" href="package.html">Package</a>
                                <a class="dropdown-item" href="single.html">Single Page</a>
                                <a class="dropdown-item" href="single-blog.html">Single Post</a>
                                <a class="dropdown-item" href="blog.html">Blog</a>

                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto mt-10">
                        <li class="nav-item">
                            <a class="nav-link login-button" href="{{ route('theme.login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white add-button" href="{{ route('theme.register') }}"><i class="fa fa-plus-circle"></i> Register</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>