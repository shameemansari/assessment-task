@extends('layouts.guest')

@section('title', 'Employer Registration')

@section('content')
  <!--begin::Main-->
  <div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="d-flex" id="kt_login">
        <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat"
        style="background-image: url({{ asset('assets/media/bg/bg-3.jpg') }});">
            <div class="login-form text-center p-7 position-relative overflow-hidden">
                
            
                <!--begin::Login Sign up form-->
                <div class="login-signup" style="display: block;">
                    <div class="mb-10">
                        <h3>Employer Registration</h3>
                    </div>
                    <form class="form" method="POST" action="{{ route('register.employer.post') }}" class="form fv-plugins-bootstrap fv-plugins-framework">
                       @csrf
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                placeholder="First Name" name="first_name" value="{{ old('first_name') }}" />
                           @error('first_name')
                               <p class="text-danger font-weight-bold text-left m-0 mt-1 mb-0">
                                   {{ $message }}
                               </p>
                           @enderror
                        </div>
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" />
                           @error('last_name')
                               <p class="text-danger font-weight-bold text-left m-0 mt-1 mb-0">
                                   {{ $message }}
                               </p>
                           @enderror
                        </div>
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                placeholder="Email" name="email" autocomplete="off" value="{{ old('email') }}"  />
                           @error('email')
                                <p class="text-danger font-weight-bold text-left m-0 mt-1 mb-0">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="password"
                                placeholder="Password" name="password" />
                                @error('password')
                                <p class="text-danger font-weight-bold text-left m-0 mt-1 mb-0">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="password"
                                placeholder="Confirm Password" name="password_confirmation" />
                                @error('password_confirmation')
                                <p class="text-danger font-weight-bold text-left m-0 mt-1 mb-0">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
 
                        <div class="form-group mb-5" id="companyContainer">
                           <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                               placeholder="Company Name" id="company" name="company" value="{{ old('company') }}"  />
                               @error('company')
                               <p class="text-danger font-weight-bold text-left m-0 mt-1 mb-0">
                                   {{ $message }}
                               </p>
                           @enderror
                        </div>
 
                        
                        <div class="form-group mb-5 text-left">
                            <div class="checkbox-inline">
                                <label class="checkbox m-0">
                                    <input type="checkbox" name="agree" {{ old('agree', false) == 'on' }}  />
                                    <span></span>
                                    I Agree the <a href="javascript:void(0)" class="font-weight-bold ml-1">terms and
                                        conditions</a>.
                                       
                                </label>
                            </div>
                            @error('agree')
                                <p class="text-danger font-weight-bold text-left m-0 mt-1 mb-0">
                                    {{ $message }}
                                </p>
                            @enderror
                            <div class="form-text text-muted text-center"></div>
                        </div>
                        <div class="form-group d-flex flex-wrap flex-center mt-10">
                            <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Register</button>
                            <a href="{{ route('login') }}" class="btn btn-light-danger font-weight-bold px-9 py-4 my-3 mx-2">Cancel</a>
                        </div>
                    </form>
                </div>
                <!--end::Login Sign up form-->

               
            </div>
        </div>
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->
@endsection
