   <!--begin::Col-->
   <div class="col-12 col-lg-6">
       <!--begin::Card-->
       <div class="card card-custom gutter-b card-stretch">
           <!--begin::Body-->
           <div class="card-body pt-4">
               
               <!--begin::User-->
               <div class="d-flex align-items-end mb-7">
                   <!--begin::Pic-->
                   <div class="d-flex align-items-center">
                       <!--begin::Pic-->
                       <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                           <div class="symbol symbol-circle symbol-lg-75">
                               <img  src="https://ui-avatars.com/api/?background=fb923c&color=fff&name={{ $seeker->user?->fullName() }}" alt="image">
                           </div>
                           <div class="symbol symbol-lg-75 symbol-circle symbol-primary d-none">
                               <span class="font-size-h3 font-weight-boldest">
                               </span>
                           </div>
                       </div>
                       <!--end::Pic-->
                       <!--begin::Title-->
                       <div class="d-flex flex-column">
                           <a href="#"
                               class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">
                                {{ $seeker->user?->fullName() }}   
                            </a>
                           <span class="text-muted font-weight-bold">{{ $seeker->title }}</span>
                       </div>
                       <!--end::Title-->
                   </div>
                   <!--end::Title-->
               </div>
               <!--end::User-->
            
               <!--begin::Info-->
               <div class="mb-7">
                   <div class="d-flex justify-content-between align-items-center my-2">
                       <span class="text-dark-75 font-weight-bolder mr-2">Experience:</span>
                       <a href="#" class="text-muted text-hover-primary">{{ $seeker->experience .' yrs' }}</a>
                   </div>
                   <div class="d-flex justify-content-between align-items-center my-2">
                       <span class="text-dark-75 font-weight-bolder mr-2">Job Type:</span>
                       <a href="#" class="text-muted text-hover-primary">{{ $seeker->jobtype?->name ?? '-' }}</a>
                   </div>
                   <div class="d-flex justify-content-between align-items-cente my-2">
                       <span class="text-dark-75 font-weight-bolder mr-2">Location:</span>
                       <a href="#" class="text-muted text-hover-primary">{{ $seeker->location?->name ?? '-' }}</a>
                   </div>
                   <div class="d-flex flex-column align-items-start mb-5">
                       <span class="text-dark-75 font-weight-bolder">Skills:</span>
                       <span class="text-muted font-weight-bold">
                            @forelse ($seeker->skills as $skill)
                            <span class="label my-1 label-light-warning label-inline label-xl font-weight-bold mr-2">{{ $skill->name }}</span>
                            @empty
                                <span class="label my-1 label-light-danger label-inline label-xl font-weight-bold mr-2">
                                    Not Provided
                                </span>

                            @endforelse
                       </span>
                   </div>
               </div>
               <!--end::Info-->
               @if($seeker->resume)
                    <a href="{{ asset('storage/resume/'. $seeker->resume) }}" target="_blank"
                        class="btn btn-block btn-sm btn-primary font-weight-bolder text-uppercase py-4">
                        View Resume
                    </a>
                    @else
                    <button type="button" class="btn btn-sm font-weight-bolder text-uppercase py-4 btn-block btn-light-danger">No resume uploaded yet.</button>
                @endif
           </div>
           <!--end::Body-->
       </div>
       <!--end::Card-->
   </div>
   <!--end::Col-->
