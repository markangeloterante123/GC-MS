<x-guest-layout>
    <x-jet-authentication-card>

        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
       
        <div class="register-title">
            <h2>Already a Member :)</h2>
            <p>To keep connected with us please login with information by email address and password</p>
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" id="password" required autocomplete="current-password" />
                <i class="fa fa-eye fa-eye-slash eye-slash"  id="togglePassword"></i>
            </div>

            <div class="row mt-4">
                <div class="col-6">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
                <div class="col-6">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </div>

            <div class="flex items-center mt-4">
                <button class="ml-4 btn-default btn-active">Login Now</button>
                <a href="{{ route('register') }}" class="ml-4 btn-default">Register Now</a>
            </div>
           <div class="mt-4">
                <span class="mt-4 span-text">Or you can join with</span>
                <div class="google-form btn-log ml-4">
                    <a href="{{ url('auth/google') }}" ><img src="{{ asset('img/google.png') }}" class="logo" alt=""></a> 
                </div>    
           </div>
            
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
