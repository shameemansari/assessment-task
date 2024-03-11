 <!--begin::Card-->
 <div class="card card-custom gutter-b">
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
             <div class="flex-grow-1">
                 <!--begin::Title-->
                 <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                     <!--begin::User-->
                     <div class="mr-3">
                         <!--begin::Name-->
                         <a href="#"
                             class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
                             Jason Muller
                             <i class="flaticon2-correct text-success icon-md ml-2"></i>
                         </a>
                         <!--end::Name-->

                         <!--begin::Contacts-->
                         <div class="d-flex flex-wrap my-2">
                             {{-- <a href="#" class=" text-secondary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                 <span
                                     class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg--><svg
                                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                         <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                             <rect x="0" y="0" width="24" height="24" />
                                             <path
                                                 d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                 fill="#000000" />
                                             <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5"
                                                 r="2.5" />
                                         </g>
                                     </svg><!--end::Svg Icon-->
                                 </span>
                                 jason@siastudio.com
                             </a> --}}
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
                                 PR Manager
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
                                 Melbourne
                             </a>
                         </div>
                         <!--end::Contacts-->
                     </div>
                     <!--begin::User-->

                     <!--begin::Actions-->
                     <div class="my-lg-0 my-1">
                         <a href="#"
                             class="btn btn-sm btn-secondary font-weight-bolder text-uppercase mr-2">View Job</a>
                         <a href="#" class="btn btn-sm btn-primary font-weight-bolder text-uppercase px-5">Apply</a>
                     </div>
                     <!--end::Actions-->
                 </div>
                 <!--end::Title-->

                 <!--begin::Content-->
                 <div class="d-flex align-items-center flex-wrap justify-content-between">
                     <!--begin::Description-->
                     <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                         I distinguish three main text objectives could be merely to inform
                         people.<br />
                         A second could be persuade people. You want people to bay objective.
                     </div>
                     <!--end::Description-->


                 </div>
                 <!--end::Content-->
             </div>
             <!--end::Info-->
             
         </div>
         <!--end::Top-->

         <div class="d-flex flex-wrap my-4">
            <span class="label my-1 label-default label-inline label-xl font-weight-bold mr-2">Javascript</span>
            <span class="label my-1 label-default label-inline label-xl font-weight-bold mr-2">Javascript</span>
            <span class="label my-1 label-default label-inline label-xl font-weight-bold mr-2">Javascript</span>
            <span class="label my-1 label-default label-inline label-xl font-weight-bold mr-2">Javascript</span>
            <span class="label my-1 label-default label-inline label-xl font-weight-bold mr-2">Javascript</span>
            <span class="label my-1 label-default label-inline label-xl font-weight-bold mr-2">Javascript</span>
            <span class="label my-1 label-default label-inline label-xl font-weight-bold mr-2">Javascript</span>
            <span class="label my-1 label-default label-inline label-xl font-weight-bold mr-2">Javascript</span>
            <span class="label my-1 label-default label-inline label-xl font-weight-bold mr-2">Javascript</span>
            <span class="label my-1 label-default label-inline label-xl font-weight-bold mr-2">Javascript</span>
            <span class="label my-1 label-default label-inline label-xl font-weight-bold mr-2">Javascript</span>
            <span class="label my-1 label-default label-inline label-xl font-weight-bold mr-2">Javascript</span>
            <span class="label my-1 label-default label-inline label-xl font-weight-bold mr-2">Javascript</span>
            <span class="label my-1 label-default label-inline label-xl font-weight-bold mr-2">Javascript</span>
         </div>

         <!--begin::Separator-->
         <div class="separator separator-solid my-4"></div>
         <!--end::Separator-->
         <!--begin::Contacts-->
         <div class="d-flex justify-content-between align-items-center mb-0">
            <div>
                <p class="mt-4">
                    Posted : <strong>2 days ago</strong>
                </p>
            </div>
            <div>
                <a href="#" class="text-dark font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                    <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"> 
                        <i class="flaticon-suitcase text-primary font-weight-bolder"></i>
                    </span>
                    1-30 Yrs
                </a>
                <a href="#" class="text-dark font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                    <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"> 
                        <i class="flaticon-piggy-bank text-primary font-weight-bolder"></i>
                    </span>
                    1-30 Yrs
                </a>
                <a href="#" class="text-dark font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                    <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"> 
                        <i class="flaticon2-location text-primary font-weight-bolder"></i>
                    </span>
                    Job Type
                </a>
            </div> 
         </div>
      
         <!--end::Contacts-->

     </div>
 </div>
 <!--end::Card-->
