 <!--begin::Header-->
 <div id="kt_header" class="header flex-column  header-fixed ">
     <!--begin::Top-->
     <div class="header-top">
         <!--begin::Container-->
         <div class="container">
             <!--begin::Left-->
             <div class="d-none d-lg-flex align-items-center mr-3">
                 <!--begin::Logo-->
                 <a href="{{ route('home') }}" class="mr-20">
                     <img alt="Logo" src="{{ asset('assets/media/logos/logo-letter-9.png') }}" class="max-h-35px" />
                 </a>
                 <!--end::Logo-->

                 <!--begin::Desktop Search-->
                 <div class="quick-search quick-search-inline ml-4 w-300px" id="kt_quick_search_inline">


                     <!--begin::Search Toggle-->
                     <div id="kt_quick_search_toggle" data-toggle="dropdown" data-offset="0px,1px">
                     </div>
                     <!--end::Search Toggle-->

                     <!--begin::Dropdown-->
                     <div class="dropdown-menu dropdown-menu-left dropdown-menu-lg dropdown-menu-anim-up">
                         <div class="quick-search-wrapper scroll" data-scroll="true" data-height="350"
                             data-mobile-height="200">
                         </div>
                     </div>
                     <!--end::Dropdown-->
                 </div>
                 <!--end::Desktop Search-->
             </div>
             <!--end::Left-->

             <!--begin::Topbar-->
             <div class="topbar">
                 <!--begin::Tablet & Mobile Search-->
                 <div class="dropdown d-flex d-lg-none">
                     <!--begin::Toggle-->
                     <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                         <div class="btn btn-icon btn-hover-transparent-white btn-lg btn-dropdown mr-1">
                             <span
                                 class="svg-icon svg-icon-xl"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg--><svg
                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                         <rect x="0" y="0" width="24" height="24" />
                                         <path
                                             d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                             fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                         <path
                                             d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                             fill="#000000" fill-rule="nonzero" />
                                     </g>
                                 </svg><!--end::Svg Icon--></span>
                         </div>
                     </div>
                     <!--end::Toggle-->

                     <!--begin::Dropdown-->
                     <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                         <div class="quick-search quick-search-dropdown" id="kt_quick_search_dropdown">
                             <!--begin:Form-->
                             <form method="get" class="quick-search-form">
                                 <div class="input-group">
                                     <div class="input-group-prepend">
                                         <span class="input-group-text">
                                             <span
                                                 class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg--><svg
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                                     <g stroke="none" stroke-width="1" fill="none"
                                                         fill-rule="evenodd">
                                                         <rect x="0" y="0" width="24" height="24" />
                                                         <path
                                                             d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                             fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                         <path
                                                             d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                             fill="#000000" fill-rule="nonzero" />
                                                     </g>
                                                 </svg><!--end::Svg Icon--></span> </span>
                                     </div>
                                     <input type="text" class="form-control" placeholder="Search..." />
                                     <div class="input-group-append">
                                         <span class="input-group-text">
                                             <i class="quick-search-close ki ki-close icon-sm text-muted"></i>
                                         </span>
                                     </div>
                                 </div>
                             </form>
                             <!--end::Form-->

                             <!--begin::Scroll-->
                             <div class="quick-search-wrapper scroll" data-scroll="true" data-height="325"
                                 data-mobile-height="200">
                             </div>
                             <!--end::Scroll-->
                         </div>
                     </div>
                     <!--end::Dropdown-->
                 </div>
                 <!--end::Tablet & Mobile Search-->


                 <div class="topbar-item">
                     <a href="{{ route('seekerList') }}">
                         <div
                             class="mx-1 btn btn-icon btn-hover-transparent-white w-auto d-flex align-items-center px-2">
                             <span class="py-2 px-5 font-weight-bold text-white">
                                 Candidate Listing
                             </span>
                         </div>
                     </a>
                 </div>

                 <div class="topbar-item">
                     <a href="{{ route('jobList') }}">
                         <div
                             class="mx-1 btn btn-icon btn-hover-transparent-white w-auto d-flex align-items-center px-2">
                             <span class="py-2 px-5 font-weight-bold text-white">
                                 Job Listing
                             </span>
                         </div>
                     </a>
                 </div>

                 @guest
                     <div class="topbar-item">
                         <a href="{{ route('login') }}">
                             <div class="mx-1 btn btn-icon bg-white-o-40 w-auto d-flex align-items-center px-2">
                                 <span class="py-2 px-5 font-weight-bold text-white">
                                     Login
                                 </span>
                             </div>
                         </a>
                     </div>
                 @endguest

                 @auth

                     <div class="topbar-item">
                         <div class="btn btn-icon btn-hover-transparent-white w-auto d-flex align-items-center btn-lg px-2"
                             id="kt_quick_user_toggle">
                             <div class="d-flex flex-column text-right pr-3">
                                 <span
                                     class="text-white opacity-50 font-weight-bold font-size-sm d-none d-md-inline">{{ auth()->user()?->fullName() }}</span>
                                 <span
                                     class="text-white font-weight-bolder font-size-sm d-none d-md-inline">{{ ucfirst(auth()->user()?->roles?->first()?->name) }}</span>
                             </div>
                             <span class="symbol symbol-35">
                                 <span class="symbol-label font-size-h5 font-weight-bold text-white bg-white-o-30">
                                     <i class="fa fa-user text-white"></i>
                                 </span>
                             </span>
                         </div>
                     </div>
                 @endauth

                 <!--end::User-->
             </div>
             <!--end::Topbar-->
         </div>
         <!--end::Container-->
     </div>
     <!--end::Top-->


 </div>
 <!--end::Header-->
