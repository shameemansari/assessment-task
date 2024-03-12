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
                                                    class="font-size-h5 font-weight-bolder text-dark mb-4">Skills</label>
                                                <select class="form-control selectpicker" id="skills" name="skills" data-size="5"
                                                    data-live-search="true">
                                                    <option selected value="">Select</option>
                                                    @foreach ($allSkills as $skillId => $skillName)
                                                        <option value="{{ $skillId }}">{{ $skillName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group mb-8">
                                                <label class="font-size-h5 font-weight-bolder text-dark mb-4">Location</label>
                                                <select class="form-control selectpicker" id="location" name="location" data-size="5"
                                                    data-live-search="true">
                                                    <option selected value="">All</option>
                                                    @foreach ($allLocations as $cityId => $cityName)
                                                        <option value="{{ $cityId }}">{{ $cityName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group mb-2">
                                                <label class="font-size-h5 font-weight-bolder text-dark mb-4">Job Type</label>
                                                <!--begin::Checkbox list-->
                                                <div class="checkbox-list">
                                                    @foreach ($jobTypes as $typeId => $typeName)
                                                        <label class="checkbox mb-4">
                                                            <input type="checkbox" class="job_type" name="job_type[]" value="{{ $typeId }}" />
                                                            <span></span>
                                                            <div class="text-dark-75 font-weight-bold">{{ $typeName }}</div>
                                                        </label>
                                                    @endforeach
                                                  
                                                    
                                                </div>
                                                <!--end::Checkbox list-->
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
                            <div class="row" id="candidateContainer">
                            </div>
                            <!--end::Row-->
                        </div>
                    </div>
                </div>

            
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection


@push('scripts')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/datatables/advanced/column-rendering.js') }}"></script>
    <script>
        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                } else {
                    getData(page);
                }
            }
        });

        $(document).ready(function() {
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');
                var myurl = $(this).attr('href');
                var page = $(this).attr('href').split('page=')[1];
                getData(page);
            });
        });

        function getData(page = 1) {
            var selectedjob = [];
            $(".job_type:checked").each(function() {
                selectedjob.push($(this).val());
            });
            
            $.ajax({
                url: '?page=' + page,
                type: "GET",
                data: {
                    skills : $(`#skills`).val(),
                    "jobtype[]" :  selectedjob,
                    location :  $(`#location`).val(),
                },
                datatype: "html"
            }).done(function(data) {
                $("#candidateContainer").empty().html(data);
                location.hash = page;
            }).fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log('No response from server');
            });
        }

        $(document).on('change', "#location,#skills,.job_type" , function() {
            getData();
        });

   

        getData(1);
    </script>
@endpush
