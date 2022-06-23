<!DOCTYPE html>
<html>
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Site favicon -->
    @php
        $logo = DB::table('logos')->select('*')->first();
    @endphp
    @if($logo)
        <link rel="icon" href="{{asset('uploads/logo/'.$logo->image)}}">
    @endif

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/styles/core.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/styles/icon-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/src/plugins/datatables/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/styles/style.css')}}">
    <!--summernote -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    @yield('styles')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>
<body>

<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
        <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
    </div>
    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <!--<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">-->
                <!--    <i class="dw dw-settings2"></i>-->
                <!--</a>-->
            </div>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="{{asset('assets/frontend/img/pwa-1.png')}}" alt="" height="50px">
						</span>
                    <span class="user-name">Admin</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <!--<a class="dropdown-item" href=""><i class="dw dw-user1"></i> Profile</a>-->
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="dw dw-logout"></i>logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div class="github-link">

        </div>
    </div>
</div>

<div class="left-side-bar">
    <div class="brand-logo">
        <a href="">
            <img src="{{asset('assets/frontend/img/pwa-1.png')}}" alt="" class="dark-logo" height="100px">
            <img src="{{asset('assets/frontend/img/pwa-1.png')}}" alt="" class="light-logo" height="100px">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li class="dropdown">
                    <a href="{{route('about.index')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1">
                        </span><span class="mtext">About Us</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('calendar.index')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar">
                        </span><span class="mtext">Calendar</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('slider.index')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-slideshow"></span>
                        <span class="mtext">Sliders</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('why.index')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-information"></span>
                        <span class="mtext">Why Prarambha?</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('admission.index')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-slideshow"></span>
                        <span class="mtext">Admission Details</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('logo.index')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-startup">
                        </span><span class="mtext">Logo</span>
                    </a>
                </li>
                <!--<li class="dropdown">-->
                <!--    <a href="{{route('message.index')}}" class="dropdown-toggle no-arrow">-->
                <!--        <span class="micon dw dw-message">-->
                <!--        </span><span class="mtext">Message From</span>-->
                <!--    </a>-->
                <!--</li>-->
                <li class="dropdown">
                    <a href="{{route('contact.index')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-phone-call">
                        </span><span class="mtext">Contact</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('event.index')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar1">
                        </span><span class="mtext">Events</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('faq.index')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-question"></span><span class="mtext">Faq</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('gallery.index')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-gallery"></span><span class="mtext">Gallery Image</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('policy.index')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-property"></span><span class="mtext">Policies</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('partner.index')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-user"></span><span class="mtext">Partners</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('link.index')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-link"></span><span class="mtext">Social Link</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('management.index')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-repeat"></span><span class="mtext">Management</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('facility.index')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-bar-chart1"></span><span class="mtext">Facility/Faculty</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('course.index')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-newspaper-1"></span><span class="mtext">Courses</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-add"></span><span class="mtext">Kindergarten</span>
                    </a>
                     <ul class="submenu">
                        <li><a href="{{route('kindergarten.index')}}">Kindergarten</a></li>
                        <li><a href="{{route('tab.index')}}">Tab</a></li>
                        <li><a href="{{route('tabimage.index')}}">Tabimage</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-add"></span><span class="mtext">School</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('school.index')}}">School Category</a></li>
                        <li><a href="{{route('level.index')}}">Level Data</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>

<div class="main-container">
    @yield('main-content')
</div>
<!-- summernote -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
<script>
    $('#description').summernote({
        height:100
    });
</script>
<!-- js -->
<script src="{{asset('assets/admin/vendors/scripts/core.js')}}"></script>
<script src="{{asset('assets/admin/vendors/scripts/script.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/scripts/process.js')}}"></script>
<script src="{{asset('assets/admin/vendors/scripts/layout-settings.js')}}"></script>
<script src="{{asset('assets/admin/src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/admin/src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/admin/src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/scripts/dashboard.js')}}"></script>
@yield('scripts')
</body>
</html>
