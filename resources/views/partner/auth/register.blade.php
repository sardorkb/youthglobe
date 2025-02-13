@extends('layouts.master')

@section('title', 'Become a Partner | Youth Globe')

@section('main-content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7 col-sm-10">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Become a Partner</h4>
                        <div class="row mt-3">
                            <div class="col-12 text-center ms-auto">
                                <p class="text-white">Register to join the community</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Partner Registration Form -->
                    <form method="POST" action="{{ route('partner.register') }}" class="text-start">
                        @csrf

                        <!-- Username -->
                        <div class="input-group input-group-outline my-3">
                            <label for="username" class="form-label">{{ __('Username') }}</label>
                            <input id="username" type="text" name="username" class="form-control" :value="old('username')" required autofocus autocomplete="username">
                            @error('username')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="input-group input-group-outline my-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="email" name="email" class="form-control" :value="old('email')" required autocomplete="email">
                            @error('email')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="input-group input-group-outline mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" name="password" class="form-control" required autocomplete="new-password">
                            @error('password')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="input-group input-group-outline mb-3">
                            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
                            @error('password_confirmation')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">{{ __('Register') }}</button>
                        </div>

                        <p class="mt-3 text-sm text-center">
                            Already have an account? 
                            <a href="{{ route('partner.login') }}" class="text-info text-gradient font-weight-bold">{{ __('Log in') }}</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
