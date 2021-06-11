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
                        <li class="nav-item @if ($prefix == '' || $prefix == 'home') active @endif">
                            <a class="nav-link" href="{{ route('theme.home') }}">{{ trans('theme_general.home') }}</a>
                        </li>

                        <li class="nav-item @if ($prefix == 'community') active @endif">
                            <a class="nav-link" href="{{ route('theme.community') }}">{{ trans('theme_general.community') }}</a>
                        </li>

                        <li class="nav-item @if ($prefix == 'category') active @endif">
                            <a class="nav-link" href="{{ route('theme.community') }}">{{ trans('theme_general.category') }}</a>
                        </li>

                        <li class="nav-item dropdown dropdown-slide @if ($prefix == 'more') active @endif">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ trans('theme_general.more') }} <span><i class="fa fa-angle-down"></i></span>
                            </a>
                            <!-- Dropdown list -->
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('theme.about') }}">{{ trans('theme_general.about') }}</a>
                                <a class="dropdown-item" href="{{ route('theme.contact') }}">{{ trans('theme_general.contact') }}</a>
                                <a class="dropdown-item" href="{{ route('theme.store') }}">{{ trans('theme_general.store') }}</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto mt-10">
                        <li class="nav-item">
                            <a class="nav-link login-button" href="{{ route('theme.login') }}">{{ trans('theme_general.login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white add-button" href="{{ route('theme.register') }}"><i class="fa fa-plus-circle"></i>{{ trans('theme_general.register') }}</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
