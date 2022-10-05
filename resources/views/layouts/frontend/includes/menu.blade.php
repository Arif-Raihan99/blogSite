<div class="main-navbar clearfix bg-dark ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg site-main-nav navigation">
                    <a class="navbar-brand d-lg-none" href="index.html">
                        <img src="{{ asset('/') }}frontend/images/logos/footer-logo.png" alt="">
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Categories
                                </a>
                                <div class="dropdown-menu" >
                                    @foreach($categories as $category)
                                        <a class="dropdown-item" href="{{ route('single.category', $category->id) }}">{{ $category->name }}</a>
                                    @endforeach
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('create.post') }}">Create Post</a>
                            </li>

                            <li class="nav-item dropdown float-right">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user mr-2"></i>{{ Auth::check() ? Auth::user()->name : 'profile' }}
                                </a>
                                <div class="dropdown-menu" >
                                    @if(!\Illuminate\Support\Facades\Auth::check())
                                        <a class="dropdown-item" href="{{ route('login') }}">Log In</a>
                                        <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                                    @elseif(\Illuminate\Support\Facades\Auth::check())
                                        @if(isset($check))
                                            <a class="dropdown-item" href="{{ route('view.user') }}">View Profile</a>
                                            <a class="dropdown-item" href="{{ route('edit.user') }}">Edit Profile</a>
                                        @else
                                            <a class="dropdown-item" href="{{ route('add.user') }}">Add Profile</a>
                                        @endif
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                    @endif
                                </div>
                            </li>
                        </ul>
                        <div class="nav-search ml-auto d-none d-lg-block">
                            <form action="{{ route('search') }}" method="POST">
                                @csrf
                                <label for=""><input type="text" name="search" required></label>
                                <button type="submit">search</button>
                            </form>
                        </div>
                    </div>
                </nav>

            </div>
        </div>
    </div>
    <form class="site-search" method="get">
        <input type="text" id="searchInput" name="site_search" placeholder="Enter Keyword Here..." autofocus="">
        <div class="search-close">
            <span class="close-search">
                <i class="fa fa-times"></i>
            </span>
        </div>
    </form>
</div>
