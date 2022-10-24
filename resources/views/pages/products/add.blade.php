@extends('layouts.app')

@section('content')

<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->

    <div id="kt_content_container" class="container-xxl">
        <div id="kt_content_container" class="container-xxl">
            @if (\Session::has('messageCat'))
            <div id="alert_add" class="alert alert-danger text-center">
                {!! \Session::get('messageCat') !!}
                <span style="display: flex;float: right" onclick="close_alerte_add()" id="close" class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="red"></rect>
                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="red"></rect>
                    </svg>
                </span>
            </div>
            @endif
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
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted"> <a href="{{ route('product.add.view') }}"> Add Products</a></li>
                <!--end::Item-->
                <!--begin::Item-->

            </ul>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->
        </div>  --}}

        <!--begin::Form-->
        <form action="{{ route('product.add') }}" method="POST" id="kt_ecommerce_add_product_form"
            class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework"
            data-kt-redirect="/metronic8/demo1/../demo1/apps/ecommerce/catalog/products.html" enctype="multipart/form-data">
            @csrf
            <!--begin::Aside column-->
            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10"
                data-select2-id="select2-data-133-xg76">
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
                        <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
                            style="background-image: url( {{ Storage::url('/images/galerie-dimages.png') }} )">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-150px h-150px"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Change image">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg" required>
                                <input type="hidden" name="avatar_remove">
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">Set the product image. Only *.png, *.jpg and *.jpeg image files are
                            accepted
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--begin::Status-->
                <div class="card card-flush py-4" data-select2-id="select2-data-132-b5bw">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>Status</h2>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status">
                            </div>
                        </div>
                        <!--begin::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0" data-select2-id="select2-data-131-pi80">
                        <!--begin::Select2-->
                        <select class="form-select mb-2 select2-hidden-accessible" data-control="select2"
                            data-hide-search="true" data-placeholder="Select an option" id="status" name="status"
                            data-select2-id="select2-data-kt_ecommerce_add_product_status_select" tabindex="-1"
                            aria-hidden="true">
                            <option data-select2-id="select2-data-137-rp3y"></option>
                            <option value="published" selected="selected" data-select2-id="select2-data-11-g2j9">
                                Published</option>
                            <option value="draft" data-select2-id="select2-data-138-7me8">Draft</option>
                        </select>
                        <!--end::Select2-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">
                            Set the product status
                        </div>
                        <!--end::Description-->
                        <!--begin::Datepicker-->
                        <div class="d-none mt-10">
                            <label for="kt_ecommerce_add_product_status_datepicker" class="form-label">Select
                                publishing date and time</label>
                            <input class="form-control flatpickr-input" id="kt_ecommerce_add_product_status_datepicker"
                                placeholder="Pick date &amp; time" type="text" readonly="readonly" required>
                        </div>
                        <!--end::Datepicker-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Status-->
                {{-- ***************** end :: STATUS ******************** --}}
                <!--begin::Category & tags-->

                <!--end::Category & tags-->
            </div>
            <!--end::Aside column-->
            <!--begin::Main column-->
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <!--end:::Tabs-->
                <!--begin::Tab content-->
                <div class="tab-content">
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade active show" id="kt_ecommerce_add_product_general" role="tab-panel">
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
                                        <input type="text" id="product_name" name="product_name" class="form-control mb-2"
                                            placeholder="Product name" value="" required>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">A product name is required and recommended to be
                                            unique.
                                        </div>
                                        <!--end::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>


                                    <div class="mb-10 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required form-label">Slug</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" id="slug" name="slug" class="form-control mb-2"
                                            placeholder="Slug" value="" required>
                                        <!--end::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>

                                    <div class="mb-10 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required form-label">Description</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea type="text" id="description" name="description" class="form-control mb-2"
                                            placeholder="Description" value="" required></textarea>
                                        <!--end::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
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
                                {{-- *********************** begin :: CATEGORY ************************ --}}
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <label class="form-label">Categories</label>
                                    <select id="category" name="category" class="form-select mb-2 select2-hidden-accessible"
                                        data-control="select2" data-placeholder="Select Category" tabindex="-1" aria-hidden="true">
                                        <option></option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="text-muted fs-7 mb-7">
                                        Add product to a category.
                                    </div>

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
                                </div>
                                <!--end::Card body-->
                                {{-- ***************** end :: CATEGORY ******************** --}}
                            </div>
                        </div>
                    </div>
                    <!--end::Tab pane-->
                </div>
                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <a href="{{ route('product') }}" id="kt_ecommerce_add_product_cancel"
                        class="btn btn-light me-5">Cancel</a>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                        <span class="indicator-label">Save</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
            </div>
        </form>
    </div>
    <!--end::Form-->
</div>
<!--end::Container-->


@include('pages.products.add-category')


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
</script>
@endsection
@endsection
