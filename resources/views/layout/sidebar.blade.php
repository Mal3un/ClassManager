<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="assets/images/logo.png" alt="" height="16">
                    </span>
        <span class="logo-sm">
                        <img src="assets/images/logo_sm.png" alt="" height="16">
                    </span>
    </a>

    <!-- LOGO -->
{{--    <a href="index.html" class="logo text-center logo-dark">--}}
{{--                    <span class="logo-lg">--}}
{{--                        <img src="assets/images/logo-dark.png" alt="" height="16">--}}
{{--                    </span>--}}
{{--        <span class="logo-sm">--}}
{{--                        <img src="assets/images/logo_sm_dark.png" alt="" height="16">--}}
{{--                    </span>--}}
{{--    </a>--}}

    <div class="h-100" id="left-side-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="metismenu side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="uil-users-alt"></i>
                    <span> Sinh viên </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level mm-collapse " aria-expanded="false" style="">
                    <li>
                        <a href="apps-ecommerce-products.html">Thông tin sinh viên</a>
                    </li>
                    <li>
                        <a href="apps-ecommerce-products-details.html">Thêm sinh viên</a>
                    </li>
                    <li>
                        <a href="apps-ecommerce-orders.html">Orders</a>
                    </li>
                </ul>
            </li>
            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="uil-users-alt"></i>
                    <span> Môn học </span>
                    <span class="menu-arrow"></span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="uil-users-alt"></i>
                    <span> Sinh viên </span>
                    <span class="menu-arrow"></span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="mdi mdi-clipboard-text-multiple"></i>
                    <span> Phân công giảng dậy </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level mm-collapse " aria-expanded="false" style="">
                    <li>
                        <a href="{{route('manager.division.index')}}">Danh sách phần công</a>
                    </li>
                    <li>
                        <a href="{{route('manager.division.index2')}}">Phân công giảng dạy</a>
                    </li>
                </ul>
            </li>
            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="mdi mdi-google-classroom"></i>
                    <span> Lớp học </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level mm-collapse " aria-expanded="false" style="">
                    <li>
                        <a href="{{route('manager.classes.index')}}">Lớp học chính thức</a>
                    </li>
                    <li>
                        <a href="apps-ecommerce-products-details.html">Lớp học cải thiện</a>
                    </li>
                    <li>
                        <a href="apps-ecommerce-orders.html">Khác</a>
                    </li>
                </ul>
            </li>
            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class=" uil-chart-line"></i>
                    <span> Chương trình đào tạo </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level mm-collapse " aria-expanded="false" style="">
                    <li>
                        <a href="{{route('manager.majors.index')}}">Chương trình chính thức</a>
                    </li>
                    <li>
                        <a href="apps-ecommerce-products-details.html">Chương trình phụ</a>
                    </li>
                    <li>
                        <a href="apps-ecommerce-orders.html">Khác</a>
                    </li>
                </ul>
            </li>
            <li class="side-nav-item">
                <a href="{{route('manager.courses.index')}}" class="side-nav-link">
                    <i class="uil-graduation-hat"></i>
                    <span> Khóa học </span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
