@extends('layouts.app')
@section('content')
<div id="kt_content_container" class="container-xxl">

    <div class="products">
        <div class="row">
            <div class="col-12 col-md-6">
                @if (\Session::has('message_form'))
                <div class="alert alert-success text-center">
                    {!! \Session::get('message_form') !!}
                    <a href="{{ route('settings.script') }}">Click here to find <b>your script</b></a>
                </div>
                @endif
                <div class="settings-input">
                    <form class="row g-3" action="{{ route('settings.add') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="col-md-12">
                            <label for="title_form" class="form-label">Form Title</label>
                            <input type="text" class="form-control" id="title_form" name="title_form"
                                value="{{ @$settings->title_form }}">
                        </div>

                        <div class="col-md-12">
                            <label for="color_title" class="form-label">Title Color</label>
                            <input type="color" class="circle" id="color_title" name="color_title"
                                value="{{ @$settings->color_title }}">
                        </div>

                        <div class="col-md-12">
                            <label for="background_color" class="form-label">Background Color</label>
                            <input type="color" class="circle" id="background_color" name="background_color"
                                value="{{ @$settings->background_color }}">
                        </div>

                        <div class="col-md-12">
                            <label for="back_btn" class="form-label">Button Background Color</label>
                            <input type="color" class="circle" id="back_btn" name="back_btn"
                                value="{{ @$settings->back_btn }}">
                        </div>

                        <div class="col-md-12">
                            <label for="border_color" class="form-label">Border Color</label>
                            <input type="color" class="circle" id="border_color" value="{{ @$settings->border_color }}"
                                name="border_color">
                        </div>

                        <div class="col-md-12">
                            <label for="border_size" class="form-label">Border Size</label>
                            <input type="number" class="form-control" id="border_size" name="border_size"
                                value="{{ @$settings->border_size }}">
                        </div>

                        <div class="col-md-12">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                value="{{ @$settings->last_name }}">
                        </div>

                        <div class="col-md-12">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                value="{{ @$settings->first_name }}">
                        </div>

                        <div class="col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ @$settings->email }}">
                        </div>

                        <div class="col-md-12">
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                value="{{ @$settings->phone_number }}">
                        </div>

                        <div class="col-md-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ @$settings->address }}">
                        </div>

                        <div class="col-md-12">
                            <label for="btn_save" class="form-label">Submit Button</label>
                            <input type="text" class="form-control" id="btn_save" name="btn_save"
                                value="{{ @$settings->btn_save }}">
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-label">Choice your product</label>
                            <select  name="productID" class="form-select " data-control="select2" data-hide-search="false" data-placeholder="Products" aria-hidden="true">
                                @foreach ($products as $product)
                                    <option data-select2-id="select2-data-12-wklj"></option>
                                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                                @endforeach
                            </select>
                            <!--end::Select2-->
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- ************************************* SMART FORM *********************************** --}}
            <div class="col-12 col-md-6">
                <div class="card card-flush" style="background: {{ @$settings->background_color }};" id="form_preview">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title">
                            <h5 style="color: {{ @$settings->color_title }};" id="form_title">
                                {{ @$settings->title_form }}
                            </h5>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <form id="orderForm" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                            <div class="form-group">
                                <div class="relative">
                                    <label class="fs-6 fw-bold form-label mt-3" id="first_name_label">
                                        {{ @$settings->first_name }}
                                    </label>
                                    <input class="form-control form-control-solid" id="name" name="name" type="text"
                                        autofocus="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="relative">
                                    <label class="fs-6 fw-bold form-label mt-3" id="last_name_label">
                                        {{ @$settings->last_name }}
                                    </label>
                                    <input class="form-control form-control-solid" id="phone" name="phone" type="text"
                                        autofocus="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="relative">
                                    <label class="fs-6 fw-bold form-label mt-3" id="email_label">
                                        {{ @$settings->email }}
                                    </label>
                                    <input class="form-control form-control-solid" id="email" name="email" type="email"
                                        autofocus="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="relative">
                                    <label class="fs-6 fw-bold form-label mt-3" id="phone_label">
                                        {{ @$settings->phone_number }}
                                    </label>
                                    <input class="form-control form-control-solid" id="phone" name="phone" type="text"
                                        autofocus="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="relative">
                                    <label class="fs-6 fw-bold form-label mt-3" id="adress_label">
                                        {{ @$settings->address }}
                                    </label>
                                    <input class="form-control form-control-solid" id="address" name="address"
                                        type="text" autofocus="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button id="btn_submit" type="submit"
                                        style="background: {{ @$settings->back_btn }}; border: {{ @$settings->border_size }}px solid {{ @$settings->border_color }};"
                                        class="btn btn-primary">
                                        {{ @$settings->btn_save }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="color-picker"></div>
                <div id="color-indicator" class="color-indicator"></div>
                <div id="color-picker"></div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    //*****************COLOR PICKER***************************
    $(document).ready(function() {
        //*****************Change Title***********************
        $('#title_form').on('change', function (e){
            e.preventDefault();
            let title = $(this).val();
            $('#form_title').text( title );
        });

        $('#color_title').on('change', function (e){
            e.preventDefault();
            let color = $(this).val();
            $('#form_title').css( "color", color );
        });

        $('#background_color').on('change', function (e){
            e.preventDefault();
            let color = $(this).val();
            $('#form_preview').css( "background", color );
        });

        $('#last_name').on('change', function (e){
            e.preventDefault();
            let text = $(this).val();
            $('#last_name_label').text( text );
        });

        $('#first_name').on('change', function (e){
            e.preventDefault();
            let text = $(this).val();
            $('#first_name_label').text( text );
        });

        $('#email').on('change', function (e){
            e.preventDefault();
            let text = $(this).val();
            $('#email_label').text( text );
        });

        $('#phone_number').on('change', function (e){
            e.preventDefault();
            let text = $(this).val();
            $('#phone_label').text( text );
        });

        $('#address').on('change', function (e){
            e.preventDefault();
            let text = $(this).val();
            $('#adress_label').text( text );
        });

        $('#btn_save').on('change', function (e){
            e.preventDefault();
            let text = $(this).val();
            $('#btn_submit').text( text );
        });

        $('#border_color').on('change', function (e){
            e.preventDefault();
            let border_color = $(this).val();
            let border_size = $("#border_size").val();
            $('#btn_submit').css( "border", border_size+"px solid "+border_color );
        });

        $('#back_btn').on('change', function (e){
            e.preventDefault();
            let back_btn = $(this).val();
            $('#btn_submit').css( "background", back_btn );
        });
    });
</script>
@endsection
