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
                                Applied Job Lists
                            </h3>
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
                                        id="appliedJobs" role="grid">
                                        <thead>
                                            <tr role="row">

                                                <th class="sorting_asc" tabindex="0" aria-controls="kt_datatable"
                                                    rowspan="1" colspan="1" style="width: 259px;"
                                                    aria-sort="ascending"
                                                    aria-label="Agent: activate to sort column descending">Job Title</th>
                                                <th class="sorting" tabindex="0" aria-controls="kt_datatable"
                                                    rowspan="1" colspan="1" style="width: 190px;"
                                                    aria-label="Company Email: activate to sort column ascending">Job 
                                                    Description</th>
                                                <th class="sorting" tabindex="0" aria-controls="kt_datatable"
                                                    rowspan="1" colspan="1" style="width: 127px;"
                                                    aria-label="Company Agent: activate to sort column ascending">Skills
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="kt_datatable"
                                                    rowspan="1" colspan="1" style="width: 127px;"
                                                    aria-label="Company Agent: activate to sort column ascending">Experience
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="kt_datatable"
                                                    rowspan="1" colspan="1" style="width: 127px;"
                                                    aria-label="Company Agent: activate to sort column ascending">Applied On
                                                </th>

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

            const appliedJobs = $('#appliedJobs').DataTable({
                responsive: true,
                processing: true,
                stateSave: true,
                serverSide: true,
                ajax: '{{ route('application.jobs') }}',
                columns: [{
                        data: 'title',
                        name: 'title',
                        sortable: false,
                    },
                    {
                        data: 'description',
                        name: 'description',
                        sortable: false,
                    },
                    {
                        data: 'skills',
                        name: 'skills',
                        searchable: false,
                        sortable: false,
                    },
                    {
                        data: 'experience',
                        name: 'experience',
                        searchable: false,
                        sortable: false,
                    },

                    {
                        data: 'created_at',
                        name: 'created_at',
                        sortable: false,
                    },
                ],
            });

             
        });
    </script>
@endpush
