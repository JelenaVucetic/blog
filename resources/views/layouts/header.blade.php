<!-- Header -->
<header id="header">
    <!-- Nav -->
    <div id="nav">
        <!-- Main Nav -->
        <div id="nav-fixed">
            <div class="container">
                <!-- logo -->
                <div class="nav-logo">
                    <a href="/" class="logo"><img src="/images/logo.png" alt=""></a>
                </div>
                <!-- /logo -->

                <!-- nav -->
                @foreach ($categories as $category)

                <ul class="nav-menu nav navbar-nav">
                <li class="cat-1"><a href="/categories/{{$category->id}}">{{$category->name}}</a></li>
                </ul>
                @endforeach
                <!-- /nav -->

                <!-- search & aside toggle -->
                <div class="nav-btns">
                    @guest
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif

                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a href="/posts/create" class="dropdown-item" >Create Post</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                @endguest
                    <form action="/search" method="POST" role="search">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="q"
                                placeholder="Search posts"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <button class="aside-btn"><i class="fa fa-bars"></i></button>
                    <div class="search-form">
                        <button class="search-close"><i class="fa fa-times"></i></button>
                        <input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
                    </div>
                </div>
                <!-- /search & aside toggle -->
            </div>
        </div>
        <!-- /Main Nav -->

        @include('layouts.aside-nav')
    </div>
    <!-- /Nav -->
    @include('layouts.hero')
</header>
<!-- /Header -->

