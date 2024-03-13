@extends('layouts.guest')

@section('title', 'Profile')

@section('content')

    <div class="content d-flex flex-column flex-column-fluid">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b example example-compact">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Update Profile
                                </h3>

                            </div>

                            @include('components.alerts.success')
                            @include('components.alerts.error')

                            <!--begin::Form-->
                            <form class="form" id="profileForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <input type="hidden" name="role" id="role" value="{{ $user->roles?->first()?->name }}">
                                    <div class="form-group row">
                                        <div class="col-lg-4 mb-4">
                                            <label>First Name:</label>
                                            <input type="text" name="first_name" value="{{ $user->first_name }}"
                                                class="form-control" placeholder="Enter first name">
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <label>Last Name:</label>
                                            <input type="text" name="last_name" value="{{ $user->last_name }}"
                                                class="form-control" placeholder="Enter last name">
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <label>Email:</label>
                                            <input type="email" name="email" value="{{ $user->email }}"
                                                class="form-control">
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <label>Username:</label>
                                            <input type="text" name="username" value="{{ $user->username }}"
                                                class="form-control">
                                        </div>
                                        @role('employer')
                                            <div class="col-lg-4 mb-4">
                                                <label>Company:</label>
                                                <input type="text" name="company" value="{{ $userData['company'] ?? null }}"
                                                    class="form-control">
                                            </div>
                                        @endrole

                                        @role('seeker')
                                            <div class="col-lg-4 mb-4">
                                                <label>Title ( Designation ) :</label>
                                                <input type="text" name="title"
                                                    value="{{ $userData['title'] ?? null }}" class="form-control">
                                            </div>
                                            <div class="col-lg-4 mb-4">
                                                <label>Experience:</label>
                                                <input type="number" name="experience"
                                                    value="{{ $userData['experience'] ?? 0.0 }}" step="0.1" min="0"
                                                    max="99" class="form-control">
                                            </div>
                                            <div class="col-lg-8 mb-4">
                                                <label>Skill Set : </label>
                                                <select class="form-control select2" id="skillSet" name="skills[]"
                                                    multiple="multiple">
                                                    @foreach ($allSkills as $skillId => $skillName)
                                                        <option @selected(in_array($skillId, $userData['skills'])) value="{{ $skillId }}">{{ $skillName }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="skillSet" style="display: none;margin:0 5px;" class="error"></label>
                                            </div>
                                            <div class="col-lg-4 mb-4">
                                                <label>Location : </label>
                                                <select class="form-control" id="location_id" name="location_id">
                                                    <option value="" disabled selected>Select Location</option>
                                                    @foreach ($userData['allLocations'] as $locationId => $locationName)
                                                        <option @selected($locationId == $userData['location_id']) value="{{ $locationId }}">{{ $locationName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-4 mb-4">
                                                <label>Job Type : </label>
                                                <select class="form-control" id="job_type_id" name="job_type_id">
                                                    @foreach ($userData['jobTypes'] as $jobId => $jobTypeName)
                                                        <option @selected($jobId == $userData['job_type_id']) value="{{ $jobId }}">{{ $jobTypeName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            
                                            @if(!empty($userData['resume']))
                                                <div class="col-12 mt-2 mb-4" id="resumeContainer">
                                                    <a href="{{ asset('storage/resume/' . $userData['resume']) }}" id="resumeDownloadLink" target="_blank" download="{{ $userData['resume'] }}" class="btn btn-light-info btn-sm">Download Resume</a>
                                                    <button type="button" id="resumeDelete" data-url="{{ route('resume.delete') }}" class="btn btn-danger btn-sm ml-4">
                                                        <i class="text-white flaticon2-trash"></i>
                                                    </button>
                                                </div>

                                            @endif
                                                <div class="col-lg-4 mb-4">
                                                    <label>Resume</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="resume" accept="application/pdf" id="">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                </div>
                                            
                                        @endrole

                                    </div>

                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-right">
                                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card-->


                    </div>
                </div>

            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection


@push('scripts')
    <script>
        var isEmployer = ($("#role").val() == 'employer') ;

        $('#skillSet').select2({
            placeholder: 'Select a Skill',
        });

        $("#profileForm").validate({
            highlight: function(element){
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element){
                $(element).removeClass('is-invalid');
            },
            rules: {
                'first_name': {
                    required: true,
                    maxlength:255,
                },
                'last_name': {
                    required: true,
                    maxlength:255,
                },
                'username': {
                    required: true,
                    minlength:4,
                    maxlength:255,
                    nowhitespace:true,
                    alphanumeric:true,
                },
                'email': {
                    required: true,
                    email:true,
                    maxlength:255,
                },
                'company': {
                    required:function(element) {
                        return isEmployer;
                    },
                    maxlength:150,
                },
                'title': {
                    required:function(element) {
                        return !isEmployer;
                    },
                },
                'experience': {
                    required:function(element) {
                        return !isEmployer;
                    },
                    range:[0,80],
                },
                'skills[]': {
                    required:function(element) {
                        return !isEmployer;
                    },
                },
                'location_id': {
                    required:function(element) {
                        return !isEmployer;
                    },
                },
                'job_type_id': {
                    required:function(element) {
                        return !isEmployer;
                    },
                },
                'resume': {
                    required:function(element) {
                        return !isEmployer && !($(`#resumeDownloadLink`).length);
                    },
                    extension: "pdf"
                },
            },
            messages: {
                'first_name': {
                    required: "Please enter first name",
                    maxlength:"Your first name must be atleast 255 characters long",
                },
                'last_name': {
                    required: "Please enter last name",
                    maxlength:"Your last name must be atleast 255 characters long",
                },
                'username': {
                    required: "Please enter username",
                    maxlength:"Your username must be atleast 255 characters long",
                },
                'email': {
                    required: "Please enter Email",
                    email:"Email is invalid",
                    maxlength:"Your email must be atleast 255 characters long",
                },
                'company': {
                    required: "Please enter Company name",
                },
                'title': {
                    required: "Please enter Designation / Title",
                },
                'experience': {
                    required: "Please enter Experience",
                },
                'skills[]': {
                    required: "Please select atleast one Skill",
                },
                'job_type_id': {
                    required: "Please select Job type",
                },
                'location_id': {
                    required: "Please select Location",
                },
                'resume': {
                    required: "Please upload a pdf file",
                    extension: 'Please provide PDF file only',
                },
            
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        $(document).on('click', '#resumeDelete', function() {
                const deleteUrl = $(this).data('url');
                Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel!",
                        reverseButtons: true
                    }).then(function(result) {
                        if (result.value) {

                            $.ajax({
                                url: deleteUrl,
                                type: 'DELETE',
                                dataType: 'json',
                                success: function(response) {
                                 
                                    if(response.status) {
                                        Swal.fire({
                                            icon: "success",
                                            title: response.message,
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                    }
                                    if($(`#resumeContainer`).length) {
                                        $(`#resumeContainer`).hide();
                                    }
                                },
                                error: function(reject){
                                 
                                    Swal.fire(
                                        "Failed",
                                        "Failed to delete job post",
                                        "error"
                                    )
                                }
                            });
                          
                        } else if (result.dismiss === "cancel") {
                           
                            Swal.fire({
                                icon: "info",
                                title: "Resume file is safe ",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
            });
    
    </script>
@endpush
