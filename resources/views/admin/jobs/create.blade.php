@extends('layouts.guest')

@section('title', 'Post Job')

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
                                    Create Job Listing
                                </h3>
                            </div>

                            @include('components.alerts.success')
                            @include('components.alerts.error')
                            <!--begin::Form-->
                            <form class="form" method="POST" action="{{ route('postJob.store') }}">
                                @csrf
                                <div class="card-body">

                                    <div class="mb-5">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label text-right">Title:</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter Job Title">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label text-right">Description:</label>
                                            <div class="col-lg-8">
                                                {{-- <textarea placeholder="Enter Job Description" name="description" id="description" class="form-control" cols="30"
                                                    rows="15"></textarea> --}}
                                                <textarea id="description" name="description">{{ old('description') }}</textarea>
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
                                                        <option value="{{ $skillId }}">{{ $skillName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">Experiences</label>
                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                <input id="experienceYear" type="text" class="form-control" value="{{ old('years',0) }}" name="years" placeholder="Select Year"/>
                                                <br>
                                                <input id="experienceMonth" type="text" class="form-control" value="{{ old('months',0) }}" name="months" placeholder="Select Month"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="btn btn-success mr-2">Submit</button>
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

      
    </script>
@endpush
