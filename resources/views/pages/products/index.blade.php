@extends('layouts.app')
@section('content')
    <!--begin::Main-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            {{--  <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('store') }}" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted"> <a href="{{ route('dashbord') }}"> Dashbord</a></li>
                <!--end::Item-->
                <!--begin::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted"> <a href="{{ route('product') }}"> Products</a></li>
                <!--end::Item-->
                <!--begin::Item-->
                <!--begin::Item-->

            </ul>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->
        </div>  --}}
            <!--begin::stores-->
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
                            <input id='myInput' onkeyup='searchTable()' name="search" type="text"
                                data-kt-ecommerce-store-filter="search"
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search product">
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <div class="w-100 mw-150px">
                            <span>
                                <!--begin::Select2-->
                                <select id="countriesDropdown" oninput="filterTable()" class="form-select form-select-solid select2-hidden-accessible"
                                    data-control="select2" data-hide-search="true" data-placeholder="Status"
                                    data-kt-ecommerce-store-filter="status" data-select2-id="select2-data-10-wl54"
                                    tabindex="-1" aria-hidden="true">
                                    <option value=""></option>
                                    <option value="all">All</option>
                                    <option value="published">Published</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </span>
                        </div>
                        <a href="{{ route('product.add.view') }}" class="addProduct btn btn-primary">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"></rect>
                                </svg>
                            </span>
                            Add Product</a>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div id="kt_ecommerce_stores_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">

                            @if (\Session::has('message'))
                                <div id="alert_edit" class="alert alert-success text-center">
                                    {!! \Session::get('message') !!}
                                    <span style="display: flex;float: right" onclick="close_alerte_edit()" id="close" class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="green"></rect>
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="green"></rect>
                                        </svg>
                                    </span>
                                </div>
                            @endif

                            @if (\Session::has('message_delete'))
                                <div id="alert_delete" class="alert alert-danger text-center">
                                    {!! \Session::get('message_delete') !!}
                                    <span style="display: flex;float: right" onclick="close_alerte_delete()" id="close" class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="red"></rect>
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="red"></rect>
                                        </svg>
                                    </span>
                                </div>
                            @endif

                            <table id='myTable' class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                id="kt_ecommerce_stores_table">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->

                                    <th class="min-w-200px sorting" tabindex="0" aria-controls="kt_ecommerce_stores_table"
                                        rowspan="1" colspan="1" aria-label="Store: activate to sort column ascending"
                                        style="width: auto;">Product Name </th>
                                    <th class="d-flex align-items-center" tabindex="0" aria-controls="kt_ecommerce_stores_table"
                                        rowspan="1" colspan="1" aria-label="Store: activate to sort column ascending"
                                        style="width: auto;">
                                        Status </th>
                                    <th  class=" text-center min-w-200px sorting" tabindex="0" aria-controls="kt_ecommerce_stores_table"
                                    rowspan="1" colspan="1" style="width: auto;">Description</th>
                                    <th class="text-end min-w-100px sorting" tabindex="0"
                                        aria-controls="kt_ecommerce_stores_table" rowspan="1" colspan="1"
                                        aria-label="Currency: activate to sort column ascending" style="width: auto;">
                                        Category </th>
                                    <th class="text-end min-w-70px sorting_disabled" rowspan="1" colspan="1"
                                        aria-label="Actions" style="width: auto;">Actions</th>
                                    </tr>

                                <tbody>
                                    @foreach (@$products as $product)
                                        <tr>
                                            <td class="sorting_1">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Thumbnail-->
                                                    @foreach ($images as $image)
                                                    @if ($image->ID_pro_var == $product->id)
                                                    <a href="" class="symbol symbol-50px">
                                                        {{-- <span class="symbol-label" style="background-image:url(/metronic8/demo1/assets/media//stock/ecommerce/1.gif);"></span> --}}
                                                        <img src="{{ Storage::url(@$image->url) }}" alt="user" />
                                                    </a>
                                                    @endif
                                                    @endforeach

                                                    <!--end::Thumbnail-->
                                                    <div class="ms-5">
                                                        <!--begin::Title-->
                                                        <span class="fw-bolder animals">{{ $product->title }}</span>
                                                        <!--end::Title-->
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="d-flex align-items-center" data-status="{{ $product->status }}">
                                                @if($product->status == 'published')
                                                    <span class="fw-bolder badge badge-light-success">{{ $product->status }}</span>
                                                @endif
                                                @if($product->status == 'draft')
                                                <span class="fw-bolder badge badge-light-primary">{{ $product->status }}</span>
                                            @endif

                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="fw-bolder">{{ $product->description }}</span>
                                            </td>
                                            @foreach ( $categories as $category )
                                                @if($category->id == $product->categoryID)
                                                    <td class="text-end pe-0">
                                                        <span class="badge badge-light-warning">{{ $category->name }}</span>
                                                    </td>
                                                @endif

                                            @endforeach

                                            <td class="text-end">

                                                <a class="btn btn-sm btn-light btn-active-light-primary"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                    <span class="svg-icon svg-icon-5 m-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none">
                                                            <path
                                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>

                                                </a>
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <div class="menu-item px-3">
                                                        <a class="editProduct menu-link px-3" href="{{ route('product.edit', [ 'id'=>$product->id ]) }}" >
                                                            Edit
                                                        </a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">

                                                        <a class="deleteProduct menu-link px-3"
                                                            data-name="{{ $product->title }}"
                                                            data-product="{{ $product->id }}">Delete</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
                        <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                            <div class="dataTables_paginate paging_simple_numbers" id="kt_subscriptions_table_paginate">

                                    {{ $products->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.products.delete')
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            //***************************************************
            //    POPUP DELETE Product
            //***************************************************
            $('.deleteProduct').on('click', function(e) {
                let id = $(this).attr('data-product');
                let name = $(this).attr('data-name');
                $('#id_product').val(id);
                $('#title_confirm').text('Are you sure you want to delete ' + name + ' ?');
                // OPEN POPUP
                $('#modalDeleteProduct').modal('toggle');
                $('#modalDeleteProduct').modal('show');
                $('#modalDeleteProduct').modal('hide');
                //CLOSE POPUP
                $('.close-deleteProduct').click(function(evt) {
                    $('#modalDeleteProduct').modal('toggle');
                    $('#modalDeleteProduct').modal('hide');
                });
            });
        });

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

        function close_alerte_edit(){
            document.getElementById('alert_edit').style.display = 'none';
       }

       function close_alerte_delete(){
            document.getElementById('alert_delete').style.display = 'none';
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
                $(item).find('.status-product').each(function (index, td) {
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
