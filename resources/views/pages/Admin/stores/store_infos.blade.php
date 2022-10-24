@extends('layouts.admin')

@section('content')



<div class="d-flex flex-column flex-lg-row">
    <!--begin::Sidebar-->
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card mb-5 mb-xl-8">
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Summary-->
                    <!--begin::User Info-->
                    <div class="d-flex flex-center flex-column py-5">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-100px symbol-circle mb-7">
                            <img src="https://as2.ftcdn.net/v2/jpg/02/45/88/07/1000_F_245880709_vI8mXirbxSibI5RvaW2z6iMidNQfsXNe.jpg" alt="image">
                        </div>
                        <a class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">{{ $store -> name }}</a>
                        <div class="mb-9">
                            @if ($store->status == "Active")
                            <div class="badge badge-lg badge-light-success d-inline">Active</div>
                            @else
                            <div class="badge badge-lg badge-light-danger d-inline">inactive</div>
                            @endif
                        </div>
                        <div class="fw-bolder mb-3">Product selling
                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Number of support tickets assigned, closed and pending this week." data-bs-original-title="" title=""></i></div>
                        <div class="d-flex flex-wrap flex-center">
                            <!--begin::Stats-->
                            <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                <div class="fs-4 fw-bolder text-gray-700">
                                    <span class="w-75px">243</span>
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                    <span class="svg-icon svg-icon-3 svg-icon-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <div class="fw-bold text-muted">sell</div>
                            </div>
                            <!--end::Stats-->
                            <!--begin::Stats-->
                            <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                <div class="fs-4 fw-bolder text-gray-700">
                                    <span class="w-50px">56</span>
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                    <span class="svg-icon svg-icon-3 svg-icon-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                            <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <div class="fw-bold text-muted">unsell</div>
                            </div>
                            <!--end::Stats-->

                        </div>

                    </div>

                    <div class="d-flex flex-stack fs-4 py-3">
                        <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
                        <span class="ms-2 rotate-180">
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                </svg>
                            </span>
                        </span></div>
                    </div>
                    <div class="separator"></div>
                    <div id="kt_user_view_details" class="collapse show">
                        <div class="pb-5 fs-6">
                            <div class="fw-bolder mt-5">Domain</div>
                            <a href="{{ $store -> domain }}">
                                <div class="text-gray-600 text-hover-primary">{{ $store -> domain }}</div>
                            </a>
                            <div class="fw-bolder mt-5">Country name</div>
                            <div class="text-gray-600">{{ $store -> country_name }}</div>
                            <div class="fw-bolder mt-5">Country code</div>
                            <div class="text-gray-600">{{ $store -> country_code }}</div>
                            <div class="fw-bolder mt-5">Currency</div>
                            <div class="text-gray-600">{{ $store -> currency }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card mb-5 mb-xl-8">
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Summary-->
                    <!--begin::User Info-->
                    <div class="d-flex flex-center flex-column py-5">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-100px symbol-circle mb-7">
                            <div class="image-input-wrapper w-125px h-125px"
                            style="background-image: url( {{ Storage::url($commercial -> profil_img) }} ); background-size: cover;"></div>
                        </div>

                        {{-- <div class="symbol symbol-100px symbol-circle mb-7">
                            <div class="image-input-wrapper w-125px h-125px"
                            style="background-image: url( {{ Storage::url($commercial -> profil_img) }} ); background-size: cover;"></div>
                        </div> --}}
                        <!--end::Avatar-->
                        <!--begin::Name-->
                        <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">{{ $commercial -> name }}</a>
                        <!--end::Name-->
                        <!--begin::Position-->
                        <div class="mb-9">
                            <!--begin::Badge-->
                            <div class="badge badge-lg badge-light-primary d-inline">Commercial</div>
                            <!--begin::Badge-->
                        </div>
                    </div>
                    <!--end::User Info-->
                    <!--end::Summary-->
                    <!--begin::Details toggle-->
                    <div class="d-flex flex-stack fs-4 py-3">
                        <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
                        <span class="ms-2 rotate-180">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span></div>
                    </div>
                    <!--end::Details toggle-->
                    <div class="separator"></div>
                    <!--begin::Details content-->
                    <div id="kt_user_view_details" class="collapse show">
                        <div class="pb-5 fs-6">
                            <!--begin::Details item-->
                            <div class="fw-bolder mt-5">Name</div>
                            <div class="text-gray-600">{{ $commercial -> name }}</div>
                            <!--begin::Details item-->
                            <!--begin::Details item-->
                            <div class="fw-bolder mt-5">Email</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary">{{ $commercial->email }}</a>
                            </div>
                            <!--begin::Details item-->
                            <!--begin::Details item-->
                            <div class="fw-bolder mt-5">Phone</div>
                            <div class="text-gray-600">{{ $commercial -> phone }}</div>

                            <div class="fw-bolder mt-5">Last Login</div>
                            <div class="text-gray-600">{{ $commercial -> updated_at }}</div>
                            <!--begin::Details item-->
                        </div>
                    </div>
                    <!--end::Details content-->
                </div>
                <!--end::Card body-->
            </div>
        </div>
        <div class="col-12 col-md-12">
            <div class="card mb-5 mb-xl-8">
                <!--begin::Card header-->
                <div class="card-header border-0">
                   <!--begin::Card title-->
                   <div class="card-title">
                       <h2>Products</h2>
                   </div>
                   <!--end::Card title-->
               </div>
               <!--end::Card header-->
               <!--begin::Card body-->
               <div class="card-body pt-0 pb-5">
                   <!--begin::Table-->
                   <div id="kt_table_customers_payment_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                       <div class="table-responsive">
                           <table class="table align-middle table-row-dashed gy-5 dataTable no-footer" id="kt_table_customers_payment">
                               <!--begin::Table head-->
                               <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                   <tr class="text-start text-muted text-uppercase gs-0">
                                       <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_table_customers_payment" rowspan="1" colspan="1" aria-label="Rewards: activate to sort column ascending" style="width: auto">Image</th>
                                       <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_table_customers_payment" rowspan="1" colspan="1" aria-label="order No.: activate to sort column ascending" style="width: auto">Title</th>
                                       <th class="sorting" tabindex="0" aria-controls="kt_table_customers_payment" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: auto">Status</th>
                                       <th class="sorting" tabindex="0" aria-controls="kt_table_customers_payment" rowspan="1" colspan="1" aria-label="Amount: activate to sort column ascending" style="width: auto">description</th>
                                   </tr>
                               </thead>
                               <tbody class="fs-6 fw-bold text-gray-600">
                               @foreach ($products as $product)
                               <tr class="odd">
                                       <td>
                                        @foreach ($images as $image)
                                        @if ($image->ID_pro_var == $product->id)
                                        <a href="" class="symbol symbol-50px">
                                            {{-- <span class="symbol-label" style="background-image:url(/metronic8/demo1/assets/media//stock/ecommerce/1.gif);"></span> --}}
                                            <img src="{{ Storage::url(@$image->url) }}" alt="user" />
                                        </a>
                                        @endif
                                        @endforeach                                       </td>
                                       <td>{{ $product -> title }}</td>
                                       <td>
                                           @if ( $product -> status == 'published')
                                           <span class="badge badge-light-success">Published</span>
                                           @else
                                           <span class="badge badge-light-warning">Draft</span>
                                           @endif
                                       </td>
                                       <!--end::Status=-->
                                       <!--begin::Amount=-->
                                       <td>{{ $product -> description }}</td>

                                   </tr>
                                   @endforeach
                               </tbody>
                           </table>
                       </div>
                       <div class="row">
                           <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div><div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end"><div class="dataTables_paginate paging_simple_numbers" id="kt_table_customers_payment_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="kt_table_customers_payment_previous"><a href="#" aria-controls="kt_table_customers_payment" data-dt-idx="0" tabindex="0" class="page-link"><i class="previous"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="kt_table_customers_payment" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_table_customers_payment" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item next" id="kt_table_customers_payment_next"><a href="#" aria-controls="kt_table_customers_payment" data-dt-idx="3" tabindex="0" class="page-link"><i class="next"></i></a></li></ul></div></div></div></div>
                   <!--end::Table-->
               </div>
               <!--end::Card body-->
           </div>
        </div>
        <div class="col-12 col-md-12">
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0">
                    <div class="card-title">
                        <h2>Orders History</h2>
                    </div>
                </div>
                <div class="card-body pt-0 pb-5">
                    <div id="kt_table_customers_payment_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed gy-5 dataTable no-footer" id="kt_table_customers_payment">
                                <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                    <tr class="text-start text-muted text-uppercase gs-0">
                                        <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_table_customers_payment" rowspan="1" colspan="1" aria-label="order No.: activate to sort column ascending" style="width: 102.422px;">order No.</th>
                                        <th class="sorting" tabindex="0" aria-controls="kt_table_customers_payment" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 85.3906px;">Customer</th>
                                        <th class="sorting" tabindex="0" aria-controls="kt_table_customers_payment" rowspan="1" colspan="1" aria-label="Amount: activate to sort column ascending" style="width: 81.1562px;">Status</th>
                                        <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_table_customers_payment" rowspan="1" colspan="1" aria-label="Rewards: activate to sort column ascending" style="width: 102.656px;">Total</th>
                                        <th class="min-w-100px sorting_disabled" rowspan="1" colspan="1" aria-label="Date" style="width: 156.125px;">Date added</th>
                                    </tr>
                                </thead>
                                <tbody class="fs-6 fw-bold text-gray-600">
                                    @foreach ($orders as $order)
                                    <tr class="odd">
                                        <td>
                                            <a href="" class="text-gray-600 text-hover-primary mb-1">#{{ $order -> order_number }}</a>
                                        </td>
                                        @foreach ($customers as $customer)
                                        @if ($order->customerID == $customer->id)
                                        <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                                        @endif
                                        @endforeach
                                        <td>
                                            @if(  $order -> status == 'No Answer')
                                            <span  class="badge badge-light-warning" >No answer</span>
                                            @elseif ( $order -> status == 'Confirmed')
                                                <span class="badge badge-light-info">Confirmed</span>
                                            @elseif ( $order -> status == 'Denied')
                                                <span class="badge badge-light-danger">Denied</span>
                                            @elseif ( $order -> status == 'Shipping')
                                                <span class="badge badge-light-success">Shipping</span>
                                            @endif
                                        </td>
                                        <td>{{ $order -> total_price}}</td>
                                        <td>{{ $order -> updated_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
                            <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                <div class="dataTables_paginate paging_simple_numbers" id="kt_table_customers_payment_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="kt_table_customers_payment_previous">
                                            <a href="#" aria-controls="kt_table_customers_payment" data-dt-idx="0" tabindex="0" class="page-link">
                                                <i class="previous"></i>
                                            </a>
                                        </li>
                                        <li class="paginate_button page-item active">
                                            <a href="#" aria-controls="kt_table_customers_payment" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#" aria-controls="kt_table_customers_payment" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                                        </li>
                                        <li class="paginate_button page-item next" id="kt_table_customers_payment_next">
                                            <a href="#" aria-controls="kt_table_customers_payment" data-dt-idx="3" tabindex="0" class="page-link">
                                                <i class="next"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
