<x-auth-layout>
    <div class="login-card login-dark">
        <div>
            <div><a class="logo" href=""><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo-1.png') }}" alt="looginpage"><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo.png') }}" alt="loginpage"></a></div>
            <div>
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
            </div> 
            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success text-center mb-4" role="alert">
                    A new verification link has been sent to the email address you provided during registration.
                </div>
            @endif
            <div class="login-main"> 
                <form class="theme-form" method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <h3>Verify your email</h3>
                    <p class="mt-2">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
                    <div class="form-group mb-0">
                        <div class="text-end mt-3">
                            <p>Didn't receive an email ? </p>
                            <button class="btn btn-primary btn-block w-100" type="submit">Resend Email</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-auth-layout>
