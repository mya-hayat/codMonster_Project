

<div class="modal fade delete" id="modalDeleteStore" tabindex="-1" style="display: none;" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-400px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <div aria-labelledby="swal2-title" aria-describedby="swal2-html-container" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: grid;">
                <a class="swal2-close close-deleteStore">&times;</a>
                <ul class="swal2-progress-steps" style="display: none;"></ul>
                <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
                    <div class="swal2-icon-content">!</div>
                </div>
                <img class="swal2-image" style="display: none;">
                <h2 class="swal2-title" id="swal2-title" style="display: none;"></h2>
                <div class="swal2-html-container" id="swal2-html-container" style="display: block;">
                    <div class="modal-body">
                        <p id="title_confirm">Are you sure you want to delete category ...?</p>
                    </div>
                </div>
                    <input class="swal2-input" style="display: none;">
                    <input type="file" class="swal2-file" style="display: none;">
                <div class="swal2-range" style="display: none;">
                    <input type="range">
                    <output></output>
                </div>
                <select class="swal2-select" style="display: none;"></select>
                <div class="swal2-radio" style="display: none;"></div>
                <label for="swal2-checkbox" class="swal2-checkbox" style="display: none;">
                    <input type="checkbox">
                    <span class="swal2-label"></span>
                </label>
                <textarea class="swal2-textarea" style="display: none;"></textarea>
                <div class="swal2-validation-message" id="swal2-validation-message" style="display: none;"></div>
                <div class="swal2-actions" style="display: flex;">
                    <div class="swal2-loader"></div>
                    <form action="{{ route('category.remove') }}"  method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="" id="id_category">
                        <input type="submit" value="Yes, delete!" class="swal2-confirm btn fw-bold btn-danger" style="display: inline-block;">
                    </form>
                    <button type="button" class="swal2-deny" aria-label="" style="display: none;">No</button>
                    <button type="button"class="swal2-cancel close-deleteStore btn fw-bold btn-active-light-primary" aria-label="" style="display: inline-block;">No, cancel</button>
                </div>
                <div class="swal2-footer" style="display: none;"></div>
                <div class="swal2-timer-progress-bar-container">
                    <div class="swal2-timer-progress-bar" style="display: none;"></div>
                </div>
            </div>
        </div>
        <!--end::Modal body-->
    </div>
    <!--end::Modal content-->
</div>
<!--end::Modal dialog-->
