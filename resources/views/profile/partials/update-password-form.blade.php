
    <form method="post" action="{{ route('password.update') }}" class="needs-validation">
        @csrf
        @method('put')

        <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
            <x-input-label for="current_password" :value="__('Current Password')" />
            <x-text-input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="text-danger mb-2" />
        </div>

        <div class="form-group col-md-6 col-12">
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password" name="password" type="password" class="form-control" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="text-danger mb-2" />
        </div>

        <div class="form-group col-md-6 col-12">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="text-danger mb-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button class="btn btn-primary">Save Changes</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

