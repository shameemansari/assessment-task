@extends('layouts.guest')

@section('title', 'Reset Password')

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
                        <div class="mb-10">
                            <h3>Forgotten Password ?</h3>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form" id="resetForm" method="POST" action="{{ route('password.email') }}"
                            id="kt_login_forgot_form">
                            @csrf
                            <div class="form-group mb-10">
                                <input
                                    class="form-control form-control-solid h-auto py-4 px-8 @error('email') is-invalid @enderror"
                                    type="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="Enter your Registered email" name="email" />
                            </div>
                            <div class="form-group d-flex flex-wrap flex-center mt-10">
                                <button id="kt_login_forgot_submit"
                                    class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Send Password Reset
                                    Link</button>
                                <a href="{{ route('login') }}"
                                    class="btn btn-light-danger font-weight-bold px-9 py-4 my-3 mx-2">Cancel</a>
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


@push('scripts')
      
      <script>
      

        $("#resetForm").validate({
            highlight: function(element){
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element){
                $(element).removeClass('is-invalid');
            },
            rules: {
                'email': {
                    required: true,
                    email:true,
                    maxlength:255,
                },
            },
            messages: {
                'email': {
                    required: "Please enter Registered email",
                    email:"Email is invalid",
                    maxlength:"Your email must be atleast 255 characters long",
                },
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    

      </script>
      <!--end::Page Scripts-->
@endpush