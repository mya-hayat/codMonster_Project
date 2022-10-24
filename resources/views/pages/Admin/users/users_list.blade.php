@extends('layouts.admin')

@section('content')

<div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
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
                    class="form-control form-control-solid w-250px ps-14" placeholder="Search users">
            </div>
            <!--end::Search-->

        </div>
        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
            <div class="w-100 mw-150px me-3">
                <!--begin::Select2-->
                <select id="statusUser" oninput="filterTable()"
                    class="form-select form-select-solid select2-hidden-accessible" data-control="select2"
                     data-placeholder="Status"
                     tabindex="-1" aria-hidden="true">
                    <option ></option>
                    <option value="All">All</option>
                    <option value="Active">Active</option>
                    <option value="Innactive">Innactive</option>
                </select>
                <!--end::Select2-->
            </div>
        </div>
        <!--begin::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">

                <!--begin::Export-->
                <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor"></rect>
                        <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="currentColor"></path>
                        <path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->Export</button>
                <!--end::Export-->
                <!--begin::Add user-->

                <!--end::Add user-->
            </div>
            <!--end::Toolbar-->

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
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Actions-->
                                <div class="text-center">
                                        <input type="button" id="btnExport" value="PDF" onclick="Export()" class="btn btn-light me-3 btn-danger">
                                        <button onclick="exportData()" class="btn btn-success">
                                            <span class="indicator-label">Ecxel</span>
                                            <span class="indicator-progress">Please wait...</span>
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
            <!--end::Modal - New Card-->
            @include('pages.Admin.users.add')
            <!--end::Modal - Add task-->
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body py-4">
        <!--begin::Table-->
        <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="table-responsive">
            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"  id='myTable'>
            <!--begin::Table head-->
            <thead>
                <!--begin::Table row-->
                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                    {{--  <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 29.25px;">
                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1">
                        </div>
                    </th>  --}}
                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 226.427px;">User</th>
                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Last login: activate to sort column ascending" style="width: 125px;">Last login</th>
                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Two-step: activate to sort column ascending" style="width: 125px;">Activation</th>
                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Joined Date: activate to sort column ascending" style="width: 125px;">Joined Date</th>
                    <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 100px;">Actions</th>
                </tr>
                <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody class="text-gray-600 fw-bold">
            @foreach ($users as $use )
                <tr class="even">
                    {{--  <!--begin::Checkbox-->
                    <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1">
                        </div>
                    </td>
                    <!--end::Checkbox-->  --}}
                    <!--begin::User=-->
                    <td class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="" class="symbol symbol-50px">
                                {{-- <span class="symbol-label" style="background-image:url(/metronic8/demo1/assets/media//stock/ecommerce/1.gif);"></span> --}}
                                <img src="{{ Storage::url(@$use->profil_img) }}" alt="user" />
                            </a>

                         </div>
                        <!--end::Avatar-->
                        <!--begin::User details-->
                        <div class="d-flex flex-column">
                          <a href="{{ route('admin.user.infos',['id'=>$use->id]) }}">{{ $use->name }}</a>
                            <span> {{ $use->email }}</span>
                        </div>
                        <!--begin::User details-->
                    </td>
                    <!--end::User=-->

                    <!--begin::Last login=-->
                    <td >
                        <div class="badge badge-light fw-bolder"> {{ $use->updated_at }}</div>
                    </td>
                    <!--end::Last login=-->
                    <!--begin::Two step=-->
                    @if ($use->isActive == 1)
                        <td class="status_user" data-user="Active">
                    @else
                        <td class="status_user" data-user="Innactive">
                    @endif
                        @if ($use->isActive == 1)
                            <div id="active{{ $use->id }}" class="badge badge-light-success fw-bolder"> Active </div>
                        @else
                            <div id="active{{ $use->id }}" class="badge badge-light-warning fw-bolder"> Innactive </div>
                        @endif
                    </td>
                    <!--end::Two step=-->
                    <!--begin::Joined-->
                    <td > {{ $use->created_at }}</td>
                    <!--begin::Joined-->
                    <!--begin::Action=-->
                    <td class="text-end">
                        <div class="w-100 mw-150px">
                            <select data-user="{{@$use->id}}" name="activate_user"
                                class="form-select form-select-solid select2-hidden-accessible activate_user activate_user{{ $use->id }}"
                                data-placeholder="Activate" data-control="select2"
                                tabindex="-1" aria-hidden="true">
                                    <option data-select2-id="select2-data-12-edja"></option>
                                    <option value="1">Active</option>
                                    <option value="0">Innactive</option>

                            </select>
                        </div>
                    </td>
                    <!--end::Action=-->
                </tr>
            @endforeach


                </tbody>
            <!--end::Table body-->
        </table></div>
        <!--end::Table-->
        <div class="row">
            <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
            <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                <div class="dataTables_paginate paging_simple_numbers" id="kt_subscriptions_table_paginate">

                        {{ $users->links() }}

                </div>
            </div>
        </div>


    </div>
    <!--end::Card body-->
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script type="text/javascript"></script>
<script>


