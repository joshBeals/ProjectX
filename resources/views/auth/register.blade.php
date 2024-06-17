<x-auth-layout>
    <div class="login-card login-dark">
        <div>
            <div><a class="logo" href=""><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo-1.png') }}" alt="looginpage"><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo.png') }}" alt="loginpage"></a></div>
            <div>
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
            </div> 
            <div class="login-main"> 
                <form class="theme-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <h4>Create your account</h4>
                    <p>Enter your personal details to create account</p>
                    <div class="form-group">
                        <label class="col-form-label">Company Name</label>
                        <input class="form-control" type="text" name="name" required="" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Email Address</label>
                        <input class="form-control" type="email" name="email" required="" placeholder="Test@gmail.com">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <div class="form-input position-relative">
                        <input class="form-control" type="password" name="password" required="" placeholder="*********">
                        <div class="show-hide"><span class="show">                         </span></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Confirm Password</label>
                        <div class="form-input position-relative">
                        <input class="form-control" type="password" name="password_confirmation" required="" placeholder="*********">
                        <div class="show-hide"><span class="show">                         </span></div>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <div class="checkbox p-0">
                            <input id="checkbox1" type="checkbox">
                            <label class="text-muted" for="checkbox1">Agree with<a class="ms-2" href="#">Privacy Policy</a></label>
                        </div>
                        <button class="btn btn-primary btn-block w-100" type="submit">Create Account</button>
                    </div>
                    <p class="mt-4 mb-0 text-center">Already have an account?<a class="ms-2" href="{{ route('login') }}">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</x-auth-layout>
