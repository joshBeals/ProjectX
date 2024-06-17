<x-auth-layout>
    <div class="login-card login-dark">
        <div>
            <div><a class="logo" href=""><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo-1.png') }}" alt="looginpage"><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo.png') }}" alt="loginpage"></a></div>
            <div>
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
            </div> 
            <div class="login-main"> 
                <form class="theme-form" method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <h3>Confirm Password</h3>
                    <div class="alert alert-primary text-center my-4" role="alert">
                        This is a secure area of the application. Please confirm your password before continuing.
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <div class="form-input position-relative">
                        <input class="form-control" type="password" name="password" required="" placeholder="*********">
                        <div class="show-hide"><span class="show">                         </span></div>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <div class="text-end mt-3">
                            <button class="btn btn-primary btn-block w-100" type="submit">Confirm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-auth-layout>
