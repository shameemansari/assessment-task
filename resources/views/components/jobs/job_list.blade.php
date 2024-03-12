@forelse ($jobs as $job)
    <div class="col-12">
        @include('components.jobs.job_card', ['job' => $job])
    </div>
@empty
    <div class="card col-12 p-5 pb-0 text-center">
        <p>Oops! seems like Job is not posted by any employers.</p>
    </div>
@endforelse

<div class="col-12 my-4">
    {!! $jobs->links() !!}
</div>
