<div class="col-12">
    @foreach ($jobs as $job)
        @include('components.jobs.job_card', ['job' => $job])
    @endforeach
    
    <div class="my-4">
        {!! $jobs->links() !!}
    </div>
</div>
 