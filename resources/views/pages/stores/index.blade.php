@extends('layouts.app')
@section('content')

<!--begin::Main-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::stores-->
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
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

                    <!--begin::Add store-->
                    <a class="addStore btn btn-primary">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"></rect>
                            </svg>
                        </span>
                        Add Store</a>

                    <!--end::Add store-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <div id="kt_ecommerce_stores_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">

                        @if (\Session::has('message'))
                        <div id="alert_add" class="alert alert-success text-center">
                            <span style="display: flex;float: right" onclick="close_alerte_add()" id="close" class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="green"></rect>
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="green"></rect>
                                </svg>
                            </span>
                            {!! \Session::get('message') !!}
                        </div>
                        @endif

                        @if (\Session::has('message_err'))
                        <div id="alert_delete" class="alert alert-danger text-center">
                            {!! \Session::get('message_err') !!}
                            <span style="display: flex;float: right" onclick="close_alerte_delete()" id="close" class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="blue"></rect>
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="blue"></rect>
                                </svg>
                            </span>
                        </div>
                        @endif

                        @if (\Session::has('message_edit'))
                        <div id="alert_edit" class="alert alert-primary text-center">
                            <span style="display: flex;float: right" onclick="close_alerte_edit()" id="close" class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="blue"></rect>
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="blue"></rect>
                                </svg>
                            </span>
                            {!! \Session::get('message_edit') !!}
                        </div>
                        @endif

                        <table id='myTable' class="order-table table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                            id="kt_ecommerce_stores_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->

                                <th class="min-w-70px sorting" tabindex="0" aria-controls="kt_ecommerce_stores_table"
                                    rowspan="1" colspan="1" aria-label="Store: activate to sort column ascending"
                                    style="width: 60px;">Store</th>
                                <th class="text-end min-w-70px sorting" tabindex="0"
                                    aria-controls="kt_ecommerce_stores_table" rowspan="1" colspan="1"
                                    aria-label="Domain: activate to sort column ascending" style="width: 60px;">
                                    Domain</th>
                                <th class="text-end min-w-70px sorting" tabindex="0"
                                    aria-controls="kt_ecommerce_stores_table" rowspan="1" colspan="1"
                                    aria-label="Country_Name: activate to sort column ascending"
                                    style="width: 60px;">Country Name</th>
                                <th class="text-end min-w-70px sorting" tabindex="0"
                                    aria-controls="kt_ecommerce_stores_table" rowspan="1" colspan="1"
                                    aria-label="Currency: activate to sort column ascending" style="width: 60px;">
                                    Currency</th>
                                <th class="text-end min-w-70px sorting" tabindex="0"
                                    aria-controls="kt_ecommerce_stores_table" rowspan="1" colspan="1"
                                    aria-label="Currency: activate to sort column ascending" style="width: 60px;">
                                    Activate</th>
                                <th class="text-end min-w-70px sorting" tabindex="0"
                                    aria-controls="kt_ecommerce_stores_table" rowspan="1" colspan="1"
                                    aria-label="Currency: activate to sort column ascending" style="width: 60px;">
                                    Connect</th>
                                <th class="text-end min-w-70px sorting" tabindex="0"
                                    aria-controls="kt_ecommerce_stores_table" rowspan="1" colspan="1"
                                    aria-label="Currency: activate to sort column ascending" style="width: 60px;">
                                    Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>

                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                            @if(count($stores) > 0)
                                @foreach (@$stores as $store)
                                <tr>
                                    <td>
                                        <span class="fw-bolder">{{ $store->name }}</span>
                                    </td>
                                    <td class="text-end pe-0">
                                       <a href="{{ route('landing.page') }}"> <span class="fw-bolder">{{ $store->domain }}</span> </a>
                                    </td>
                                    <td class="text-end pe-0">
                                        <span class="fw-bolder">{{ $store->country_name }}</span>
                                    </td>

                                    <td class="text-end pe-0">
                                        <span class="badge badge-light-success">{{$store->currency}}</span>
                                    </td>

                                    <td class="text-end pe-0">
                                        <div class="form-check form-check-solid form-switch fv-row" style="margin-left: 70%">

                                            <input
                                                class="form-check-input w-45px h-30px isActive"
                                                type="checkbox" id="isActive{{@$store->id}}"
                                                data-store="{{@$store->id}}"
                                                name="isActive"
                                                {{ ($store->status == 'Active')?' checked': '' }}
                                                >
                                            <label class="form-check-label" for="isActive"></label>

                                        </div>
                                    </td>

                                    <td class="text-end pe-0">
                                        <button
                                            class="btn btn-light-primary btn-connected"
                                            id="btn_connect{{@$store->id}}"
                                            {{ ($store->status == 'Active')?' ': ' disabled' }}
                                            data-store="{{@$store->id}}" >
                                            <a href="{{ route('store.connected', ['id' => $store->id]) }}" >
                                                <i class="fa-solid fa-link" ></i>
                                            </a>
                                        </button>
                                    </td>

                                    <td class="text-end" id="actions">
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
                                        </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                            data-kt-menu="true">

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-10">
                                                <a class="editStore menu-link" data-store="{{ $store->id }}">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-10">
                                                <a class="deleteStore menu-link px-3" data-name="{{ $store->name }}"
                                                    data-store="{{ $store->id }}">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <th colspan="3" class="text-center">No data found</th>
        =                            </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @include('pages.stores.add')
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
        <!--end::stores-->
        </div>
    <!--end::Container-->
    </div>
