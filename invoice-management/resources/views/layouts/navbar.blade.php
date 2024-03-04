<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="#"><img src="@if(auth()->user()->profile_img == null) {{ asset('public/images/faces/face28.jpg')}} @else {{ url('/').'/public/images/'.auth()->user()->profile_img }}  @endif" class="mr-2" alt="logo"/><span>{{ auth()->user()->full_name }}</span></a>
        <a class="navbar-brand brand-logo-mini" href="#"><img src="@if(auth()->user()->profile_img == null) {{ asset('public/images/faces/face28.jpg')}} @else {{ url('/').'/public/images/'.auth()->user()->profile_img }}  @endif" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <div class="navbar-nav mx-lg-auto">
                <a class="nav-item nav-link active nav-main-title" href="#" aria-current="page">INVOICE SYSTEM</a>
        </div>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group search-border">

              <input type="search" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
                <div class="input-group-prepend hover-cursor mb-2" id="navbar-search-icon">
                    <span class="input-group-text" id="search">
                    <i class="icon-search"></i>
                    </span>
                </div>
            </div>
          </li>
        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
 @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
