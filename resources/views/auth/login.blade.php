@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
            <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat"
                style="background-image: url({{ asset('assets/media/bg/bg-3.jpg') }});">
                <div class="login-form text-center p-7 position-relative overflow-hidden">

                    <!--begin::Login Sign in form-->
                    <div class="login-signin" style="min-width: 400px;">
                        <div class="mb-10">
                            <h3>Login</h3>
                        </div>
                        <form class="form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-5">
                                <input
                                    class="form-control h-auto form-control-solid py-4 px-8 @error('username') is-invalid @enderror"
                                    type="username" placeholder="Username" name="username" autocomplete="off" />
                                @error('username')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-5">
                                <input
                                    class="form-control h-auto form-control-solid py-4 px-8 @error('password') is-invalid @enderror"
                                    type="password" placeholder="Password" name="password" />
                                @error('password')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                                <div class="checkbox-inline">
                                    <label class="checkbox m-0 text-muted">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />
                                        <span></span>
                                        Remember me
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}" class="text-muted text-hover-primary">Forgot
                                    Password ?</a>
                            </div>
                            <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 mt-3 mx-4">Sign
                                In</button>
                        </form>
                        <div class="mt-5 d-flex flex-column bg-white py-4">
                            <a href="{{ route('register.employer') }}"
                                class="my-2 text-success font-weight-bolder text-hover-primary font-weight-bold ">Employer Registration</a> 
                            <a href="{{ route('register.seeker') }}"
                                class="my-2 text-success font-weight-bolder text-hover-primary font-weight-bold ">Job Seeker Registration</a>
                        </div>
                         
                    </div>
                    <!--end::Login Sign in form-->

                </div>
            </div>
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->
@endsection
