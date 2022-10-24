@extends('layouts.admin')

@section('content')
    <!--begin::Main-->
    <div class="post d-flex flex-column-fluid index-page" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            <div class="row gy-5 g-xl-8">
                <!--begin::Col-->
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card card-xxl-stretch mb-5 mb-xl-10" style="background-color: #e2d0f4">
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex flex-column mb-7">
                                        <a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Summary</a>
                                    </div>
                                    <div class="row g-0">
                                        <div class="col-12">
                                            <div class="d-flex align-items-center mb-9 me-2">
                                                <div class="symbol symbol-40px me-3">
                                                    <div class="symbol-label bg-white bg-opacity-50">
                                                        <span class="svg-icon svg-icon-1 svg-icon-dark">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3"
                                                                    d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z"
                                                                    fill="currentColor"></path>
                                                                <path
                                                                    d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fs-5 text-dark fw-bolder lh-1">
                                                        {{ @$sales }}
                                                    </div>
                                                    <div class="fs-7 text-gray-600 fw-bold">Sales</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex align-items-center mb-9 ms-2">
                                                <div class="symbol symbol-40px me-3">
                                                    <div class="symbol-label bg-white bg-opacity-50">
                                                        <span class="svg-icon svg-icon-1 svg-icon-dark">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M8 22C7.4 22 7 21.6 7 21V9C7 8.4 7.4 8 8 8C8.6 8 9 8.4 9 9V21C9 21.6 8.6 22 8 22Z"
                                                                    fill="currentColor"></path>
                                                                <path opacity="0.3"
                                                                    d="M4 15C3.4 15 3 14.6 3 14V6C3 5.4 3.4 5 4 5C4.6 5 5 5.4 5 6V14C5 14.6 4.6 15 4 15ZM13 19V3C13 2.4 12.6 2 12 2C11.4 2 11 2.4 11 3V19C11 19.6 11.4 20 12 20C12.6 20 13 19.6 13 19ZM17 16V5C17 4.4 16.6 4 16 4C15.4 4 15 4.4 15 5V16C15 16.6 15.4 17 16 17C16.6 17 17 16.6 17 16ZM21 18V10C21 9.4 20.6 9 20 9C19.4 9 19 9.4 19 10V18C19 18.6 19.4 19 20 19C20.6 19 21 18.6 21 18Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fs-5 text-dark fw-bolder lh-1">{{ @$count_order }}</div>
                                                    <div class="fs-7 text-gray-600 fw-bold">Orders</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card card-xxl-stretch mb-5 mb-xl-10" style="background-color: #CBD4F4">
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex flex-column mb-7">
                                        <a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Summary</a>
                                    </div>
                                    <div class="row g-0">
                                        <div class="col-12">
                                            <div class="d-flex align-items-center mb-9 me-2">
                                                <div class="symbol symbol-40px me-3">
                                                    <div class="symbol-label bg-white bg-opacity-50">
                                                        <span class="svg-icon svg-icon-1 svg-icon-dark">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3"
                                                                    d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z"
                                                                    fill="currentColor"></path>
                                                                <path
                                                                    d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fs-5 text-dark fw-bolder lh-1">
                                                        {{ @$count_customers }}
                                                    </div>
                                                    <div class="fs-7 text-gray-600 fw-bold">Customers</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex align-items-center mb-9 ms-2">
                                                <div class="symbol symbol-40px me-3">
                                                    <div class="symbol-label bg-white bg-opacity-50">
                                                        <span class="svg-icon svg-icon-1 svg-icon-dark">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M8 22C7.4 22 7 21.6 7 21V9C7 8.4 7.4 8 8 8C8.6 8 9 8.4 9 9V21C9 21.6 8.6 22 8 22Z"
                                                                    fill="currentColor"></path>
                                                                <path opacity="0.3"
                                                                    d="M4 15C3.4 15 3 14.6 3 14V6C3 5.4 3.4 5 4 5C4.6 5 5 5.4 5 6V14C5 14.6 4.6 15 4 15ZM13 19V3C13 2.4 12.6 2 12 2C11.4 2 11 2.4 11 3V19C11 19.6 11.4 20 12 20C12.6 20 13 19.6 13 19ZM17 16V5C17 4.4 16.6 4 16 4C15.4 4 15 4.4 15 5V16C15 16.6 15.4 17 16 17C16.6 17 17 16.6 17 16ZM21 18V10C21 9.4 20.6 9 20 9C19.4 9 19 9.4 19 10V18C19 18.6 19.4 19 20 19C20.6 19 21 18.6 21 18Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="fs-5 text-dark fw-bolder lh-1">{{ @$count_products }}</div>
                                                    <div class="fs-7 text-gray-600 fw-bold">Products</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-xxl-6">
                    <div class="card card-xl-stretch mb-5 mb-xl-10">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">Last Orders</span>
                                <span class="text-muted mt-1 fw-bold fs-7">5 Latest orders</span>
                            </h3>
                        </div>
                        <div class="card-body pt-5">
                            @foreach (@$orders_last as $item)
                                <div class="d-flex align-items-sm-center mb-7">
                                    <div class="symbol symbol-50px me-5">
                                        <span class="symbol-label">
                                            <img src="https://icon-library.com/images/order-online-icon/order-online-icon-4.jpg" class="h-50 align-self-center" alt="">
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <div class="flex-grow-1 me-2">
                                            <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">
                                                # {{ @$item->order_number }}
                                            </a>
                                            <span class="text-muted fw-bold d-block fs-7">
                                                {{ @$item->last_name }} {{ @$item->first_name }}
                                            </span>
                                        </div>
                                        <span class="badge badge-light fw-bolder my-2">
                                            {{ @$item->total_price }} {{ @$store->currency }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6">
                    <div class="card card-xl-stretch mb-5 mb-xl-10">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">Last Stores</span>
                                <span class="text-muted mt-1 fw-bold fs-7">5 Latest Stores</span>
                            </h3>
                        </div>
                        <div class="card-body pt-5">
                            @foreach (@$stores as $item)
                                <div class="d-flex align-items-sm-center mb-7">
                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                        <a href="" class="symbol symbol-50px">
                                            {{-- <span class="symbol-label" style="background-image:url(/metronic8/demo1/assets/media//stock/ecommerce/1.gif);"></span> --}}
                                            <img src="{{ Storage::url(@$user->profil_img) }}" alt="user" />
                                        </a>

                                     </div>
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <div class="flex-grow-1 me-2">
                                            <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">
                                                {{ @$item->name }}
                                            </a>
                                            <span class="text-muted fw-bold d-block fs-7">
                                                {{ @$item->domain }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
    </div>
@endsection
