<header class="main-header">
      <div class="container">
        <div class="row justify-content-between align-items-center">
        <div class="col-1 menu-icon" id="menu">
            <p class="text-light"><i class="fa-solid fa-bars"></i></p>
          </div>
          <div class="col-md-3 col-4 pc-col">
            <div class="header-logo pc-header-logo">
              <img src="{{asset('dist/front/assets/images/headerlogo.png')}}" alt="" />
            </div>
          </div>
          <div class="col-md-6 col-1 tap-menu">
            <ul class="main-menu" id="main-menu">
              <div class="close-icon" id="close-menu">
                <p><i class="fa-solid fa-xmark"></i></p>
              </div>
              <li><a href="i{{url('/')}}">الرئيسية</a></li>
              <li><a href="">تواصل معنا</a></li>
              <li class="login-btn">
                <a href="{{ route('login_doctor') }}" class="login">تسجيل دخول</a>
              </li>
            </ul>
          </div>
          <div class="col-md-3 col-6">
            <div class="login-btn pc-login-btn">
              <a href="{{ route('login_doctor') }}" class="login">تسجيل دخول</a>
            </div>
            <div class="header-logo mob-header-logo">
              <img src="{{asset('dist/front/assets/images/headerlogo.png')}}" alt="" />
            </div>
          </div>
        </div>
      </div>
    </header>