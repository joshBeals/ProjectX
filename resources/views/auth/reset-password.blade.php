<x-auth-layout>
    <div class="login-card login-dark">
        <div>
            <div><a class="logo" href=""><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo-1.png') }}" alt="looginpage"><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo.png') }}" alt="loginpage"></a></div>
            <div>
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
            </div> 
            <div class="login-main"> 
                <form class="theme-form" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <h3>Reset Password</h3>
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="form-group">
                        <label class="col-form-label">Email Address</label>
                        <input class="form-control" type="email" name="email" value="{{ $request->email }}" required readonly>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">New Password</label>
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
                        <div class="text-end mt-3">
                            <button class="btn btn-primary btn-block w-100" type="submit">Reset Password</button>
                        </div>
                    </div>
                    <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="{{ route('register') }}">Create Account</a></p>
                </form>
            </div>
        </div>
    </div>
</x-auth-layout>
