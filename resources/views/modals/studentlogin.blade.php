<!-- Login/Register Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div id="flipContainer">
                <!-- Login Form -->
                <div id="loginForm">
                    <div class="card z-index-0 fadeIn3 fadeInBottom mb-0">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}" class="text-start">
                                @csrf
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Passport number</label>
                                    <input id="passport_number" type="passport_number" name="passport_number"
                                        class="form-control" required>
                                </div>
                                @if ($errors->has('passport_number'))
                                    <div class="mt-2 text-danger">
                                        @foreach ($errors->get('passport_number') as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label">Password</label>
                                    <input id="password" type="password" name="password" class="form-control" required>
                                </div>
                                @if ($errors->has('password'))
                                    <div class="mt-2 text-danger">
                                        @foreach ($errors->get('password') as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Log in</button>
                                </div>
                            </form>
                            <p class="text-center">
                                Don't have an account? <a href="#" class="text-info"
                                    id="showRegister">Register</a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Register Form (Hidden by Default) -->
                <div id="registerForm" class="d-none">
                    <div class="card z-index-0 fadeIn3 fadeInBottom mb-0">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Register</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}" class="text-start">
                                @csrf
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Full name</label>
                                    <input id="name" type="text" name="name" class="form-control"
                                        value="{{ old('name') }}" required autofocus autocomplete="name">
                                </div>
                                @if ($errors->has('name'))
                                    <div class="mt-2 text-danger">
                                        @foreach ($errors->get('name') as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Passport number (this will be your username)</label>
                                    <input id="register-passport_number" type="passport_number" name="passport_number"
                                        class="form-control" value="{{ old('passport_number') }}" required
                                        autocomplete="username">
                                </div>
                                @if ($errors->has('passport_number'))
                                    <div class="mt-2 text-danger">
                                        @foreach ($errors->get('passport_number') as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label">Password</label>
                                    <input id="register-password" type="password" name="password" class="form-control"
                                        required>
                                </div>
                                @if ($errors->has('password'))
                                    <div class="mt-2 text-danger">
                                        @foreach ($errors->get('password') as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label">Confirm password</label>
                                    <input id="register-password_confirmation" type="password"
                                        name="password_confirmation" class="form-control" required>
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <div class="mt-2 text-danger">
                                        @foreach ($errors->get('password_confirmation') as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="text-center">
                                    <button type="submit"
                                        class="btn bg-gradient-info w-100 my-4 mb-2">Register</button>
                                </div>
                            </form>
                            <p class="text-center">
                                Already have an account? <a href="#" class="text-info" id="showLogin">Login</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
