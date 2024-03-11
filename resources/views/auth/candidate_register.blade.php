@extends('layouts.guest')

@section('title', 'Registration')

@section('content')
  <!--begin::Main-->
  <div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat"
        style="background-image: url({{ asset('assets/media/bg/bg-3.jpg') }});">
            <div class="login-form text-center p-7 position-relative overflow-hidden">
                
            
                <!--begin::Login Sign up form-->
                <div class="login-signup" style="display: block;">
                    <div class="mb-10">
                        <h3>Sign Up</h3>
                    </div>
                    <form class="form" method="POST" action="{{ route('register') }}" class="form fv-plugins-bootstrap fv-plugins-framework">
                       @csrf
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                placeholder="Name" name="name" value="{{ old('name') }}" />
                           @error('name')
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

                        <div class="form-group my-5">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="option" style="cursor: pointer">
                                        <span class="option-control">
                                            <span class="radio">
                                                <input type="radio" name="role" value="employer" @checked(old('role') == 'employer') checked/>
                                                <span></span>
                                            </span>
                                        </span>
                                        <span class="option-label">
                                            <span class="option-head">
                                                <span class="option-title">
                                                    Employer
                                                </span>
                                            </span>

                                        </span>
                                    </label>
                                </div>
                                <div class="col-lg-6">
                                    <label class="option" style="cursor: pointer">
                                        <span class="option-control">
                                            <span class="radio">
                                                <input type="radio" name="role" value="candidate" @checked(old('role') == 'candidate')/>
                                                <span></span>
                                            </span>
                                        </span>
                                        <span class="option-label">
                                            <span class="option-head">
                                                <span class="option-title">
                                                    Candidate
                                                </span>
                                               
                                            </span>
                                          
                                        </span>
                                    </label>
                                </div>
                                @error('role')
                                   <div class="px-4">
                                       <p class="text-danger font-weight-bold text-left m-0 mt-1 mb-0">
                                        {{ $message }}
                                       </p>
                                   </div>
                               @enderror
                            </div>
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

                        <div class="form-group mb-5" id="designationContainer">
                           <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                               placeholder="Candidate Designation" id="designation" name="designation" value="{{ old('designation') }}"  />
                               @error('designation')
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
                            <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Sign Up</button>
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
