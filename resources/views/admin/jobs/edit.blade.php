@extends('layouts.guest')

@section('title', 'Edit Post Job')

@section('content')
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <div class="row justify-content-center">

                    <div class="col-lg-7">

                        <!--begin::Card-->
                        <div class="card card-custom example example-compact">
                            <div class="card-header">
                                <h3 class="card-title mx-auto">
                                    Edit Posted Job
                                </h3>
                            </div>

                            @include('components.alerts.success')
                            @include('components.alerts.error')
                            <!--begin::Form-->
                            <form class="form" method="POST" action="{{ route('postJob.update', ['jobId' => $job->id]) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">

                                    <div class="mb-5">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label text-right">Title:</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="title" value="{{ $job->title }}" placeholder="Enter Job Title">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label text-right">Description:</label>
                                            <div class="col-lg-8">
                                                {{-- <textarea placeholder="Enter Job Description" name="description" id="description" class="form-control" cols="30"
                                                    rows="15"></textarea> --}}
                                                <textarea id="description" name="description">{{ $job->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">Skill Set : </label>
                                            <div class=" col-lg-8 col-md-9 col-sm-12">
                                                <select class="form-control select2" id="skillSet" name="skills[]"
                                                    multiple="multiple">
                                                    @foreach ($allSkills as $skillId => $skillName)
                                                        <option @selected(in_array($skillId, $selectedSkills)) value="{{ $skillId }}">{{ $skillName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">Job Type : </label>
                                            <select class="form-control col-lg-4 ml-4" name="job_type_id">
                                                @foreach ($jobTypes as $typeId => $typeName)
                                                    <option @selected($typeId == $job->jobtype?->id) value="{{ $typeId }}">{{ $typeName }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">Location : </label>
                                            <select class="form-control col-lg-4 ml-4" name="location_id">
                                                @foreach ($allLocations as $locationId => $locationName)
                                                    <option @selected($locationId == $job->location?->id) value="{{ $locationId }}">{{ $locationName }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">Experiences</label>
                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                <input id="experienceYear" type="text" class="form-control" value="{{ $job->years }}" name="years" placeholder="Select Year"/>
                                                <br>
                                                <input id="experienceMonth" type="text" class="form-control" value="{{ $job->months }}" name="months" placeholder="Select Month"/>
                                            </div>
                                        </div>


                                    </div>


                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="btn btn-success mr-2">Update</button>
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

      	// vertical button alignment:
        $('#experienceYear').TouchSpin({
            buttondown_class: 'btn btn-secondary',
            buttonup_class: 'btn btn-secondary',
            min: 0,
            max: 70,
            stepinterval: 1,
            maxboostedstep: 1,
            postfix: 'years'
        });

        $('#experienceMonth').TouchSpin({
            buttondown_class: 'btn btn-secondary',
            buttonup_class: 'btn btn-secondary',
            min: 0,
            max: 11,
            stepinterval: 1,
            maxboostedstep: 1,
            postfix: 'months'
        });

        $('#description').summernote({
            codeviewFilter: false,
            codeviewIframeFilter: true,
            height: 250, 
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });

    </script>
@endpush
