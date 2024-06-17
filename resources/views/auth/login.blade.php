<x-auth-layout>
    <div class="login-card login-dark">
        <div>
            <div><a class="logo" href=""><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo-1.png') }}" alt="looginpage"><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo.png') }}" alt="loginpage"></a></div>
            <div>
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
            </div> 
            <div class="login-main"> 
                <form class="theme-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h3>Sign in to account</h3>
                    <p>Enter your email & password to login</p>
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
                    <div class="form-group mb-0">
                        <div class="checkbox p-0">
                            <input id="checkbox1" type="checkbox">
                            <label class="text-muted" for="checkbox1">Remember password</label>
                        </div><a class="link" href="{{ route('password.request') }}">Forgot password?</a>
                        <div class="text-end mt-3">
                            <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                        </div>
                    </div>
                    <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="{{ route('register') }}">Create Account</a></p>
                </form>
            </div>
        </div>
    </div>
</x-auth-layout>
