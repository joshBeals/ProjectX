<!-- Page Header Start-->
<div class="page-header">
    <div class="header-wrapper row m-0">
        <div class="header-logo-wrapper col-auto p-0">
        <div class="logo-wrapper"><a href=""><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo-1.png') }}" alt=""><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo.png') }}" alt=""></a></div>
        <div class="toggle-sidebar">
            <svg class="sidebar-toggle"> 
            <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-animation') }}"></use>
            </svg>
        </div>
        </div>
        <div class="left-header col-xxl-5 col-xl-6 col-md-4 col-auto box-col-6 horizontal-wrapper p-0">
        <div class="left-menu-header">
            <ul class="header-left"> 
            <li>
                <div class="form-group w-100"> 
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative d-flex">
                    <svg class="search-bg svg-color me-2">
                        <use href="{{ asset('assets/svg/icon-sprite.svg#fill-search') }}"></use>
                    </svg>
                    <input class="demo-input py-0 Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search anything..." name="q" title="">
                    </div>
                </div>
                </div>
            </li>
            </ul>
        </div>
        </div>
        <div class="nav-right col-xxl-7 col-xl-6 col-auto box-col-6 pull-right right-header p-0 ms-auto">
        <ul class="nav-menus">
            <li class="serchinput">
            <div class="serchbox">
                <svg>
                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-search') }}"></use>
                </svg>
            </div>
            <div class="form-group search-form') }}">
                <input type="text" placeholder="Search here...">
            </div>
            </li>
            <li class="profile-nav onhover-dropdown p-0">
            <div class="d-flex align-items-center profile-media"><img class="b-r-10 img-40" src="{{ asset('assets/images/dashboard/profile.png') }}" alt="">
                <div class="flex-grow-1"><span>Alen Miller</span>
                <p class="mb-0">UI Designer </p>
                </div>
            </div>
            <ul class="profile-dropdown onhover-show-div">
                <li><a href=""><i data-feather="user"></i><span>Account </span></a></li>
                <li><a href=""><i data-feather="log-in"> </i><span>Log in</span></a></li>
            </ul>
            </li>
        </ul>
        </div>
    </div>
    </div>
    <!-- Page Header Ends-->