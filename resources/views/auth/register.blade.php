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
                    <form class="form text-left" id="registerForm" method="POST" action="{{ route('register') }}" class="form fv-plugins-bootstrap fv-plugins-framework">
                       
                        @csrf
                        <div class="form-group mb-5">
                            <label>First Name <span class="text-danger">*</span></label>
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                placeholder="First Name" name="first_name" value="{{ old('first_name') }}" />
                           @error('first_name')
                               <p class="text-danger font-weight-bold text-left m-0 mt-1 mb-0">
                                   {{ $message }}
                               </p>
                           @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label>Last Name <span class="text-danger">*</span></label>
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" />
                           @error('last_name')
                               <p class="text-danger font-weight-bold text-left m-0 mt-1 mb-0">
                                   {{ $message }}
                               </p>
                           @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label>Username <span class="text-danger">*</span></label>
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                placeholder="Username" name="username" value="{{ old('username') }}" />
                           @error('username')
                               <p class="text-danger font-weight-bold text-left m-0 mt-1 mb-0">
                                   {{ $message }}
                               </p>
                           @enderror
                        </div>
                      
                        <div class="form-group mb-5">
                            <label>Email <span class="text-danger">*</span></label>
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                placeholder="Email" name="email" autocomplete="off" value="{{ old('email') }}"  />
                           @error('email')
                                <p class="text-danger font-weight-bold text-left m-0 mt-1 mb-0">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label>Password </label>
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="password"
                                placeholder="Password" name="password" id="password" />
                                @error('password')
                                <p class="text-danger font-weight-bold text-left m-0 mt-1 mb-0">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label>Confirm Password </label>
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
                                    <input type="checkbox" id="agree" name="agree" {{ old('agree', false) == 'on' }}  />
                                    <span></span>
                                    I Agree the <a href="javascript:void(0)" class="font-weight-bold ml-1">terms and
                                        conditions</a>.
                                       <label for="agree" class="error" style="display:none;margin:0 5px;"></label>
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

       

        $("#registerForm").validate({
            highlight: function(element){
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element){
                $(element).removeClass('is-invalid');
            },
            rules: {
                'first_name': {
                    required: true,
                    maxlength:100,
                },
                'last_name': {
                    required: true,
                    maxlength:100,
                },
                'username': {
                    required: true,
                    minlength:4,
                    maxlength:50,
                    nowhitespace:true,
                    alphanumeric:true,
                },
                'email': {
                    required: true,
                    email:true,
                    maxlength:255,
                },
                'password': {
                    required: true,
                    minlength: 8,
                    strongPassword:true,
                },
                'password_confirmation': {
                    required: true,
                    minlength: 8,
                    equalTo: "#password",
                    strongPassword:true,
                },
                'agree': {
                    required: true,
                },
                'company': {
                    required:function(element) {
                        return $("input[type='radio'][name='role']:checked").val() == 'employer';
                    }
                },
            },
            messages: {
                'first_name': {
                    required: "Please enter first name",
                    maxlength:"Your first name must be atleast 100 characters long",
                },
                'last_name': {
                    required: "Please enter last name",
                    maxlength:"Your last name must be atleast 100 characters long",
                },
                'password': {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long"
                },
                'username': {
                    required: "Please enter username",
                    maxlength:"Your username must be atleast 50 characters long",
                },
                'email': {
                    required: "Please enter Email",
                    email:"Email is invalid",
                    maxlength:"Your email must be atleast 255 characters long",
                },
                'password_confirmation': {
                    required: "Please provide confirmed password",
                    minlength: "Your password must be at least 8 characters long",
                    equalTo: "Your confirm password must match with password field"
                },
                'agree': {
                    required: "Please accept Terms & Conditions",
                },
                'company': {
                    required: "Please enter Company name",
                },
            
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    

      </script>
      <!--end::Page Scripts-->
@endpush