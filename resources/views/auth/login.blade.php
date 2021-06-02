@extends('layouts.auth')
@section('title')
    Login
@endsection

@section('auth')

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">
                <div class="card-header bg-img p-5 position-relative">
                    <div class="bg-overlay"></div>
                    <h4 class="text-white text-center mb-0">Login to {{ config('app.name') }}</h4>
                </div>
                <div class="card-body p-4 mt-2">
                    <form action="{{ route('login') }}" class="p-3" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                             <label for="login" class="form-label">{{ __('Email/Username') }}</label>
                            <input class="form-control @error('login') is-invalid @enderror" type="text" name="login"
                                value="{{ old('login') }}" id="login" placeholder="Email/Username">
                            @error('login')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                           <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                 <input class="custom-control-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">Remember me</label>
                            </div>
                        </div>

                        <div class="form-group text-center mt-5 mb-4">
                            <button class="btn btn-primary waves-effect width-md waves-light" type="submit"> Log In
                            </button>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-sm-7">
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"><i class="fa fa-lock mr-1"></i> Forgot your password?</a>
                                @endif
                            </div>
                            <div class="col-sm-5 text-right">
                                <a href="{{ route('register') }}">Create an account</a>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->

            <!-- end row -->

        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
