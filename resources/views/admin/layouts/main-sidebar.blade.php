<div class="leftside-menu">

    <!-- LOGO -->
    <a href="#" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="{{asset('assets/images/logo-dash.png')}}" alt="" height="40">
                    </span>
        <span class="logo-sm">
                        <img src="{{asset('assets/images/logo_sm.png')}}" alt="" height="30">
                    </span>
    </a>
    <a href="#" class="logo text-center logo-dark">
        <h1>نظام امن الفنادق</h1>
    </a>
    <!-- LOGO -->
    <a href="#" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="16">
                    </span>
        <span class="logo-sm">
                        <img src="{{asset('assets/images/logo_sm_dark.png')}}" alt="" height="16">
                    </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">لوحة التحكم</li>
            <li class="side-nav-item">
                <a href="{{route('admin')}}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span>الرئيسية</span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                    <i class="uil-users-alt"></i>
                    <span> الفنادق </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarProjects">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('list-user')}}">عرض الفنادق</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLayouts" aria-expanded="false" aria-controls="sidebarLayouts" class="side-nav-link">
                    <i class="mdi mdi-shield-lock-outline"></i>
                    <span>المطلوبين</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarLayouts">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('list_policies')}}">عرض المطلوبين</a>
                        </li>
                        {{-- <li>
                            <a href="{{route('add_policies')}}">إضافة سياسة </a>
                        </li> --}}

                    </ul>
                </div>
            </li>
            
            {{-- <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                    <i class="mdi mdi-car-back"></i>
                    <span> المزادات </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEmail">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="#">أضافة مزاد جديد</a>
                        </li>
                        <li>
                            <a href="#">مراجعة مزادات</a>
                        </li>
                    </ul>
                </div>
            </li> --}}
           

             
{{--            <li class="side-nav-item">--}}
{{--                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">--}}
{{--                    <i class="uil-envelope"></i>--}}
{{--                    <span> التقارير </span>--}}
{{--                    <span class="menu-arrow"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="sidebarPages">--}}
{{--                    <ul class="side-nav-second-level">--}}
{{--                        <li>--}}
{{--                            <a href="#">تقارير يومية</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">تقارير اسبوعية</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">تقارير شهرية</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="dripicons-location"></i>
                    <span> العنوان </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('add_state') }}"> اضافة محافظة</a>
                        </li>
                        <li>
                            <a href="{{ route('list_state') }}">عرض المحافظات </a>
                        </li>
                        <li>
                            <a href="{{ route('add_city')}}"> اضافة مدينة</a>
                        </li>
                        <li>
                            <a href="{{ route('list_City')}}"> عرض المدن</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="{{route('report')}}" class="side-nav-link">
                    <i class="dripicons-wallet"></i>
                    <span>التقارير</span>
                </a>
            </li>

            
           
{{--            <li class="side-nav-item">--}}
{{--                <a href="#" class="side-nav-link">--}}
{{--                    <i class="uil-database"></i>--}}
{{--                    <span>نسخة احتياطية </span>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="side-nav-item">--}}
{{--                <a href="#" class="side-nav-link">--}}
{{--                    <i class="dripicons-gear"></i>--}}
{{--                    <span>الإعدادات</span>--}}
{{--                </a>--}}
{{--            </li>--}}







        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->


