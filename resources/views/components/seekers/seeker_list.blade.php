@foreach ($allSeekers as $seeker)
  @include('components.seekers.seeker_card',['seeker' => $seeker])
@endforeach

<div class="col-12">
  {!! $allSeekers->links() !!}
</div>