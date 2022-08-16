@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>تسجيل الدخول</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    {{-- <link rel="shortcut icon" href="assetsassets/images/favicon.ico"> --}}

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app-dark.min.ar.css" rel="stylesheet" type="text/css" id="dark-style" />
    <link href="assets/css/app.min.ar.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="assets/css/page-auth.css" rel="stylesheet" type="text/css" id="light-style" />
</head>

<body id="ar" class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>
 <!-- Content -->

 <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index-2.html" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
  </span>
                <h1 class="app-brand-text demo text-body fw-bolder fs-3 text-center">نظام امن الفنادق</h1>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2 fw-bold">تسجيل الدخول  </h4>




            <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST" >
                @csrf
              <div class="mb-3">
                <label for="email" class="form-label">اسم المستخدم</label>
                <input type="text" class="form-control" id="email" placeholder="ادخل بريدك الاكتروني" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                @error('email')
                <div class="alert alert-danger" role="alert">
                    <strong> خطأ -</strong>{{ $message }}
                </div>
                @enderror
              </div>

              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">كلمة المرور</label>

                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" placeholder="ادخل كلمة المرور" name="password" required autocomplete="current-password">
                  @error('password')
                  <div class="alert alert-danger" role="alert">
                      <strong>خطأ -</strong>{{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox"  name="remember" {{ old('remember') ? 'checked' : '' }} id="remember-me">
                  <label class="form-check-label" for="remember-me">
                    ذكرني لاحقا
                  </label>
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">تسجيل الدخول</button>
              </div>
            </form>

          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

  <!-- / Content -->

    {{-- <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="auth-brand text-center text-lg-start">
                        <a href="index.html" class="logo-dark">
                            <span><img src="{{asset('assets/images/logoDark.png')}}" alt="" height="18"></span>
                        </a>
                        <a href="index.html" class="logo-light">
                            <span><img src="assets/images/logo.png" alt=""></span>
                        </a>
                    </div>
                    @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>{{ session()->get('error') }} </strong>
                    </div>
                    @endif

                    <!-- title-->
                    <h4 class="mt-1 heading">تسجيل الدخول</h4>
                    <p class="text-muted ">فضلا قم بتسجيل الدخول بحسابك لتستطيع المشاركه في المزادات المتاحه</p>

                    <!-- form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="emailaddress" class="form-label">البريد الاكتروني</label>
                            <input class="form-control" type="email" id="emailaddress" required="" placeholder="ادخل بريدك الاكتروني" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                            @error('email')
                            <div class="alert alert-danger" role="alert">
                                <strong> خطأ -</strong>{{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">كلمة المرور</label>
                            <input class="form-control" type="password" id="password" placeholder="ادخل كلمة المرور" name="password" required autocomplete="current-password">
                            @error('password')
                            <div class="alert alert-danger" role="alert">
                                <strong>خطأ -</strong>{{ $message }}
                            </div>
                            @enderror
                            <a href="{{ route('password.request') }}" class="text-muted float-end"><small>هل نسيت كلمة المرور؟</small></a>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input checkBox" id="checkbox-signin" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="checkbox-signin">تذكرني</label>
                            </div>
                        </div>
                        <div class="d-grid mb-0 text-center">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i> تسجيل الدخول </button>
                        </div>

                        <!-- social-->
                        <div class="text-center mt-4">
                            <p class="text-muted font-16">تسجيل حسابك بواسطة</p>
                            <ul class="social-list list-inline mt-3">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </form>
                    <!-- end form-->

                    <!-- Footer-->
                    <footer class="footer footer-alt">
                        @if (Route::has('password.request'))
                        <!-- {{ route('password.request') }} -->
                        <p class="text-muted">لا تمتلك اي حساب قم بانشاء حسابك الان ؟ <a href="{{ route('register') }}" class="text-muted ms-1"><b>انشاء حساب</b></a></p>
                        @endif
                    </footer>

                </div> <!-- end .card-body -->
            </div> <!-- end .align-items-center.d-flex.h-100-->
        </div>
        <!-- end auth-fluid-form-box-->

        <!-- Auth fluid right content -->
        <div class="auth-fluid-right text-center">
            <div class="auth-user-testimonial">
                <h2 class="mb-3">منصة مزادي كار اكبر منصة لمزاد السيارات في اليمن </h2>
                <p class="lead"><i class="mdi mdi-format-quote-open"></i>لكل الاشخاص الراغبين عن مزاد للسيارات في جميع اننحاء الجمهورية اليمنية جاءت منصة مزادي كار لتخفيف عنائكم مع امكانية التوصيل الى جميع المحافظات فقط عليكم الاشتراك بالمنصة<i class="mdi mdi-format-quote-close"></i>
                </p>

            </div> <!-- end auth-user-testimonial-->
        </div>
        <!-- end Auth fluid right content -->
    </div>
    <!-- end auth-fluid--> --}}

    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

</body>

</html>
