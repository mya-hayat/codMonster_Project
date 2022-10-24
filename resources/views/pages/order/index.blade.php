@extends('layouts.app')
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">


            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                        transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input id='myInput' onkeyup='searchTable()' type="text" data-kt-ecommerce-store-filter="search"
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search store">
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">


                        <div class="w-100 mw-150px">
                            <!--begin::Select2-->
                            <select id="countriesDropdown" oninput="filterTable()"
                                class="form-select form-select-solid select2-hidden-accessible" data-control="select2"
                                data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-order-filter="status"
                                data-select2-id="select2-data-10-vwsj" tabindex="-1" aria-hidden="true">
                                <option></option>
                                <option value="All">All</option>
                                <option value="No Answer">No Answer</option>
                                <option value="Confirmed">Confirmed</option>
                                <option value="Shipping">Shipping</option>
                            </select>
                            <!--end::Select2-->
                        </div>

                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Modal - Adjust Balance-->
                <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bolder">Export Users</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form id="kt_modal_export_users_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold form-label mb-2">Select Export Format:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bolder select2-hidden-accessible" data-select2-id="select2-data-19-20mr" tabindex="-1" aria-hidden="true">
                                            <option data-select2-id="select2-data-21-ssa7"></option>
                                            <option value="excel">Excel</option>
                                            <option value="pdf">PDF</option>
                                            <option value="cvs">CVS</option>
                                            <option value="zip">ZIP</option>
                                        </select>
                                        <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="text-center">
                                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" data-kt-users-modal-action="cancel">Discard</button>
                                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                <div></div></form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div id="kt_ecommerce_sales_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="myTable">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

                                        <th class="min-w-100px sorting" tabindex="0"
                                            aria-controls="kt_ecommerce_sales_table" rowspan="1" colspan="1"
                                            aria-label="Order ID: activate to sort column ascending"
                                            style="width: 109.297px;">Order Number</th>
                                        <th class="min-w-175px sorting" tabindex="0"
                                            aria-controls="kt_ecommerce_sales_table" rowspan="1" colspan="1"
                                            aria-label="Customer: activate to sort column ascending"
                                            style="width: 231.547px;">Customer</th>
                                        <th class="min-w-175px sorting" tabindex="0"
                                            aria-controls="kt_ecommerce_sales_table" rowspan="1" colspan="1"
                                            aria-label="Customer: activate to sort column ascending"
                                            style="width: 231.547px;">Status</th>

                                        <th class="text-end min-w-100px" tabindex="0"
                                            aria-controls="kt_ecommerce_sales_table" rowspan="1" colspan="1"
                                            aria-label="Total: activate to sort column ascending"
                                            style="width: 109.297px;" aria-sort="descending">Total</th>
                                        <th class="text-end min-w-100px sorting" tabindex="0"
                                            aria-controls="kt_ecommerce_sales_table" rowspan="1" colspan="1"
                                            aria-label="Date Added: activate to sort column ascending"
                                            style="width: 109.297px;">Date Added</th>
                                        <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1"
                                            aria-label="Actions" style="width: 109.375px;"></th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->

                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600">

                                    @foreach ($orders as $order)
                                        <tr class="odd">
                                            <!--begin::Order ID=-->
                                            <td data-kt-ecommerce-order-filter="order_id">
                                                <a data-order="{{ $order->id }}"
                                                    href="{{ route('order.details', ['id' => $order->id]) }}">
                                                    <span
                                                        class="text-gray-800 text-hover-primary fw-bolder">#{{ $order->order_number }}</span>
                                                </a>
                                            </td>
                                            <!--end::Order ID=-->

                                            <!--begin::Customer=-->
                                            <td class="">
                                                <div class="d-flex align-items-center">
                                                    <!--begin:: Avatar -->
                                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                        <div class="symbol-label">
                                                            <img src="/images/homme.png" class="w-100">
                                                        </div>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <div class="ms-5">
                                                        <!--begin::Title-->
                                                        @foreach ($customers as $customer)
                                                            @if ($customer->id == $order->customerID)
                                                                <a data-customer="{{ $customer->id }}"
                                                                    href="{{ route('customer.infos', ['id' => $customer->id]) }}">
                                                                    <span
                                                                        class="text-gray-800 text-hover-primary fs-5 fw-bolder">{{ $customer->first_name }}
                                                                        {{ $customer->last_name }}</span>
                                                                </a>
                                                            @endif
                                                        @endforeach
                                                        <!--end::Title-->
                                                    </div>
                                                </div>
                                            </td>
                                            <!--end::Customer=-->
                                            <td class="status-order" data-status="{{ $order->status }}">
                                                <!--begin::Badges-->
                                                @if ($order->status == 'No Answer')
                                                    <div id="status_order{{ $order->id }}" class="badge badge-light-warning">{{ $order->status }}</div>
                                                @elseif ($order->status == 'Shipping')
                                                    <div id="status_order{{ $order->id }}" class="badge badge-light-success">{{ $order->status }}</div>
                                                @elseif ($order->status == 'Denied')
                                                    <div id="status_order{{ $order->id }}" class="badge badge-light-danger">{{ $order->status }}</div>
                                                @elseif ($order->status == 'Confirmed')
                                                    <div id="status_order{{ $order->id }}" class="badge badge-light-primary">{{ $order->status }}</div>
                                                @endif
                                                <!--end::Badges-->
                                            </td>
                                            <!--begin::Total=-->
                                            <td class="text-end pe-0 sorting_1">
                                                <span class="fw-bolder">{{ $order->total_price }} {{ $store->currency }}</span>
                                            </td>
                                            <!--end::Total=-->

                                            <!--begin::Date Added=-->
                                            <td class="text-end" data-order="2022-05-04">
                                                <span class="fw-bolder">{{ $order->created_at }}</span>
                                            </td>
                                            <!--end::Date Added=-->

                                            <!--begin::Action=-->
                                            <td class="text-end">
                                                <div class="w-100 mw-150px">
                                                    <select data-order="{{@$order->id}}" name="edit_status"
                                                        class="form-select form-select-solid select2-hidden-accessible update_status update_status{{ $order->id }}"
                                                        data-placeholder="Edit Status" data-control="select2"
                                                        tabindex="-1" aria-hidden="true">
                                                            <option data-select2-id="select2-data-12-edja"></option>
                                                            <option value="No Answer">No Answer</option>
                                                            <option value="Confirmed">Confirmed</option>
                                                            <option value="Shipping">Shipping</option>
                                                            <option value="Denied">Denied</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @if (\Session::has('message'))
                                        <div id="alert_edit" class="alert alert-success text-center">
                                            {!! \Session::get('message') !!}
                                            <span style="display: flex;float: right" onclick="close_alerte_edit()"
                                                id="close" class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                        height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                                        fill="green"></rect>
                                                    <rect x="7.41422" y="6" width="16" height="2"
                                                        rx="1" transform="rotate(45 7.41422 6)" fill="green">
                                                    </rect>
                                                </svg>
                                            </span>
                                        </div>
                                    @endif

                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <div class="row">
                            <div
                                class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                            </div>
                            <div
                                class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                <div class="dataTables_paginate paging_simple_numbers"
                                    id="kt_subscriptions_table_paginate">

                                        {{ $orders->links() }}

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Products-->
        </div>
        <!--end::Container-->

    </div>
