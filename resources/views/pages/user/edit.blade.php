@extends('layouts.app')

@section('content')

@include('pages.user.navbar')
<div class="content d-flex flex-column flex-column-fluid" style class="header align-items-stretch">

    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true"
            aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">Profile Details</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            <form action="{{ route('user.update') }}" method="POST"
                class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    @if (\Session::has('message'))
                    <div class="alert alert-success text-center">
                        {!! \Session::get('message') !!}
                    </div>
                    @endif
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">Image</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Image input-->
                            <div class="image-input image-input-outline" data-kt-image-input="true"
                                style="background-image: url('/metronic8/demo1/assets/media/svg/avatars/blank.svg')">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-125px h-125px"
                                    style="background-image: url( {{ Storage::url($user -> profil_img) }} )"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="profil_images" accept=".png, .jpg, .jpeg">
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
                            <!--begin::Hint-->
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            <!--end::Hint-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span>Full name</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="text" id="name" name="name"
                                class="form-control form-control-lg form-control-solid" placeholder="Full name"
                                value="{{ $user -> name }}">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span>Contact Phone</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Phone number must be active"
                                aria-label="Phone number must be active"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="tel" id="phone" name="phone"
                                class="form-control form-control-lg form-control-solid" placeholder="Phone number"
                                value="{{ $user -> phone }}">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    {{--
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span>Email</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="This email must be active"
                                aria-label="This email must be active"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="email" id="email" name="email"
                                class="form-control form-control-lg form-control-solid" placeholder="Email"
                                value="{{ $user -> email }}" disabled="disabled>
                        <div class=" fv-plugins-message-container invalid-feedback">
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group--> --}}

        </div>
        <!--end::Card body-->
        <!--begin::Actions-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
            <button type="submit" class="btn btn-primary">Save
                Changes</button>
        </div>
        <!--end::Actions-->
        <input type="hidden">
        <div></div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>




<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
        data-bs-target="#kt_account_signin_method">
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">Sign-in Method</h3>
        </div>
    </div>
    <!--end::Card header-->
    {{-- ********************** EDIT EMAIL ********************************* --}}
    <!--begin::Content-->
    <div id="kt_account_settings_signin_method" class="collapse show">
        <!--begin::Card body-->
        <div class="card-body border-top p-9">
            @if (\Session::has('message_email'))
            <div class="alert alert-danger text-center">
                {!! \Session::get('message_email') !!}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!--begin::Email Address-->
            <div class="d-flex flex-wrap align-items-center">
                <!--begin::Label-->
                <div id="kt_signin_email">
                    <div class="fs-6 fw-bolder mb-1">Email Address</div>
                    <div class="fw-bold text-gray-600">{{ $user -> email }}</div>
                </div>
                <!--end::Label-->
                <!--begin::Edit-->
                <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                    <!--begin::Form-->
                    <form action="{{ route('user.updateMail') }}" method="POST" id="kt_signin_change_email"
                        class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                        @csrf
                        @method('PUT')
                        <div class="row mb-6">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3">Enter New Email
                                        Address</label>
                                    <input type="email" id="emailaddress" name="emailaddress"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Email Address" name="emailaddress" value="{{ $user->email }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="confirmemailpassword" class="form-label fs-6 fw-bolder mb-3">Enter your
                                        Password</label>
                                    <input type="password" name="confirmemailpassword" id="confirmemailpassword"
                                        class="form-control form-control-lg form-control-solid">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2 px-6">Update Email</button>
                            <button id="kt_signin_cancel" type="button"
                                class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                        </div>
                        <div></div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Edit-->
                <!--begin::Action-->
                <div id="kt_signin_email_button" class="ms-auto">
                    <button class="btn btn-light btn-active-light-primary">Change Email</button>
                </div>
                <!--end::Action-->
            </div>
            <!--end::Email Address-->
            <!--begin::Separator-->
            <div class="separator separator-dashed my-6"></div>
            <!--end::Separator-->
            <!--begin::Password-->
            <div class="d-flex flex-wrap align-items-center mb-10">
                <!--begin::Label-->
                <div id="kt_signin_password">
                    <div class="fs-6 fw-bolder mb-1">Password</div>
                    <div class="fw-bold text-gray-600">************</div>
                </div>
                <!--end::Label-->
                {{-- ************************* RESET PASSWORD *************************** --}}
                <!--begin::Edit-->
                <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                    <!--begin::Form-->
                    <form action="{{  route('user.updatePassword') }}" method="POST" id="kt_signin_change_password"
                        class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                        @csrf
                        @method('PUT')
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">Current
                                        Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid"
                                        name="currentpassword" id="currentpassword">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="newpassword" class="form-label fs-6 fw-bolder mb-3">New Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid"
                                        name="newpassword" id="newpassword">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="confirmpassword" class="form-label fs-6 fw-bolder mb-3">Confirm New
                                        Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid"
                                        name="confirmpassword" id="confirmpassword">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2 px-6">Update
                                Password</button>
                            <button id="kt_password_cancel" type="button"
                                class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                        </div>
                        <div></div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Edit-->
                <!--begin::Action-->
                <div id="kt_signin_password_button" class="ms-auto">
                    <button class="btn btn-light btn-active-light-primary" onClick="editPassword()">Reset
                        Password</button>
                </div>
                <!--end::Action-->
            </div>
            <!--end::Password-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Content-->
</div>



@if ($user->permissionID == 2)

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_deactivate" aria-expanded="true" aria-controls="kt_account_deactivate">
            <div class="card-body border-top p-9">
                @if (\Session::has('message_error'))
                <div class="alert alert-danger text-center">
                    {!! \Session::get('message_error') !!}
                </div>
                @endif
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Desactivate Account</h3>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Content-->
            <div id="kt_account_settings_deactivate" class="collapse show">
                <!--begin::Form-->
                <form
                    class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <!--begin::Notice-->
                        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
                                    <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)"
                                        fill="currentColor"></rect>
                                    <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)"
                                        fill="currentColor"></rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1">
                                <!--begin::Content-->
                                <div class="fw-bold">
                                    <h4 class="text-gray-900 fw-bolder">You Are Desactivating Your Account</h4>
                                    <div class="fs-6 text-gray-700">For extra security, this requires you to confirm your email
                                        or phone number when you reset yousignr password.
                                        <br>
                                        <a class="fw-bolder" href="#">Learn more</a>
                                    </div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                        <!--begin::Form input row-->
                        <div class="form-check form-check-solid fv-row fv-plugins-icon-container">
                            <input name="deactivate" class="form-check-input" type="checkbox" value="{{ $user->id }}"
                                id="deactivate">
                            <label class="form-check-label fw-bold ps-2 fs-6" for="deactivate">I confirm my account
                                desactivation</label>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Form input row-->
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        {{-- <button id="kt_account_deactivate_account_submit" class="btn btn-danger fw-bold">Desactivate
                            Account</button> --}}
                        {{-- <button type="submit">save</button> --}}
                        <a class="desactivate_user menu-link px-3 btn btn-danger fw-bold" data-user="{{ $user->id }}">
                            Deactivate Account
                        </a>
                    </div>
                    <!--end::Card footer-->
                    <input type="hidden">
                    <div></div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
    </div>
