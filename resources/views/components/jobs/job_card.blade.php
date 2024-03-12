 <!--begin::Card-->
 <div class="card card-custom gutter-b" style="min-width:300px;width:100%;">
     <div class="card-body">
         <!--begin::Top-->
         <div class="d-flex">
             <!--begin::Pic-->
             <div class="flex-shrink-0 mr-7">
                 <div class="symbol symbol-50 symbol-lg-120">
                     <img alt="Pic" src="{{ asset('assets/media//users/300_1.jpg') }}" />
                 </div>
             </div>
             <!--end::Pic-->

             <!--begin: Info-->
             <div class="flex-grow-1" >
                 <!--begin::Title-->
                 <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                     <!--begin::User-->
                     <div class="mr-3">
                         <!--begin::Name-->
                         <a href="#"
                             class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
                                {{ $job->employer?->company }} 
                             {{-- <i class="flaticon2-correct text-success icon-md ml-2"></i> --}}
                         </a>
                         <!--end::Name-->

                         <!--begin::Contacts-->
                         <div class="d-flex flex-wrap my-2">
                             <a href="#" class=" text-secondary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                 <span
                                     class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Lock.svg--><svg
                                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                         <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                             <mask fill="white">
                                                 <use xlink:href="#path-1" />
                                             </mask>
                                             <g />
                                             <path
                                                 d="M7,10 L7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 L17,10 L18,10 C19.1045695,10 20,10.8954305 20,12 L20,18 C20,19.1045695 19.1045695,20 18,20 L6,20 C4.8954305,20 4,19.1045695 4,18 L4,12 C4,10.8954305 4.8954305,10 6,10 L7,10 Z M12,5 C10.3431458,5 9,6.34314575 9,8 L9,10 L15,10 L15,8 C15,6.34314575 13.6568542,5 12,5 Z"
                                                 fill="#000000" />
                                         </g>
                                     </svg>
                                     <!--end::Svg Icon-->
                                 </span>
                                 {{ $job->title }}
                             </a>
                             <a href="#" class=" text-secondary font-weight-bold">
                                 <span
                                     class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><!--begin::Svg Icon | path:assets/media/svg/icons/Map/Marker2.svg--><svg
                                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                         <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                             <rect x="0" y="0" width="24" height="24" />
                                             <path
                                                 d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z"
                                                 fill="#000000" />
                                         </g>
                                     </svg><!--end::Svg Icon-->
                                 </span>
                                 Location
                             </a>
                         </div>
                         <!--end::Contacts-->
                     </div>
                     <!--begin::User-->

                     <!--begin::Actions-->
                     <div class="my-lg-0 my-1">
                         {{-- <a href="#" class="btn btn-sm btn-secondary font-weight-bolder text-uppercase mr-2">View Job</a> --}}
                         @if (in_array($job->id,$alreadyApplied))
                            <button type="button" class="btn btn-sm btn-light-warning btn-lg font-weight-bolder text-uppercase px-5">Applied</button>
                            @else
                             <button type="button" data-toggle="modal" data-target="#jobApplyModal" data-employer="{{ $job->employer_id }}" data-job="{{ $job->id }}" class="btn btn-sm btn-light-info btn-lg font-weight-bolder applyBtn text-uppercase px-5">Apply</button>
                         @endif
                     </div>
                     <!--end::Actions-->
                 </div>
                 <!--end::Title-->

                 <!--begin::Content-->
                 <div class="d-flex align-items-center flex-wrap justify-content-between">
                     <!--begin::Description-->
                     <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                        {!! $job->description !!}
                     </div>
                     <!--end::Description-->


                 </div>
                 <!--end::Content-->
             </div>
             <!--end::Info-->
             
         </div>
         <!--end::Top-->

         <p class="mt-5 mb-2 font-weight-bold">Skils Required : </p> 
         <div class="d-flex flex-wrap mb-4">
            
             @foreach ($job->skills as $skill)
             <span class="label my-1 label-default label-inline label-xl font-weight-bold mr-2">{{ $skill->name }}</span>
            @endforeach
         </div>

         <!--begin::Separator-->
         <div class="separator separator-solid my-4"></div>
         <!--end::Separator-->
         <!--begin::Contacts-->
         <div class="d-flex flex-column mb-0">
            <div>
                <p class="mt-4">
                    Posted : <strong>{{ $job->created_at?->diffForHumans() }}</strong>
                </p>
            </div>
            <div>
                <a href="#" class="text-dark font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                    <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"> 
                        <i class="flaticon-suitcase text-primary font-weight-bolder"></i>
                    </span>
                    {{ 'Experience Required : ' . $job->years . ' yrs - '. $job->months . ' months' }}
                </a>
                {{-- <a href="#" class="text-dark font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                    <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"> 
                        <i class="flaticon2-location text-primary font-weight-bolder"></i>
                    </span>
                    Job Type
                </a> --}}
            </div> 
         </div>
      
         <!--end::Contacts-->

     </div>
 </div>
 <!--end::Card-->

