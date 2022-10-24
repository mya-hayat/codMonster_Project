@extends('layouts.admin')

@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
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
                        style="background-image: url( {{ Storage::url($commercial -> profil_img) }} ); background-size: cover;"></div>                    </div>
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
                        <select id="statusStore" oninput="filterTable()"
                            class="form-select form-select-solid select2-hidden-accessible" data-control="select2"
                            data-hide-search="true" data-placeholder="Status"
                             tabindex="-1" aria-hidden="true">
                            <option ></option>
                            <option value="All">All</option>
                            <option value="Active">Active</option>
                            <option value="Innactive">Innactive</option>
                        </select>
                        <!--end::Select2-->
                    </div>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

<div class="card-body pt-0">
    <!--begin::Table-->
    <div id="kt_ecommerce_stores_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="table-responsive">
            <table id='myTable' class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                 id="kt_ecommerce_stores_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_subscriptions_table" rowspan="1" colspan="1" aria-label="Customer: activate to sort column ascending" style="width: 125px;">Store name</th>
                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_subscriptions_table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 125px;">Status</th>
                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_subscriptions_table" rowspan="1" colspan="1" aria-label="Billing: activate to sort column ascending" style="width: 142.234px;">Domain</th>
                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_subscriptions_table" rowspan="1" colspan="1" aria-label="Created Date: activate to sort column ascending" style="width: 125px;">Currency</th>
                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_subscriptions_table" rowspan="1" colspan="1" aria-label="Created Date: activate to sort column ascending" style="width: 125px;">Country</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @foreach (@$stores as $store)
                    <tr>
                        <td>
                            <a data-store="{{ $store->id }}" href="{{ route('admin.store.infos',['id'=>$store->id]) }}" class="text-gray-800 fw-bolder text-hover-primary mb-1">{{ $store->name }}</a>
                        </td>
                        <td class="status-store" data-status="{{ $store->status }}">
                            @if ($store->status == "Active")
                                <div class="badge badge-light-success">Active</div>
                            @else
                                <div class="badge badge-light-danger">Inactive</div>

                            @endif
                        </td>
                        <td>
                            <a href="{{ $store->domain }}">
                            <span class="fw-bolder">{{ $store->domain }}</span>
                            </a>
                        </td>

                        <td>
                            <div class="badge badge-light-warning">{{$store->currency}}</div>
                        </td>
                        <td>
                            <span class="fw-bolder">{{ $store->country_name }}</span>
                        </td>
                    </tr>


                    @endforeach
                </tbody>
            </table>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
    <div class="row">
        <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
        <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
            <div class="dataTables_paginate paging_simple_numbers" id="kt_subscriptions_table_paginate">

                    {{ $stores->links() }}

            </div>
        </div>
    </div>
</div>
</div>
</div>
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

function filterTable() {
    // Variables
    let dropdown, table, rows, cells, country, filter;
    dropdown = document.getElementById("statusStore");
    table = document.getElementById("myTable");
    rows = table.getElementsByTagName("tr");
    filter = dropdown.value;

    $.each($('#myTable > tbody > tr'), (i, item) => {
        $(item).find('.status-store').each(function (index, td) {
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

</script>

@endsection
