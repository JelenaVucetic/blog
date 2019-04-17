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
                    <button class="aside-btn"><i class="fa fa-bars"></i></button>
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <div class="search-form">
                        <input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
                        <button class="search-close"><i class="fa fa-times"></i></button>
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
