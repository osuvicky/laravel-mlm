<x-guest-layout>

<div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Profile</h4>
              </div>
              <div class="card-body">
              @if(Session::has('success'))
              <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{ Session::get('success') }}
                      </div>
                    </div>
                
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{ Session::get('error') }}
                      </div>
                    </div>               
                @endif
    <form method="POST" action="{{ route('biodataReg') }}">
        @csrf

        <div class="row">

        <div class="form-group col-6">
            <x-input-label for="firstname" :value="__('First Name')" />
            <x-text-input id="firstname" class="form-control" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="firstname" />
            <x-input-error :messages="$errors->get('firstname')" class="text-danger mb-2" />
        </div>

        <div class="form-group col-6">
            <x-input-label for="lastname" :value="__('Last Name')" />
            <x-text-input id="lastname" class="form-control" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" />
            <x-input-error :messages="$errors->get('lastname')" class="text-danger mb-2" />
        </div>

        <!-- <div class="form-group col-6">
            <x-input-label for="referral_code" :value="__('Referral Code')" />
            <x-text-input id="referral_code" class="form-control" type="text" name="referral_code" :value="old('referral_code')" autofocus autocomplete="referral_code" />
            <x-input-error :messages="$errors->get('referral_code')" class="text-danger mb-2" />
        </div> -->
          
        <!-- Email Address -->
        <!-- <div class="form-group col-6">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required  autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="text-danger mb-2" />
        </div>

        <div class="form-group col-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="form-control" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="text-danger mb-2" />
        </div> -->

        <div class="form-group col-4">
                      <label for="inputAddress">Phone Number</label>
                      <input type="text" id="phone" class="form-control" name="mobile" value="{{old('mobile')}}" autofocus autocomplete="mobile" required>
                      <x-input-error :messages="$errors->get('mobile')" class="text-danger mb-2" />
                    </div>

        <div class="form-group col-4">
                      <label>Gender</label>
                      <select class="form-control form-select" name="gender" required>
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                      <x-input-error :messages="$errors->get('gender')" class="text-danger mb-2" />
                    </div>

                    <div class="form-group col-4">
        <x-input-label for="date_of_birth" :value="__('Date')" />
            <x-text-input id="date_of_birth" class="form-control" type="date" name="date_of_birth" :value="old('date_of_birth')" required  autocomplete="date_of_birth" />
            <x-input-error :messages="$errors->get('date_of_birth')" class="text-danger mb-2" />
        </div>

        <div class="form-group col-12">
                      <label for="inputAddress">Address</label>
                      <input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St" value="{{old('address')}}" required>
                      <x-input-error :messages="$errors->get('address')" class="text-danger mb-2" />
                    </div>
        <div class="form-group col-4">
        <label>Country</label>
                <select id="country-dd" class="form-control form-select" name="country" required>
                <option value="">Select Country</option>
                @foreach($counteries as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
                </select>
                <x-input-error :messages="$errors->get('country')" class="text-danger mb-2" />
            </div>
            <div class="form-group col-4">
            <label>State</label>
                <select id="state-dd" class="form-control form-select" name="state"></select>
            </div>
            <div class="form-group col-4">
            <label>City</label>
                <select id="city-dd" class="form-control form-select" name="city"></select>
            </div>

        <!-- Password -->
        <!-- <div class="form-group col-6">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="form-control"
                            type="password"
                            name="password"
                            required    autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="text-danger mb-2" />
        </div>

        <div class="form-group col-6">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="form-control"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger mb-2" />
        </div> -->

                  <!-- <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree" required>
                      <label class="custom-control-label" for="agree">I agree with the <a href="#">terms and conditions</a> & <a href="#">privacy policy</a></label>
                    </div>
                  </div> -->
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Submit
                    </button>
                    <!-- Already Registered? <a href="{{ route('login')}}">Login</a> -->
                  </div>
                </form>
              </div>
          </div>
</x-guest-layout>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('#country-dd').change(function(event) {
            var idCountry = this.value;
            $('#state-dd').html('');
 
            $.ajax({
            url: "/api/fetch-state",
            type: 'POST',
            dataType: 'json',
            data: {country_id: idCountry,_token:"{{ csrf_token() }}"},
            success:function(response){
                $('#state-dd').html('<option value="">Select State</option>');
                $.each(response.states,function(index, val){
                $('#state-dd').append('<option value="'+val.id+'"> '+val.name+' </option>')
                });
                $('#city-dd').html('<option value="">Select City</option>');
            }
            })
        });
        $('#state-dd').change(function(event) {
            var idState = this.value;
            $('#city-dd').html('');
            $.ajax({
            url: "/api/fetch-cities",
            type: 'POST',
            dataType: 'json',
            data: {state_id: idState,_token:"{{ csrf_token() }}"},
            success:function(response){
                $('#city-dd').html('<option value="">Select City</option>');
                $.each(response.cities,function(index, val){
                $('#city-dd').append('<option value="'+val.id+'"> '+val.name+' </option>')
                });
            }
            })
        });
        });
    </script>
     <script>
   const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
 </script>