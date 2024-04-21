<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="{{ route('index') }}" class="logo d-flex align-items-center">
      <h1>ZenBlog</h1>
    </a>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="{{ route('index') }}">Blog</a></li>
        <!-- <li><a href="#">Single Post</a></li> -->
        <li class="dropdown">
          <a><span>Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <ul>
            @foreach ($categories as $category)
            <li class="dropdown">
            <a href="{{ route('category',$category->slug) }}">{{ $category->name }}</a>
            </li>
            @endforeach
          </ul>
        </li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li>
          @if (Auth::guest())
          <a href="{{ route('login') }}">Login</a>
          @else
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
          @endif
        </li>
      </ul>
    </nav><!-- .navbar -->

    <div class="position-relative">
      <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
      <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
      <a href="#" class="mx-2"><span class="bi-instagram"></span></a>
      <a>
      <form action="{{ route('search') }}" method="GET">
        <input type="text" name="query" placeholder="Tìm kiếm...">
        <button type="submit">Tìm</button>
      </form>
      </a>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </div>

  </div>
</header><!-- End Header -->