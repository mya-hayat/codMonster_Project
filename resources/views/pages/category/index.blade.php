@extends('layouts.app')
@section('content')
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Category-->
        <div class="card card-flush">
            <div class="card-header align-items-center py-5 gap-2 gap-md-5" data-select2-id="select2-data-124-bzr2">
                <!--begin::Card title-->
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                    transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input id='myInput' onkeyup='searchTable()' name="search" type="text"
                            data-kt-ecommerce-store-filter="search" class="form-control form-control-solid w-250px ps-14"
                            placeholder="Search product">
                    </div>
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5" data-select2-id="select2-data-123-vtqx">

                    <!--begin::Add product-->
                    <a class=" addCategory btn btn-primary">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"></rect>
                            </svg>
                        </span>
                        Add Category</a>
                    @include('pages.category.add')
                    <!--end::Add product-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <div id="kt_ecommerce_category_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        @if (\Session::has('message_add'))
                        <div id="alert_add" class="alert alert-success text-center">
                            {!! \Session::get('message_add') !!}
                            <span style="display: flex;float: right" onclick="close_alerte_add()" id="close" class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="green"></rect>
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="green"></rect>
                                </svg>
                            </span>
                        </div>
                        @endif
                        @if (\Session::has('message_edit'))
                        <div id="alert_edit" class="alert alert-primary text-center">
                            {!! \Session::get('message_edit') !!}
                            <span style="display: flex;float: right" onclick="close_alerte_edit()" id="close" class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="blue"></rect>
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="blue"></rect>
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
                            id="kt_ecommerce_category_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

                                    <th class="min-w-250px sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                        rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending"
                                        style="width: 568.177px;">
                                        Category
                                    </th>


                                    <th class="text-end min-w-70px sorting_disabled" rowspan="1" colspan="1"
                                        aria-label="Actions" style="width: 95.9896px;">
                                        Actions
                                    </th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">

                                @foreach ($categories as $category)
                                    <tr class="odd">
                                        <td>
                                            <div class="d-flex">
                                                <!--end::Thumbnail-->
                                                <div class="ms-5">
                                                    <!--begin::Title-->
                                                    <a href="" class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
                                                        data-kt-ecommerce-category-filter="category_name">{{ $category->name }}</a>
                                                    <!--end::Title-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7 fw-bolder">{{ $category->description }}.
                                                    </div>
                                                    <!--end::Description-->
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
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
                                                <!--end::Svg Icon-->
                                            </a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                data-kt-menu="true" style="">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a class="editCategory updateCategory menu-link px-3"
                                                        data-category="{{ $category->id }}">
                                                        Edit</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a class="deleteCategory menu-link px-3"
                                                        data-name="{{ $category->name }}"
                                                        data-category="{{ $category->id }}">
                                                        Delete</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                        </td>
                                        <!--end::Action=-->
                                    </tr>
                                    @include('pages.category.delete')
                                    @include('pages.category.update')
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>

                    </div>
                </div>
                <!--end::Table-->
                <div class="row">
                    <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
                    <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="dataTables_paginate paging_simple_numbers" id="kt_subscriptions_table_paginate">

                                {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Category-->
    </div>

@endsection

@section('scripts')
    <script>
        //*******************************ADD CATEGORY ***************************************
        // OPEN POPUP
        $('.addCategory').on('click', function(evt) {
            $('#modalAddStore').modal('toggle');
            $('#modalAddStore').modal('show');
            $('#modalAddStore').modal('hide');
        });
        //CLOSE POPUP
        $('.close-addStore').click(function(evt) {
            $('#modalAddStore').modal('toggle');
            $('#modalAddStore').modal('hide');
        });
        //******************************DELETE CATEGORY ***************************************
        $('.deleteCategory').on('click', function(e) {
            let id = $(this).attr('data-category');
            let name = $(this).attr('data-name');
            $('#id_category').val(id);
            $('#title_confirm').text('Are you sure you want to delete category ' + name + ' ?');
            // OPEN POPUP
            $('#modalDeleteStore').modal('toggle');
            $('#modalDeleteStore').modal('show');
            $('#modalDeleteStore').modal('hide');
            //CLOSE POPUP
            $('.close-deleteStore').click(function(evt) {
                $('#modalDeleteStore').modal('toggle');
                $('#modalDeleteStore').modal('hide');
            });
        });
        //******************************UPDATE CATEGORY ***************************************
        $('.editCategory').on('click', function(evt) {
            let id = $(this).attr('data-category');
            console.log(id)
            $('#id_update_cat').val(id);
            $.ajax({
                url: "/category/edit",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function(response) {
                    $('#name_edit').val(response["data"]['name']);
                    $('#description_edit').val(response["data"]['description']);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

            $('#modalEditcategory').modal('toggle');
            $('#modalEditcategory').modal('show');
            $('#modalEditcategory').modal('hide');
        });
        //CLOSE POPUP
        $('.close-updateCategory').click(function(evt) {
            $('#modalEditcategory').modal('toggle');
            $('#modalEditcategory').modal('hide');
        });
        $('#cancel_btn').click(function(evt) {
            $('#modalEditcategory').modal('toggle');
            $('#modalEditcategory').modal('hide');
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

        function close_alerte_add(){
            document.getElementById('alert_add').style.display = 'none';
       }

       function close_alerte_edit(){
            document.getElementById('alert_edit').style.display = 'none';
       }

       function close_alerte_delete(){
            document.getElementById('alert_delete').style.display = 'none';
       }

    </script>
@endsection
