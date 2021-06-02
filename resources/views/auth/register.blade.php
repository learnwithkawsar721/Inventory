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
                    <h4 class="text-white text-center mb-0">Register to {{ config('app.name') }}</h4>
                </div>
                <div class="card-body p-4 mt-2">
                    <form action="{{ route('register') }}" class="p-3" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                             <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                                value="{{ old('name') }}" id="name" placeholder="Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                             <label for="username" class="form-label">{{ __('Username') }}</label>
                            <input class="form-control @error('username') is-invalid @enderror" type="text" name="username"
                                value="{{ old('username') }}" id="username" placeholder="Username">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                         <div class="form-group mb-3">
                             <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                                value="{{ old('email') }}" id="username" placeholder="Email">
                            @error('email')
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
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        </div>



                        <div class="form-group text-center mt-5 mb-4">
                            <button class="btn btn-primary waves-effect width-md waves-light" type="submit"> Log In
                            </button>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-sm-12 text-center">
                                <a href="{{ route('login') }}">Already have account?</a>
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
