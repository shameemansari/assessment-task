@extends('layouts.guest')


@section('content')
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-12 col-md-3">
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
                                                <label
                                                    class="font-size-h5 font-weight-bolder text-dark mb-4">Designation</label>
                                                <select class="form-control selectpicker" name="designation" data-size="5"
                                                    data-live-search="true">
                                                    <option selected value="">Select</option>
                                                    {{-- @foreach ($allCategories as $categoryId => $categoryName)
                                                <option value="{{ $categoryId }}">{{ $categoryName }}</option>
                                            @endforeach --}}
                                                </select>
                                            </div>

                                            <div class="form-group mb-8">
                                                <label
                                                    class="font-size-h5 font-weight-bolder text-dark mb-4">Location</label>
                                                <select class="form-control selectpicker" name="location" data-size="5"
                                                    data-live-search="true">
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
                                                <label class="font-size-h5 font-weight-bolder text-dark mb-4">Work
                                                    Type</label>
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
                                                <label class="font-size-h5 font-weight-bolder text-dark mb-4">Job
                                                    Type</label>
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
                                                                aria-valuemin="0.0" aria-valuemax="80.0"
                                                                aria-valuenow="20.0" aria-valuetext="20.00">
                                                                <div class="noUi-touch-area"></div>
                                                                <div class="noUi-tooltip">20.00</div>
                                                            </div>
                                                        </div>
                                                        <div class="noUi-origin"
                                                            style="transform: translate(-500%, 0px); z-index: 6;">
                                                            <div class="noUi-handle noUi-handle-upper" data-handle="1"
                                                                tabindex="0" role="slider" aria-orientation="horizontal"
                                                                aria-valuemin="20.0" aria-valuemax="200.0"
                                                                aria-valuenow="80.0" aria-valuetext="80.00">
                                                                <div class="noUi-touch-area"></div>
                                                                <div class="noUi-tooltip">80.0</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--end::Price Slider-->


                                            <div class="d-flex justify-content-between">
                                                <button type="reset"
                                                    class="btn btn-secondary font-weight-bolder px-8">Reset</button>
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

                            
                        </div>
                        <!--end::Page Layout-->
                    </div>
                    <div class="col-12 col-md-9">
                        <div class="container">
                            <div class="row">
                                @foreach ($seekers as $seeker)
                                    @include('components.seekers.seeker_card',['seeker' => $seeker])
                                @endforeach
                               
                            </div>
                            <!--end::Row-->
                        </div>
                    </div>
                </div>

                <!--begin::Pagination-->
                <div class="row">
                   <div class="col-12 col-md-9 offset-md-3 card py-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex flex-wrap mr-3">
                            <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i
                                    class="ki ki-bold-double-arrow-back icon-xs"></i></a>
                            <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i
                                    class="ki ki-bold-arrow-back icon-xs"></i></a>
                            <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">...</a>
                            <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">23</a>
                            <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary active mr-2 my-1">24</a>
                            <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">25</a>
                            <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">26</a>
                            <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">27</a>
                            <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">28</a>
                            <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">...</a>
                            <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i
                                    class="ki ki-bold-arrow-next icon-xs"></i></a>
                            <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1"><i
                                    class="ki ki-bold-double-arrow-next icon-xs"></i></a>
                        </div>
                        <div class="d-flex align-items-center">
                            <select
                                class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary"
                                style="width: 75px;">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span class="text-muted">Displaying 10 of 230 records</span>
                        </div>
                    </div>
                   </div>
                </div>
              
                <!--end::Pagination-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection


@push('scripts')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/datatables/advanced/column-rendering.js') }}"></script>
@endpush
