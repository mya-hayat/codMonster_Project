@extends('layouts.app')

@section('content')

    @if (\Session::has('message'))
        <div id="alerte" class="alert alert-success text-center" >
            <b style="color: green"> {!! \Session::get('message') !!}</b>
            <span style="display: flex;float: right" onclick="close_alerte()" id="close" class="svg-icon svg-icon-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="green"></rect>
                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="green"></rect>
                </svg>
            </span>
        </div>
    @endif
    <div class="d-flex flex-column flex-xl-row">

        <!--begin::Sidebar-->
        <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
            <!--begin::Card-->
            <div class="card mb-5 mb-xl-8">
                <!--begin::Card body-->
                <div class="card-body pt-15">
                    <!--begin::Summary-->
                    <div class="d-flex flex-center flex-column mb-5">
                        <!--begin::Name-->
                        <a href="#"
                            class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">{{ $customer->first_name }}
                            {{ $customer->last_name }}</a>
                        <!--end::Name-->
                        <!--begin::Email-->
                        <a href="#"
                            class="fs-5 fw-bold text-muted text-hover-primary mb-6">{{ $customer->first_name }}.{{ $customer->last_name }}@gmail.com</a>
                        <!--end::Email-->
                    </div>
                    <!--end::Summary-->

                    <div class="separator separator-dashed my-3"></div>
                    <!--begin::Details content-->
                    <div class="pb-5 fs-6">
                        <!--begin::Details item-->
                        <div class="fw-bolder mt-5">Account ID</div>
                        <div class="text-gray-600">{{ $customer->id }}</div>
                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        <div class="fw-bolder mt-5"> Email</div>
                        <div class="text-gray-600">
                            <a
                                class="text-gray-600 text-hover-primary">{{ $customer->first_name }}.{{ $customer->last_name }}@gmail.com</a>
                        </div>
                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        <div class="fw-bolder mt-5">Delivery Address</div>
                        @foreach ($adresses as $address )
                            <div class="text-gray-600">{{ $address->city }},
                                <br>{{ $address->country }}
                                <br>{{ $address->description }}
                            </div>
                        @endforeach

                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        <div class="fw-bolder mt-5">Phone Number</div>
                        <div class="text-gray-600">{{ $customer->phone }}</div>
                        <!--begin::Details item-->
                        <!--begin::Details item-->

                        <!--begin::Details item-->
                    </div>
                    <!--end::Details content-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Sidebar-->
        <!--begin::Content-->
        <div class="flex-lg-row-fluid ms-lg-15">
            <!--begin:::Tabs-->
            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                        href="#kt_ecommerce_customer_overview">Overview</a>
                </li>
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                        href="#kt_ecommerce_customer_general">General Settings</a>
                </li>
                <!--end:::Tab item-->
                {{-- <!--begin:::Tab item-->
            <li class="nav-item">
                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_customer_advanced">Advanced Settings</a>
            </li>
            <!--end:::Tab item--> --}}
            </ul>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            <div class="tab-content" id="myTabContent">
                <!--begin:::Tab pane-->
                <div class="tab-pane fade show active" id="kt_ecommerce_customer_overview" role="tabpanel">
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Transaction History</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0 pb-5">
                            <!--begin::Table-->
                            <div id="kt_table_customers_payment_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed gy-5 dataTable no-footer"
                                        id="kt_table_customers_payment">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                            <!--begin::Table row-->
                                            <tr class="text-start text-muted text-uppercase gs-0">
                                                <th class="min-w-100px sorting" tabindex="0"
                                                    aria-controls="kt_table_customers_payment" rowspan="1" colspan="1"
                                                    aria-label="order No.: activate to sort column ascending"
                                                    style="width: 100px;">order No.</th>
                                                <th class="sorting" tabindex="0"
                                                    aria-controls="kt_table_customers_payment" rowspan="1" colspan="1"
                                                    aria-label="Status: activate to sort column ascending"
                                                    style="width: 83.125px;">Status</th>
                                                <th class="sorting" tabindex="0"
                                                    aria-controls="kt_table_customers_payment" rowspan="1" colspan="1"
                                                    aria-label="Amount: activate to sort column ascending"
                                                    style="width: 79.0312px;">Amount</th>
                                                <th class="min-w-100px sorting" tabindex="0"
                                                    aria-controls="kt_table_customers_payment" rowspan="1" colspan="1"
                                                    aria-label="Rewards: activate to sort column ascending"
                                                    style="width: 100px;">Note</th>
                                                <th class="min-w-100px sorting_disabled" rowspan="1" colspan="1"
                                                    aria-label="Date" style="width: 100px;">Date</th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fs-6 fw-bold text-gray-600">
                                            @foreach ($orders as $order)
                                                <tr class="odd">
                                                    <!--begin::order=-->
                                                    <td>
                                                        <a href="{{ route('order.details', [ 'id' => $order->id ]) }}" class="text-gray-600 text-hover-primary mb-1">
                                                            #{{ $order->order_number }}
                                                        </a>
                                                    </td>
                                                    <!--end::order=-->
                                                    <!--begin::Status=-->
                                                    <td>
                                                        <span class="badge badge-light-success">{{ $order->status }}</span>
                                                    </td>
                                                    <!--end::Status=-->
                                                    <!--begin::Amount=-->
                                                    <td>${{ $order->total_price }}</td>
                                                    <!--end::Amount=-->
                                                    <!--begin::Amount=-->
                                                    <td data-order="0000-01-12T00:00:00-00:30">{{ $order->note }}</td>
                                                    <!--end::Amount=-->
                                                    <!--begin::Date=-->
                                                    <td>{{ $order->created_at }}</td>
                                                    <!--end::Date=-->
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                </div>

                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end:::Tab pane-->
                <!--begin:::Tab pane-->
                <div class="tab-pane fade" id="kt_ecommerce_customer_general" role="tabpanel">
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Profile</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0 pb-5">
                            <!--begin::Form-->
                            <form action="{{ route('customer.update') }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework " id="kt_ecommerce_customer_profile">

                                @csrf
                                <!--begin::Row-->
                                <input type="text" name="id_customer" value="{{ $customer->id }}" hidden>
                                <div class="row row-cols-1 row-cols-md-2">
                                    <!--begin::Col-->
                                    <div class="col">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-bold mb-2">
                                                <span class="required">First Name</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                    title="" data-bs-original-title="Email address must be active"
                                                    aria-label="Email address must be active"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                name="first_name" value="{{ $customer->first_name }}">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-bold mb-2">
                                                <span>Last Name </span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                    title="" data-bs-original-title="Email address must be active"
                                                    aria-label="Email address must be active"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder=""
                                                name="last_name" value="{{ $customer->last_name }}">
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2 required">Email</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="email" class="form-control form-control-solid" placeholder=""
                                        name="email"
                                        value="{{ $customer->first_name }}.{{ $customer->last_name }}@gmail.com">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2 required">Adress</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    @foreach ($adresses as $adress )
                                        <input type="text" name="id_address" value="{{ $adress->id }}" hidden>
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                        name="address"
                                        value="{{ $adress->city }}  ">
                                    @endforeach

                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2 required">Phone Number</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                        name="phone" value="{{ $customer->phone }}">
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <div class="d-flex justify-content-end">
                                    <!--begin::Button-->
                                    <button type="submit" class="btn btn-light-primary">
                                        <span class="indicator-label">Save</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <!--end::Button-->
                                </div>
                                <div></div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->

                </div>
            </div>
            <!--end:::Tab content-->
        </div>
        <!--end::Content-->
    </div>
@endsection
    <script>
        function close_alerte(){
             document.getElementById('alerte').style.display = 'none';
        }
    </script>
@section('scripts')
@endsection
