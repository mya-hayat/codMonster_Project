<div class="modal fade" id="modal-add-category" tabindex="-1" style="display: none;" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-600px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>New Category</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="currentColor"></rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->

            <div class="card card-flush py-4">
                <form id="add_category" action="" method="POST">
                    @csrf
                    <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required form-label">Category Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="category_name" id="category_name" class="form-control mb-2"
                                placeholder="category name" value="" required>
                            <!--end::Input-->
                            <!--begin::Description-->
                            <!--end::Description-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required form-label">Description</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea type="text" name="description" id="description" class="form-control mb-2"
                                placeholder="description" value="" required></textarea>
                            <!--end::Input-->
                            <!--begin::Description-->
                            <!--end::Description-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a  id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5" data-bs-dismiss="modal">Cancel</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="button" id="add_category_submit" class="btn btn-primary">
                                <span class="indicator-label">Save</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                         </div>

                    </div>

                </form>
                <!--end::Card header-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
