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
                            <form class="form" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <input type="hidden" name="role" value="{{ $user->roles?->first()?->name }}">
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
                                            </div>
                                            
                                            @if(!empty($userData['resume']))
                                                <div class="col-12 mt-2 mb-4">
                                                    <a href="{{ asset('storage/resume/' . $userData['resume']) }}" target="_blank" download="{{ $userData['resume'] }}" class="btn btn-light-info btn-sm">Download Resume</a>
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
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
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
        $('#skillSet').select2({
            placeholder: 'Select a Skill',
        });
    </script>
@endpush
