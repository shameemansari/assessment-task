<div class="col-12">
@foreach ($jobs as $job)
    @include('components.jobs.job_card', ['job' => $job])
@endforeach
</div>

<!--begin::Pagination-->
<div class="col-12">

    <div class="card card-custom">
        <div class="card-body py-7">
            
            {!! $jobs->links() !!}
        </div>
    </div>
</div>
<!--end::Pagination-->
