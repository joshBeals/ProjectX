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
                    <h3>Forgot Password</h3>
                    <div class="alert alert-primary text-center my-4" role="alert">
                        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one..
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Email Address</label>
                        <input class="form-control" type="email" name="email" required="" placeholder="Test@gmail.com">
                    </div>
                    <div class="form-group mb-0">
                        <div class="text-end mt-3">
                            <button class="btn btn-primary btn-block w-100" type="submit">Email Password Reset Link</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-auth-layout>