@endsection

@section('scripts')
    <script>


    //***************************SEARCH FUNCTION****************************

    function searchTable() {
        var input, filter, found, table, tr, td, i, j;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (j = 0; j < td.length; j++) {
                if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                }
            }
            if (found) {
                tr[i].style.display = "";
                found = false;
            } else {
                tr[i].style.display = "none";
            }
        }
    }

        // *********************** Filter Table ********************

        function filterTable() {
            // Variables
            let dropdown, table, rows, cells, country, filter;
            dropdown = document.getElementById("countriesDropdown");
            table = document.getElementById("myTable");
            rows = table.getElementsByTagName("tr");
            filter = dropdown.value;

            $.each($('#myTable > tbody > tr'), (i, item) => {
                $(item).find('.status-order').each(function (index, td) {
                    if( filter !== "All" ) {
                        if( filter ===  $(this).attr('data-status') ) {
                            item.style.display = "";
                        } else {
                            item.style.display = "none";
                        }
                    } else {
                        item.style.display = "";
                    }
                });
            });
        }


        // *********************** Status  Update ********************

    $(document).on("change", ".update_status", function() {

        var order = $(this).attr('data-order');
        var update_status = $('.update_status'+order).val();

        $.ajax({
            url: "/order/editStatus",
            type: "post",
            data: {
                "_token": "{{ csrf_token() }}",
                "order": order,
                "status": update_status,
            },

            success: function (response) {
                if(response.status==1) {
                    console.log(response.status_rep);
                    $("#status_order"+order).html(response.status_rep);
                    if(response.status_rep == 'No Answer'){
                        $("#status_order"+order).attr("class", "badge badge-light-warning");
                    }
                    if(response.status_rep == 'Confirmed'){
                        $("#status_order"+order).attr("class", "badge badge-light-primary");
                    }
                    if(response.status_rep == 'Shipping'){
                        $("#status_order"+order).attr("class", "badge badge-light-success");
                    }
                    if(response.status_rep == 'Denied'){
                        $("#status_order"+order).attr("class", "badge badge-light-danger");
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });

    });

        function close_alerte_edit() {
            document.getElementById('alert_edit').style.display = 'none';
        }
    </script>
@endsection
