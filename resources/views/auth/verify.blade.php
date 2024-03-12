@extends('layouts.guest')

@section('title', 'Verify Your Email Address')

@section('content')
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
            <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat"
                style="background-image: url({{ asset('assets/media/bg/bg-3.jpg') }});">
                <div class="login-form text-center p-7 position-relative overflow-hidden">

                    <!--begin::Login forgot password form-->
                    <div class="login-forgot" style="display: block;">
                        <div>
                            <h5>
                                {{ __('Before proceeding, please check your email for a verification link.') }}
                            </h5>
                            <h6>
                                {{ __('If you did not receive the email') }}
                            </h6>
                        </div>
                        
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        <form class="form"  method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                           
                            <div class="form-group d-flex flex-wrap flex-center mt-10">
                                <button id="kt_login_forgot_submit"
                                    class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Click here to Request Another </button>
                                
                            </div>
                        </form>
                    </div>
                    <!--end::Login forgot password form-->
                </div>
            </div>
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->
@endsection