</div>


@include('pages.stores.delete')
@include('pages.stores.edit')
@endsection

@section('scripts')

<script>
$(document).ready(function(){

//***************************************************
//    POPUP DELETE STORE
//***************************************************
$('.deleteStore').on('click', function(e) {
    let id = $(this).attr('data-store');
    let name = $(this).attr('data-name');

    $('#id_store').val(id);
    $('#title_confirm').text('Are you sure you want to delete '+name+ ' ?');

    // OPEN POPUP
    $('#modalDeleteStore').modal('toggle');
    $('#modalDeleteStore').modal('show');
    $('#modalDeleteStore').modal('hide');

    //CLOSE POPUP
    $('.close-deleteStore').click(function(evt){
        $('#modalDeleteStore').modal('toggle');
        $('#modalDeleteStore').modal('hide');
    });
});


// ***********************************************
//     POPUP ADD STORE
// ************************************************
  //OPEN POPUP
$('.addStore').on('click', function(evt) {
    $('#modalAddStore').modal('toggle');
    $('#modalAddStore').modal('show');
    $('#modalAddStore').modal('hide');
});

  //CLOSE POPUP
$('.close-addStore').click(function(evt){
    $('#modalAddStore').modal('toggle');
    $('#modalAddStore').modal('hide');
});



//*************************************************************
//   POPUP EDIT STORE
//************************************************************
$('.editStore').on('click', function(evt) {
    let id = $(this).attr('data-store');
    console.log(id )
    $('#id_update').val(id);
    $.ajax({
        url: "/store/edit",
        type: "post",
        data: {
            "_token": "{{ csrf_token() }}",
            "id": id
        },
        success: function (response) {
            $('#domain').val(response["data"]['domain']);
            $('#name').val(response["data"]['name']);
            $('#country_name_edit').val(response["data"]['country_name']);
            $('#country_code_edit').val(response["data"]['country_code']);
            $('#currency_edit').val(response["data"]['currency']);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });

    $('#modalEditStore').modal('toggle');
    $('#modalEditStore').modal('show');
    $('#modalEditStore').modal('hide');

});

$('.close-edit').click(function(evt){
    $('#modalEditStore').modal('toggle');
    $('#modalEditStore').modal('hide');
});


// ********************************************
//    Country name + code + currency
//*********************************************
//******** COUNTRY NAME **********************//
var cod = "+MA";
$('#country_code').val(cod);
var selection = document.getElementById("country_name");
selection.onchange = function(event){
var code = event.target.options[event.target.selectedIndex].dataset.code;
$('#country_code').val(code);
};

//********* CURRENCY SCRIPT *******************//
var curr = "MAD";
$('#currency').val(curr);
$('#country_name').change(function(){
    var curr = $(this).children('option:selected').data('id');
    $('#currency').val(curr);
});


//*********** edit *************
var selection = document.getElementById("country_name_edit");
selection.onchange = function(event){
var code = event.target.options[event.target.selectedIndex].dataset.code;
$('#country_code_edit').val(code);
};

$('#country_name_edit').change(function(){
    var curr = $(this).children('option:selected').data('id');
    $('#currency_edit').val(curr);
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

//*******************************FILTER TABLE *****************************************************

(function(document) {
	'use strict';

	var LightTableFilter = (function(Arr) {

		var _input;
    var _select;

		function _onInputEvent(e) {
			_input = e.target;
			var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
			Arr.forEach.call(tables, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, _filter);
				});
			});
		}

		function _onSelectEvent(e) {
			_select = e.target;
			var tables = document.getElementsByClassName(_select.getAttribute('data-table'));
			Arr.forEach.call(tables, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, _filterSelect);
				});
			});
		}

		function _filter(row) {

			var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';

		}

		function _filterSelect(row) {

			var text_select = row.textContent.toLowerCase(), val_select = _select.options[_select.selectedIndex].value.toLowerCase();
			row.style.display = text_select.indexOf(val_select) === -1 ? 'none' : 'table-row';

		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('light-table-filter');
				var selects = document.getElementsByClassName('select-table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = _onInputEvent;
				});
				Arr.forEach.call(selects, function(select) {
         select.onchange  = _onSelectEvent;
				});
			}
		};
	})(Array.prototype);

	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
			LightTableFilter.init();
		}
	});



});

// *********************** Store Activation ********************

    $(document).on("change", ".isActive", function() {
        var isactive = false;
        var store = $(this).attr('data-store');
        if( $(this).is(':checked') ){
            isactive = true;
        } else {
            isactive = false;
        }

        $.ajax({
            url: "/store/activate",
            type: "post",
            data: {
                "_token": "{{ csrf_token() }}",
                "store": store,
                "isactive": isactive
            },
            success: function (response) {
                console.log(response.isactive)
                console.log(response.status)
                console.log(response.store)
                if(response.status==1) {
                    if(response.isactive == "Active") {
                        $('#btn_connect'+response.store).prop('disabled', false);
                    } else {
                        $('#btn_connect'+response.store).prop('disabled', true);
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });

    });

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
