@forelse ($allSeekers as $seeker)
  @include('components.seekers.seeker_card',['seeker' => $seeker])
  @empty
  <div class="card p-5 pb-0 m-auto">
    <p>Oops! seems like No candidate has registered.</p>
  </div>
@endforelse

<div class="col-12">
  {!! $allSeekers->links() !!}
</div>