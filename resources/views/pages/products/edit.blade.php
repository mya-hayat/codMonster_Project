@extends('layouts.app')

@section('content')

<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div id="kt_content_container" class="container-xxl">
            {{-- <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
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
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted"> <a href="{{ route('product.update') }}"> Edit Products</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->

                </ul>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
            </div> --}}
            <!--begin::Form-->
            @if (\Session::has('message'))
            <div id="alert_add" class="alert alert-primary text-center">
                {!! \Session::get('message') !!}
                <span style="display: flex;float: right" onclick="close_alerte_add()" id="close" class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="green"></rect>
                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="green"></rect>
                    </svg>
                </span>
            </div>
            @endif
            <div class="row hide-message" id="message-success">
                <div class="alert alert-success text-center pt-7">
                    <span style="display: flex;float: right" onclick="close_alerte_edit()" id="close" class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="green"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="green"></rect>
                        </svg>
                    </span>
                    <p style="font-size: 15px;">
                        Successfully submitted!
                    </p>
                </div>
            </div>
            <form action="{{ route('product.update') }}" method="POST" id="kt_ecommerce_add_product_form"
                class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!--begin::Aside column-->
                <div class="col-12 d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Product Image</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            <div class="image-input image-input-empty image-input-outline mb-3"
                                data-kt-image-input="true"
                                style="background-image: url( {{ Storage::url(@$image->url) }} )">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-200px h-200px"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                    <input type="hidden" name="avatar_remove">
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg
                                image files are accepted</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Thumbnail settings-->
                    <!--begin::Status-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Status</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <div class="rounded-circle bg-success w-15px h-15px"
                                    id="kt_ecommerce_add_product_status"></div>
                            </div>
                            <!--begin::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Select2-->
                            <select class="form-select mb-2 select2-hidden-accessible" data-control="select2"
                                data-hide-search="true" data-placeholder="Select an option" reqiured
                                id="kt_ecommerce_add_product_status_select" name="status"
                                data-select2-id="select2-data-kt_ecommerce_add_product_status_select" tabindex="-1"
                                aria-hidden="true">
                                <option></option>
                                <option value="published" {{ ( @$product->status == 'published' )?'selected': '' }}
                                    data-select2-id="select2-data-11-06h3">
                                    Published
                                </option>
                                <option value="draft" {{ ( @$product->status == 'draft' )?'selected': '' }} >
                                    Draft
                                </option>
                            </select>
                            <!--end::Select2-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the product status.</div>
                            <!--end::Description-->
                            <!--begin::Datepicker-->
                            <div class="d-none mt-10">
                                <label for="kt_ecommerce_add_product_status_datepicker" class="form-label">Select
                                    publishing date and time</label>
                                <input class="form-control flatpickr-input"
                                    id="kt_ecommerce_add_product_status_datepicker" placeholder="Pick date &amp; time"
                                    type="text" readonly="readonly">
                            </div>
                            <!--end::Datepicker-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Status-->
                    <!--begin::Category & tags-->

                    <!--end::Category & tags-->
                </div>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="col-12 d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4  {{ @$activate != 1 ? 'active' : '' }} "
                                data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">General</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 {{ @$activate == 1 ? 'active' : '' }} "
                                data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">Advanced</a>
                        </li>
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade  {{ @$activate != 1 ? ' active  show ' : '' }}"
                            id="kt_ecommerce_add_product_general" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <!--begin::General options-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>General</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required form-label">Product Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="product_name" class="form-control mb-2"
                                                placeholder="Product name" value="{{ @$product->title }}">
                                            <input type="hidden" name="product_id" class="form-control mb-2"
                                                value="{{ @$product->id }}">
                                            <!--end::Input-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">A product name is required and recommended to
                                                be unique.</div>
                                            <!--end::Description-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required form-label">Slug</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="slug" class="form-control mb-2"
                                                placeholder="Product name" value="{{ @$product->slug }}">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div>
                                            <!--begin::Label-->
                                            <label class="form-label">Description</label>
                                            <!--end::Label-->
                                            <!--begin::Editor-->
                                            <textarea type="text" id="description" name="description"
                                                class="form-control mb-2" placeholder="Description"
                                                value="">{{ @$product->description }}</textarea>
                                            <!--end::Editor-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">Set a description to the product for better
                                                visibility.</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::General options-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>Product Details</h2>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <!--begin::Label-->
                                        <label class="form-label">Categories</label>
                                        <!--end::Label-->

                                        <!--begin::Select2-->
                                        <select class="form-select mb-2 select2-hidden-accessible" data-control="select2"
                                            data-placeholder="Select a category" tabindex="-1" name="category" required>
                                            <option></option>
                                            @foreach (@$categories as $category)
                                            <option value="{{ @$category->id }}" {{ ( @$product->categoryID == @$category->id
                                                )?'selected': '' }} >
                                                {{ @$category->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <!--end::Select2-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7 mb-7">Add product to a category.</div>
                                        <!--end::Description-->
                                        <!--end::Input group-->
                                        <!--begin::Button-->
                                        <a class=" addCategory btn btn-light-primary btn-sm mb-10">

                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none">
                                                    <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1"
                                                        transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                                    <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor"></rect>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Create new category
                                        </a>
                                        <!--end::Button-->
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                            </div>

                        </div>
                        <!--end::Tab pane-->
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade  {{ @$activate == 1 ? ' active show ' : '' }}"
                            id="kt_ecommerce_add_product_advanced" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <!--begin::General options-->
                                {{-- ************************* OPTION ********************************* --}}
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Option</h2>
                                        </div>
                                    </div>
                                    <!--begin::Card body-->
                                    <input type="hidden" name="id_product" id="id_product" value="{{ $product->id }}">
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        {{-- ******* btn add new option ****** --}}
                                        <div class="form-group mt-5 justify-content-right d-flex"
                                            style="justify-content: right;">
                                            <button type="button" onclick="newOption()" data-repeater-create=""
                                                class="btn btn-sm btn-light-primary">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1"
                                                            transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                                        <rect x="6" y="11" width="12" height="2" rx="1"
                                                            fill="currentColor"></rect>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Add another option
                                            </button>
                                        </div>
                                        <div class="mb-10 fv-row fv-plugins-icon-container flex-rd">
                                            {{-- ********** Option + value ************ --}}
                                            <!--begin::Label-->
                                            <label class="required form-label">Option name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" id="option" name="option" class="form-control mb-2"
                                                placeholder="option name" value="">
                                            <span onclick="disabledBtn()" class="btn btn-success">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row fv-plugins-icon-container flex-rd">
                                            <!--begin::Label-->
                                            <label class="required form-label">Value</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" id="myInput" name="value" class="form-control mb-2"
                                                placeholder="value" value="" disabled>
                                            <span onclick="newElement()" class="btn btn-success">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Input group-->
                                        {{-- ************* OPTIONS ********************* --}}
                                        <h5 style="text-align: left;margin-bottom: 5px;color: #1e439b;">
                                            My Options
                                        </h5>
                                        <div class="option-listed">
                                            @foreach ($option as $key => $value)
                                            <div class="option-listed-second" id="option-name-del-{{ $key }}">
                                                <a data-option="{{ $key }}" class="remove-opt-list">
                                                    <span>
                                                        &times;
                                                    </span>
                                                </a>
                                                <input class="form-control input-md" id="option-name" type="text"
                                                    value="{{ $key }}" placeholder="" disabled>
                                                <ul class="selected_option" id="selected_option_{{ $key }}">
                                                    @foreach ($value as $val)
                                                    <li id="{{ $val }}">
                                                        {{ $val }}
                                                        <a data-option="{{ $key }}" data-value="{{ $val }}"
                                                            class="remove-opt">
                                                            <span>
                                                                &times;
                                                            </span>
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endforeach
                                        </div>
                                        <!-- Table of options -->
                                        <div class="info-product">
                                            <h3>
                                                Variants
                                            </h3>

                                            <table class="table" id="variant-table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Option</th>
                                                        <th scope="col">Qty</th>
                                                        <th scope="col">Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach( @$variants as $key => $variant )
                                                    <tr class="variant_items">
                                                        <td class="title" data-id="{{  @$variant->id }}">
                                                            {{ @$variant->title }}
                                                        </td>
                                                        <td>
                                                            <input type="text" id="qty-{{  @$variant->id }}" name="qty"
                                                                class="form-control mb-2 qty"
                                                                placeholder="{{  @$variant->qty_stock }}"
                                                                value="{{  @$variant->qty_stock }}">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="price-{{  @$variant->id }}"
                                                                name="price" class="form-control mb-2 price"
                                                                placeholder="{{  @$variant->price }}"
                                                                value="{{  @$variant->price }}">
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <button class="btn btn-success" id="save_variant">
                                                    Save Variants
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-10">
                        <a href="{{ route('product') }}" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-light me-5">Cancel</a>
                        <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </div>

            </form>

        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->

    {{--  <div class="swal2-container swal2-center" id="popup-success">
        <div aria-labelledby="swal2-title" aria-describedby="swal2-html-container"
            class="swal2-popup swal2-modal swal2-icon-success" tabindex="-1" role="dialog"
            aria-live="assertive" aria-modal="true">

            <div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;">
                <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
                <div class="swal2-success-ring"></div>
                <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
            </div>

            <div class="swal2-html-container" id="swal2-html-container" style="display: block;">
                Successfully submitted!
            </div>

            <div class="swal2-actions" style="display: flex;">
                <div class="swal2-loader"></div>
                <button type="button" class="swal2-confirm btn btn-primary" aria-label="" style="display: inline-block;">
                    Ok, got it!
                </button>
            </div>
            <div class="swal2-timer-progress-bar-container">
            </div>
        </div>
    </div>  --}}


    @include('pages.products.add-category')
    @endsection


    @section('scripts')
    <script>
        //*******************************ADD CATEGORY ***************************************
        // OPEN POPUP
        $('.addCategory').on('click', function(evt) {
            $('#modal-add-category').modal('toggle');
            $('#modal-add-category').modal('show');
            $('#modal-add-category').modal('hide');
        });
        //CLOSE POPUP
        $('.close-addStore').click(function(evt) {
            $('#modal-add-category').modal('toggle');
            $('#modal-add-category').modal('hide');
        });
        //******************************ADD CATEGORY ***************************************
        $('#save_variant').on('click', function(e) {
            e.preventDefault();
            console.log('fd')
            var array = [];
            $('.variant_items').each(function(index, tr) {
                array.push({
                    'id': $(this).find('.title').attr('data-id'),
                    'price': $(this).find('.price').val(),
                    'qty': $(this).find('.qty').val(),
                });
            });
            var id_product = $('#id_product').val();
            $.ajax({
                url: "/variant/update/all",
                type: "post",
                data: {
                    "_token"    : "{{ csrf_token() }}",
                    "variant"        : JSON.stringify(array),
                    "id_product": id_product,
                },
                success: function(response) {
                    console.log('fekf')
                    if(response.status == 1) {
                        $('#message-success').removeClass('hide-message');
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });

        $('#add_category_submit').on('click', function(evt) {
            console.log('eeeee')
            var form = $('#add_category')[0];
            form = new FormData(form);
            form.append('add', 'category');
            $.ajax({
                url: "/category/add",
                type: 'POST',
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('script tag error');
                },
                beforeSend: function() {
                    $('#add_category')[0].reset();
                },
                success: function(response) {
                    if (response.status == 1) {
                        $('#category').append(
                            `
                            <option value="${response.category_id}">${response.category_name}</option>
                        `
                        );
                    }
                    $('#modal-add-category').modal('toggle');
                    $('#modal-add-category').modal('hide');
                }
            });
        });
        //****************************** ADD OPTION *************************************
        // ** Disabled Input
        function disabledBtn() {
            var champ = document.getElementById("option").value;
            if (champ == "") {
                document.getElementById("myInput").disabled = true;
            } else {
                document.getElementById("myInput").disabled = false;
                document.getElementById("myInput").focus();
            }
            console.log('disbklae')
            var option = $('#option').val();
            var id_product = $('#id_product').val();
            console.log('dd')
            $.ajax({
                url: "/option",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "option": option,
                    "id_product": id_product,
                },
                success: function(response) {
                    if (response['status'] == 1) {
                        $('.option-listed').append(`
                            <div class="option-listed-second" id="option-name-del-${option}">
                                <a data-option="${option}" class="remove-opt-list">
                                    <span>
                                        &times;
                                    </span>
                                </a>
                                <input class="form-control input-md" id="option-name" type="text" value="${option}" placeholder="" disabled>
                                <ul class="selected_option" id="selected_option_${option}">

                                </ul>
                            </div>

                        `);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }
        // ************************* ADD OPTION VALUE *****************************
        function newElement() {
            var li = document.createElement("li");
            var inputValue = document.getElementById("myInput").value;
            var t = document.createTextNode(inputValue);
            li.appendChild(t);
            if (inputValue === '') {
                alert("You must write something!");
            }
            var span = document.createElement("SPAN");
            var txt = document.createTextNode("\u00D7");
            span.className = "close";
            for (i = 0; i < close.length; i++) {
                close[i].onclick = function() {
                    var div = this.parentElement;
                    div.style.display = "none";
                }
            }
            var option = $('#option').val();
            var id_product = $('#id_product').val();
            $.ajax({
                url: "/option/add/value",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "option": option,
                    "id_product": id_product,
                    "value": inputValue,
                },
                success: function(response) {
                    document.getElementById("myInput").value = "";
                    $('#selected_option_' + option).append(`
                        <li id="${inputValue}">
                            ${inputValue}
                            <a data-option="${option}"  data-value="${inputValue}" class="remove-opt">
                                <span>
                                    &times;
                                </span>
                            </a>
                        </li>
                    `);
                    if( response['variant'] ) {
                        let html = "";
                        $.each(response['variant'], function (i, item) {
                            html += `
                                <tr class="variant_items" id="product-${item['id']}">
                                    <td class="title" data-id="${item['id']}">${item['title']}</td>
                                    <td>
                                        <input class="form-control input-md qty" placeholder="Quantity" type="text" value="${item['qty_stock']}">
                                    </td>
                                    <td>
                                        <input class="form-control input-md price" placeholder="Price" type="text" value="${item['price']}">
                                    </td>
                                </tr>
                            `
                        });
                        $('#variant-table > tbody').html(html);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }

        function newOption() {
            var option_name = document.getElementById("option").value;
            document.getElementById("myInput").value = "";
            document.getElementById("option").value = "";
            document.getElementById("option-name").value = option_name;
            disabledBtn();
        }
        //******************** DELETE OPTION VALUE ***************************
        $(document).on("click", ".save-variant", function() {
            console.log('eeee')
            var id          = $(this).attr('data-id');
            console.log(id)
            var price       = $('#price-'+id).val();
            var qty         = $('#qty-'+id).val();
            console.log(price)
            $.ajax({
                url: "/variant/update",
                type: "post",
                data: {
                    "_token"    : "{{ csrf_token() }}",
                    "id"        : id,
                    "price"     : price,
                    "qty"       : qty,
                },
                success: function(response) {
                    if (response['status'] == 1) {
                        $('#' + response['remove']).hide();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
        //******************** DELETE OPTION VALUE ***************************
        $(document).on("click", ".remove-opt", function() {
            console.log($(".remove-opt").attr('data-value'));
            var inputValue = $(this).attr('data-value');
            var option = $(this).attr('data-option');
            var id_product = $('#id_product').val();
            $.ajax({
                url: "/option/delete/value",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "option": option,
                    "id_product": id_product,
                    "value": inputValue,
                },
                success: function(response) {
                    if (response['status'] == 1) {
                        $('#' + response['remove']).hide();
                        if( response['variant'] ) {
                            let html = "";
                            $.each(response['variant'], function (i, item) {
                                html += `
                                    <tr class="variant_items" id="product-${item['id']}">
                                        <td class="title" data-id="${item['id']}">${item['title']}</td>
                                        <td>
                                            <input class="form-control input-md qty" placeholder="Quantity" type="text" value="${item['qty_stock']}">
                                        </td>
                                        <td>
                                            <input class="form-control input-md price" placeholder="Price" type="text" value="${item['price']}">
                                        </td>
                                    </tr>
                                `
                            });
                            $('#variant-table > tbody').html(html);
                        }
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
        // *********************** DELETE LIST OPTION ************************
        $(document).on("click", ".remove-opt-list", function() {
            var option = $(this).attr('data-option');
            var id_product = $('#id_product').val();
            console.log('rere')
            $.ajax({
                url: "/option/delete/listOption",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "option": option,
                    "id_product": id_product
                },
                success: function(response) {
                    if (response['status'] == 1) {
                        $('#option-name-del-' + option).remove();
                        if( response['variant'] ) {
                            let html = "";
                            $.each(response['variant'], function (i, item) {
                                html += `
                                    <tr class="variant_items" id="product-${item['id']}">
                                        <td class="title" data-id="${item['id']}">${item['title']}</td>
                                        <td>
                                            <input class="form-control input-md qty" placeholder="Quantity" type="text" value="${item['qty_stock']}">
                                        </td>
                                        <td>
                                            <input class="form-control input-md price" placeholder="Price" type="text" value="${item['price']}">
                                        </td>
                                    </tr>
                                `
                            });
                            $('#variant-table > tbody').html(html);
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
            document.getElementById('message-success').style.display = 'none';
       }
    </script>
    @endsection
