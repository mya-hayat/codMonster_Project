
<div class="modal fade" id="modalEditcategory" tabindex="-1" style="display: none;" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-600px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Edit Category</h2>
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
            <div class="modal-body py-lg-10 px-lg-10">
                <form  action="{{ route('category.update') }}" method="POST" class="form"  >
                    @csrf
                    @method('PUT')

                    <div class="card card-flush py-4">
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <input type="hidden" name="id_update_cat" value="" id="id_update_cat">
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <!--begin::Label name-->
                                <label class="required form-label">Category Name</label>
                                <!--end::Label name-->
                              <!--begin::Input name-->
                                <input type="text" id="name_edit" name="name_edit" class="form-control mb-2" placeholder="Category name" value=""  required>
                                <!--end::Input name-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                            <!--end::Input group-->

                             <!--begin::Input group-->
                             <div class="mb-10 fv-row fv-plugins-icon-container">
                                <!--begin::Label domain-->
                                <label class="required form-label">Description</label>
                                <textarea type="text" id="description_edit" name="description_edit" class="form-control mb-2" placeholder="Description" value="" required=""></textarea>
                                <!--end::Input domain-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                                <!--end::input country_name-->


                    <div class="d-flex justify-content-end">
                       <!--begin::Button-->
                       <a  id="cancel_btn" class="btn btn-light me-5">Cancel</a>
                       <!--end::Button-->
                       <!--begin::Button-->
                       <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                           <span class="indicator-label">Save changes</span>
                           <span class="indicator-progress">Please wait...
                           <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                       </button>
                       <!--end::Button-->
                </form>

            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>

