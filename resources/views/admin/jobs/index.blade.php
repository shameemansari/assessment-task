@extends('layouts.guest')

@push('styles')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">


        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">

                <!--begin::Card-->
                <div class="card card-custom mt-10">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">
                                Jobs List
                                <div class="text-muted pt-2 font-size-sm text-uppercase">all create jobs</div>
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Dropdown-->

                            <!--end::Dropdown-->

                            <!--begin::Button-->
                            <a href="{{ route('postJob.create') }}" class="btn btn-primary font-weight-bolder">
                                <span
                                    class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                                            <path
                                                d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                                fill="#000000" opacity="0.3"></path>
                                        </g>
                                    </svg><!--end::Svg Icon--></span> New Job
                            </a>
                            <!--end::Button-->
                        </div>
                    </div>
                    @include('components.alerts.success')
                    @include('components.alerts.error')

                    <div class="card-body">
                        <!--begin: Datatable-->
                        <div class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-separate table-head-custom table-checkable no-footer"
                                        id="jobTable" role="grid">
                                        <thead>
                                            <tr role="row">

                                                <th class="sorting_asc" tabindex="0" aria-controls="kt_datatable"
                                                    rowspan="1" colspan="1" style="width: 259px;"
                                                    aria-sort="ascending"
                                                    aria-label="Agent: activate to sort column descending">Title</th>
                                                <th class="sorting" tabindex="0" aria-controls="kt_datatable"
                                                    rowspan="1" colspan="1" style="width: 190px;"
                                                    aria-label="Company Email: activate to sort column ascending">
                                                    Description</th>
                                                <th class="sorting" tabindex="0" aria-controls="kt_datatable"
                                                    rowspan="1" colspan="1" style="width: 127px;"
                                                    aria-label="Company Agent: activate to sort column ascending">Skill
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="kt_datatable"
                                                    rowspan="1" colspan="1" style="width: 127px;"
                                                    aria-label="Company Agent: activate to sort column ascending">Application Count
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="kt_datatable"
                                                    rowspan="1" colspan="1" style="width: 127px;"
                                                    aria-label="Company Agent: activate to sort column ascending">Experience
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="kt_datatable"
                                                    rowspan="1" colspan="1" style="width: 127px;"
                                                    aria-label="Company Agent: activate to sort column ascending">Location
                                                </th>

                                                <th class="sorting_disabled" rowspan="1" colspan="1"
                                                    style="width: 105px;" aria-label="Actions">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                        </tbody>

                                    </table>
                                </div>
                            </div>

                        </div>
                        <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection


@push('scripts')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        $(document).ready(function() {

            const jobTable = $('#jobTable').DataTable({
                responsive: true,
                processing: true,
                stateSave: true,
                serverSide: true,
                ajax: '{{ route('postJob.index') }}',
                columns: [{
                        data: 'title',
                        name: 'title',
                    },
                    {
                        data: 'description',
                        name: 'description',
                    },
                    {
                        data: 'skills',
                        name: 'skills',
                        searchable: false,
                    },
                    {
                        data: 'application_count',
                        name: 'application_count',
                        searchable: false,
                    },
                    {
                        data: 'experience',
                        name: 'experience',
                        searchable: false,
                    },
                    {
                        data: 'location_id',
                        name: 'location_id',
                        searchable: false,
                    },
                    {
                        data: 'action',
                        name: 'action',
                    },
                ],
            });

            $(document).on('click', '.deleteBtn', function() {
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
                                            title: "Job post is deleted successfully ",
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                        jobTable.ajax.reload();
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
                                title: "Job post file is safe ",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
            });


        });
    </script>
@endpush
