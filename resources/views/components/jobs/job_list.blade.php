@foreach ($jobs as $job)
    @include('components.jobs.job_card', ['job' => $job])
@endforeach


<!--begin::Pagination-->
<div class="card card-custom">
    <div class="card-body py-7">
        <!--begin::Pagination-->
        <div class="d-flex justify-content-center align-items-center flex-wrap">
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
        </div>
        <!--end:: Pagination-->
    </div>
</div>
<!--end::Pagination-->
