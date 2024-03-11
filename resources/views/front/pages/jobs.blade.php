@extends('layouts.guest')


@section('content')
     <!--begin::Content-->
     <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">

                <!--begin::Page Layout-->
                <div class="d-flex flex-row">
                    <!--begin::Aside-->
                    <div class="flex-column offcanvas-mobile w-300px w-xl-325px" id="kt_profile_aside">
                        <!--begin::Forms Widget 15-->
                        <div class="card card-custom gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Form-->
                                <form>

                                    <div class="form-group mb-8">
                                        <label class="font-size-h5 font-weight-bolder text-dark mb-4">Designation</label>
                                        <select class="form-control selectpicker" name="designation" data-size="5" data-live-search="true">
                                            <option selected value="">Select</option>
                                            {{-- @foreach ($allCategories as $categoryId => $categoryName)
                                                <option value="{{ $categoryId }}">{{ $categoryName }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
  
                                    <div class="form-group mb-8">
                                        <label class="font-size-h5 font-weight-bolder text-dark mb-4">Location</label>
                                        <select class="form-control selectpicker" name="location" data-size="5" data-live-search="true">
                                            <option selected value="">All</option>
                                            {{-- @foreach ($allLocations as $state)
                                                @if ($state->cities?->isNotEmpty())
                                                    @foreach ($state->cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endforeach
                                                @endif
                                            @endforeach --}}
                                        </select>
                                    </div>

                                     <!--begin::Work Type-->
                                     <div class="form-group mb-11">
                                        <label class="font-size-h5 font-weight-bolder text-dark mb-4">Work Type</label>
                                        <!--begin::Checkbox list-->
                                        <div class="checkbox-list">
                                            <label class="checkbox mb-4">
                                                <input type="checkbox" name="job_type[]" />
                                                <span></span>
                                                <div class="text-dark-75 font-weight-bold">Work from Office</div>
                                            </label>
                                            <label class="checkbox mb-4">
                                                <input type="checkbox" name="job_type[]" />
                                                <span></span>
                                                <div class="text-dark-75 font-weight-bold">Hybrid</div>
                                            </label>
                                            <label class="checkbox mb-4">
                                                <input type="checkbox" name="job_type[]" />
                                                <span></span>
                                                <div class="text-dark-75 font-weight-bold">Remote</div>
                                            </label>
                                        </div>
                                        <!--end::Checkbox list-->
                                    </div>
                                    <!--end::Work Type-->


                                    <!--begin::Categories-->
                                    <div class="form-group mb-11">
                                        <label class="font-size-h5 font-weight-bolder text-dark mb-4">Job Type</label>
                                        <!--begin::Checkbox list-->
                                        <div class="checkbox-list">
                                            {{-- @foreach ($jobTypes as $jobId => $jobName)
                                                <label class="checkbox mb-4">
                                                    <input type="checkbox" name="job_type[{{ $jobId }}]" />
                                                    <span></span>
                                                    <div class="text-dark-75 font-weight-bold">{{ $jobName }}</div>
                                                </label>
                                            @endforeach
                                        --}}
                                        </div>
                                        <!--end::Checkbox list-->
                                    </div>
                                    <!--end::Categories-->

                                    <!--begin::Prices-->
                                    <div class="form-group mb-10">
                                        <label class="font-size-h5 font-weight-bolder text-dark mb-4">Company Size</label>
                                        <!--begin::Radio list-->
                                        <div class="radio-list">

                                            <label class="radio  mb-4">
                                                <input type="radio" name="experience" />
                                                <span></span>
                                                <div class="text-dark-75 font-weight-bold">10 - 50 Members
                                                </div>
                                            </label>
                                            <label class="radio  mb-4">
                                                <input type="radio" name="experience" />
                                                <span></span>
                                                <div class="text-dark-75 font-weight-bold">50 - 100 Members
                                                </div>
                                            </label>
                                            <label class="radio ">
                                                <input type="radio" name="experience" />
                                                <span></span>
                                                <div class="text-dark-75 font-weight-bold">100 - 200 Members
                                                </div>
                                            </label>
                                            <label class="radio ">
                                                <input type="radio" name="experience" />
                                                <span></span>
                                                <div class="text-dark-75 font-weight-bold">200 - 500 Members
                                                </div>
                                            </label>
                                            <label class="radio ">
                                                <input type="radio" name="experience" />
                                                <span></span>
                                                <div class="text-dark-75 font-weight-bold">500 - 1000 Members
                                                </div>
                                            </label>
                                            <label class="radio ">
                                                <input type="radio" name="experience" />
                                                <span></span>
                                                <div class="text-dark-75 font-weight-bold">1000 - 10000 Members
                                                </div>
                                            </label>
                                        </div>
                                        <!--end::Radio list-->
                                    </div>
                                    <!--end::Prices-->

                                    <!--begin::Price Slider-->
                                    <div class="form-group mb-13">
                                        <div class="font-weight-bolder mb-15">Salary Range <span
                                                class="text-uppercase">( LPA )</span></div>
                                         

                                        <div id="kt_nouislider_3"
                                                class="nouislider noUi-target noUi-rtl noUi-horizontal noUi-txt-dir-ltr">
                                                <div class="noUi-base">
                                                    <div class="noUi-connects">
                                                        <div class="noUi-connect"
                                                            style="transform: translate(50%, 0px) scale(0.342857, 1);">
                                                        </div>
                                                    </div>
                                                    <div class="noUi-origin"
                                                        style="transform: translate(-157.143%, 0px); z-index: 5;">
                                                        <div class="noUi-handle noUi-handle-lower" data-handle="0"
                                                            tabindex="0" role="slider" aria-orientation="horizontal"
                                                            aria-valuemin="0.0" aria-valuemax="80.0" aria-valuenow="20.0"
                                                            aria-valuetext="20.00">
                                                            <div class="noUi-touch-area"></div>
                                                            <div class="noUi-tooltip">20.00</div>
                                                        </div>
                                                    </div>
                                                    <div class="noUi-origin"
                                                        style="transform: translate(-500%, 0px); z-index: 6;">
                                                        <div class="noUi-handle noUi-handle-upper" data-handle="1"
                                                            tabindex="0" role="slider" aria-orientation="horizontal"
                                                            aria-valuemin="20.0" aria-valuemax="200.0" aria-valuenow="80.0"
                                                            aria-valuetext="80.00">
                                                            <div class="noUi-touch-area"></div>
                                                            <div class="noUi-tooltip">80.0</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                    <!--end::Price Slider-->


                                    <div class="d-flex justify-content-between">
                                        <button type="reset" class="btn btn-secondary font-weight-bolder px-8">Reset</button>
                                        <button type="submit"
                                            class="btn btn-primary font-weight-bolder mr-2 px-8">Search</button>
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Body-->
                        </div>

                    </div>
                    <!--end::Aside-->

                    <!--begin::Entry-->
                    <div class="d-flex ">
                        <!--begin::Container-->
                        <div class=" container " id="jobListContainer">
                            @include('components.jobs.job_list', ['jobs' => ['hi']])
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Page Layout-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection


@push('scripts')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/advanced/column-rendering.js') }}"></script>
@endpush