function filterTable() {
    // Variables
    let dropdown, table, rows, cells, country, filter;
    dropdown = document.getElementById("statusUser");
    table = document.getElementById("myTable");
    rows = table.getElementsByTagName("tr");
    filter = dropdown.value;

    $.each($('#myTable > tbody > tr'), (i, item) => {
        $(item).find('.status_user').each(function (index, td) {
            if( filter !== "All" ) {
                if( filter ===  $(this).attr('data-user') ) {
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

    function exportData(){
        /* Get the HTML data using Element by Id */
        var table = document.getElementById("myTable");

        /* Declaring array variable */
        var rows =[];

          //iterate through rows of table
        for(var i=0,row; row = table.rows[i];i++){
            //rows would be accessed using the "row" variable assigned in the for loop
            //Get each cell value/column from the row
            column1 = row.cells[0].innerText;
            column2 = row.cells[1].innerText;
            column3 = row.cells[2].innerText;
            column4 = row.cells[3].innerText;
            column5 = row.cells[4].innerText;

        /* add a new records in the array */
            rows.push(
                [
                    column1,
                    column2,
                    column3,
                    column4,
                    column5
                ]
            );

            }
            csvContent = "data:text/csv;charset=utf-8,";
             /* add the column delimiter as comma(,) and each row splitted by new line character (\n) */
            rows.forEach(function(rowArray){
                row = rowArray.join(",");
                csvContent += row + "\r\n";
            });

            /* create a hidden <a> DOM node and set its download attribute */
            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "List customers.csv");
            document.body.appendChild(link);
             /* download the data file named "Stock_Price_Report.csv" */
            link.click();
    }

    function Export() {
        html2canvas(document.getElementById('myTable'), {
            onrendered: function (canvas) {
                var data = canvas.toDataURL();
                var docDefinition = {
                    content: [{
                        image: data,
                        width: 500
                    }]
                };
                pdfMake.createPdf(docDefinition).download("Table.pdf");
            }
        });
    }

      //***********************Activer ou desactiver user********************
      var user = $(this).attr('data-user');
      $(document).on("change", ".activate_user", function() {

        var user = $(this).attr('data-user');
        var activate_user = $('.activate_user'+user).val();

        $.ajax({
            url: "/user/activate",
            type: "post",
            data: {
                "_token": "{{ csrf_token() }}",
                "user": user,
                "active": activate_user,
            },

            success: function (response) {
                if(response.status==1) {
                    $("#active"+user).html('Active');
                    $("#active"+user).attr("class", "badge badge-light-success");
                }if(response.rep==0) {
                    $("#active"+user).html('Innactive');
                    $("#active"+user).attr("class", "badge badge-light-warning");

                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
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

</script>
@endsection