@endif

</div>



<div class="modal fade" tabindex="-1" id="desactivateModal" style="margin-top: 10%">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog"
                aria-modal="true" style="display: grid;left: 10%">
                <button type="button" class="swal2-close" aria-label="Close this dialog"
                    style="display: none;">×</button>
                <ul class="swal2-progress-steps" style="display: none;"></ul>
                <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
                    <div class="swal2-icon-content">!</div>
                </div><img class="swal2-image" style="display: none;">
                <h2 class="swal2-title" id="swal2-title" style="display: none;"></h2>
                <div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you would like to
                    desactivate your account?</div><input class="swal2-input" style="display: none;"><input type="file"
                    class="swal2-file" style="display: none;">
                <div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select
                    class="swal2-select" style="display: none;"></select>
                <div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox"
                    style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea
                    class="swal2-textarea" style="display: none;"></textarea>
                <div class="swal2-validation-message" id="swal2-validation-message" style="display: none;"></div>
                <div class="swal2-actions" style="display: flex;">
                    <div class="swal2-loader"></div>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <form action="{{ route('user.remove') }}"  method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="" id="id_user">
                        <input type="submit" value="Yes, desactivate!" class="swal2-confirm btn fw-bold btn-primary" style="display: inline-block;">
                    </form>
                </div>
                <div class="swal2-footer" style="display: none;"></div>
                <div class="swal2-timer-progress-bar-container">
                    <div class="swal2-timer-progress-bar" style="display: none;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>

    {{--  $('#deasctivate').on('click', function(e) {
        e.preventDefault();
        console.log("tvgvg");

    });  --}}

    $('.desactivate_user').on('click', function(e) {
        let id = $(this).attr('data-user');

        $('#id_user').val(id);

        // OPEN POPUP
        $('#desactivateModal').modal('toggle');
        $('#desactivateModal').modal('show');
        $('#desactivateModal').modal('hide');

        //CLOSE POPUP
        $('.close-deleteStore').click(function(evt){
            $('#desactivateModal').modal('toggle');
            $('#desactivateModal').modal('hide');
        });
    });





</script>

@endsection
