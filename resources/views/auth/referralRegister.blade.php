<x-guest-layout>
    
<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <!-- <div class="card-header">
                <h4>Register</h4>
              </div> -->
              <div class="card-body">
                  <div class="row">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <!-- Email Address -->
        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="text-danger mb-2" />
        </div>

        <!-- Name -->
        <div class="form-group">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="form-control" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="text-danger mb-2" />
        </div>


        <!-- Password -->
        <div class="form-group">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="text-danger mb-2" />
        </div>

        <div class="form-group">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="form-control"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger mb-2" />
        </div>

        <div class="form-group">
            <x-input-label for="referral_code" value="Sponsor Email {{$userData[0]['email']}} {{$userData[0]['lastname']}}" class="text-danger mb-2"/>
            <input type="hidden" name="referral_code" class="form-control" value="{{$referral}}">
            <x-input-error :messages="$errors->get('referral_code')" class="text-danger mb-2" />
            
        </div>

        <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree" required>
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                    Already Registered? <a href="{{ route('login')}}">Login</a>
                  </div>
                </form>
              </div>
          </div>
</x-guest-layout>
