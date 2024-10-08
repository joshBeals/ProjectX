<x-app-layout>
    @include('partials.pageTitle', ['title' => "Dashboard", 'slug' => "Dashboard"])
    <!-- Container-fluid starts-->
    <div class="container-fluid default-dashboard ecommerce-dashboard">
        <div class="row">
            <div class="col-xxl-6 col-xl-5 col-lg-5 box-col-5">
            <div class="card welcome-card">
                    <div class="card-body">
                        <div class="d-flex"> 
                            <div class="flex-grow-1"> 
                                <h1>Hello, {{ $user->name }}.</h1>
                                <p>Welcome to the Xanbra!</p>
                            </div>
                            <div class="flex-shrink-0"> 
                                <img src="{{ asset('assets/images/dashboard/welcome.png') }}" alt="">
                            </div>
                            <div>  
                                <div class="clockbox">
                                    <svg id="clock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600">
                                    <g id="face">
                                        <circle class="circle" cx="300" cy="300" r="253.9"></circle>
                                        <path class="hour-marks" d="M300.5 94V61M506 300.5h32M300.5 506v33M94 300.5H60M411.3 107.8l7.9-13.8M493 190.2l13-7.4M492.1 411.4l16.5 9.5M411 492.3l8.9 15.3M189 492.3l-9.2 15.9M107.7 411L93 419.5M107.5 189.3l-17.1-9.9M188.1 108.2l-9-15.6"></path>
                                        <circle class="mid-circle" cx="300" cy="300" r="16.2"></circle>
                                    </g>
                                    <g id="hour">
                                        <path class="hour-hand" d="M300.5 298V142"></path>
                                        <circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
                                    </g>
                                    <g id="minute">
                                        <path class="minute-hand" d="M300.5 298V67">   </path>
                                        <circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
                                    </g>
                                    <g id="second">
                                        <path class="second-hand" d="M300.5 350V55"></path>
                                        <circle class="sizing-box" cx="300" cy="300" r="253.9">   </circle>
                                    </g>
                                    </svg>
                                    <div class="badge f-10 p-0" id="txt"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-7 col-lg-7 box-col-7">
                @include('partials.dashboardCards')
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</x-app-layout>
