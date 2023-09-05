<x-guest-layout>

<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Verify Email</h4>
              </div>
              <div class="card-body">
                
                  <div class="row">
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Resend Link
                    </button>
                  </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <div class="mb-4 text-muted text-center">
            <button class="btn btn-outline-dark"><i class="fas fa-sign-out-alt"></i>Logout</button>
              </div>

            
        </form>
        
    </div>
</div>
</x-guest-layout>
