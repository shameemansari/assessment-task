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
                
                @include('components.alerts.success')
                @include('components.alerts.error')
            
                <!--begin::Login Sign up form-->
                <div class="login-signup" style="display: block;min-width:500px;">
                    <div class="mb-10">
                        <h3>Sign Up</h3>
                    </div>
                    <form class="form text-left" method="POST" action="{{ route('register') }}" class="form fv-plugins-bootstrap fv-plugins-framework">
                       
                        @csrf
                        <div class="form-group mb-5">
                            <label>First Name <span class="text-danger">*</span></label>
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                placeholder="First Name" required name="first_name" value="{{ old('first_name') }}" />
                           @error('first_name')
                               <p class="text-danger font-weight-bold text-left m-0 mt-1 mb-0">
                                   {{ $message }}
                               </p>
                           @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label>Last Name <span class="text-danger">*</span></label>
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                placeholder="Last Name" required name="last_name" value="{{ old('last_name') }}" />
                           @error('last_name')
                               <p class="text-danger font-weight-bold text-left m-0 mt-1 mb-0">
                                   {{ $message }}
                               </p>
                           @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label>Username <span class="text-danger">*</span></label>
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                placeholder="Username" required name="username" value="{{ old('username') }}" />
                           @error('username')
                               <p class="text-danger font-weight-bold text-left m-0 mt-1 mb-0">
                                   {{ $message }}
                               </p>
                           @enderror
                        </div>
                      
                        <div class="form-group mb-5">
                            <label>Email <span class="text-danger">*</span></label>
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                placeholder="Email" required name="email" autocomplete="off" value="{{ old('email') }}"  />
                           @error('email')
                                <p class="text-danger font-weight-bold text-left m-0 mt-1 mb-0">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label>Password </label>
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="password"
                                placeholder="Password" required name="password" />
                                @error('password')
                                <p class="text-danger font-weight-bold text-left m-0 mt-1 mb-0">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label>Confirm Password </label>
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="password"
                                placeholder="Confirm Password" required name="password_confirmation" />
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
                                                <input type="radio" name="role" value="seeker" @checked(old('role') == 'seeker')/>
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
                            <label>Company Name <span class="text-danger">*</span></label>
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                placeholder="Company Name" id="company" name="company" value="{{ old('company') }}" />
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


@push('scripts')
      <!--begin::Page Scripts(used by this page)-->
      <script src="{{ asset('assets/js/pages/custom/login/login-general.js') }}"></script>
      <script>
         $(document).ready(function(){
 
             function toggleInput(bool)
             {
                 if(bool) {
                    $('#companyContainer').show();
                    $('#designation').val('');
                 } else {
                     $('#company').val('');
                    $('#companyContainer').hide();
                 }
             }
 
             var role = `{{ old('role','employer') }}`;
 
             toggleInput(role == 'employer');
 
             $('input:radio[name=role]').change(function (evt) {
                 if (this.value == 'employer') {
                     toggleInput(true);
                 } else {
                     toggleInput(false);
                 }
             });
         });
      </script>
      <!--end::Page Scripts-->
@endpush