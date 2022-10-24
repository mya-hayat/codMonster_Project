@extends('layouts.app')
@section('content')

<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
    <div class="w-lg-800px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto text-area-live">
        <span id="copier-content">
            <i class="fa-solid fa-copy"></i>
        </span>
        <textarea class="form-control form-control-solid" name="script" id="script" cols="30" rows="10">
            <script>
                var form = new FormData();
                form.append('store', {{ @$store->id }});
                $.ajax({
                    url: "http://127.0.0.1:8000/api/data",
                    type: 'POST',
                    data: form,
                    cache: false,
                    contentType: false,
                    processData: false,
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('script tag error');
                    },
                    beforeSend: function() {},
                    success: function(response) {
                        if (response.status == 1) {
                            $('#landing').html(response.html)
                        }
                    }
                });

                $(document).on("click","#btn_submit",function(e) {
                    e.preventDefault();

                    $('#last_name, #last_name, #email, #phone, #address').css('border', '1px solid transparent');
                    if($('#first_name').val() == '') {
                        $('#first_name').css('border', '2px solid red');
                        return;
                    } else if($('#last_name').val() == '') {
                        $('#last_name').css('border', '2px solid red');
                        return;
                    } else if($('#email').val() == '') {
                        $('#email').css('border', '2px solid red');
                        return;
                    } else if($('#phone').val() == '') {
                        $('#phone').css('border', '2px solid red');
                        return;
                    } else if($('#address').val() == '') {
                        $('#address').css('border', '2px solid red');
                        return;
                    }

                    var form = $('#orderForm')[0];
                    form = new FormData(form);
                    form.append('store', {{ @$store->id }});

                    $.ajax({
                        url: "http://127.0.0.1:8000/api/order",
                        type: 'POST',
                        data: form,
                        cache: false,
                        contentType: false,
                        processData: false,
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log('script tag error');
                        },
                        beforeSend: function() {},
                        success: function(response) {
                            if (response.status == 1) {
                                $('#orderForm')[0].reset();
                                $('.message-validation').show();
                                $('.message-error').hide();
                            } else {
                                $('.message-validation').hide();
                                $('.message-error').show();
                            }
                        }
                    });

                    $(document).on("click",".plus",function(e) {
                        $quantity = parseInt( $('#qty').val());
                        $max = parseInt( $('#qty').attr('max'));
                        if( $quantity < $max ) {
                            $('#qty').val($quantity+1);
                        }
                    });

                    $(document).on("click",".minus",function(e) {
                        $quantity = parseInt( $('#qty').val());
                        $min = parseInt($('#qty').attr('min'));
                        if( $quantity > $min ) {
                            $('#qty').val($quantity-1);
                        }

                    });

                });
            </script>
        </textarea>
    </div>

@endsection

@section('scripts')
<script>
    //*****************COLOR PICKER***************************
    $(document).ready(function() {
        //*****************Change Title***********************
        $('#copier-content').on('click', function (e){
            e.preventDefault();
            console.log('red')
            $("#script").select();
            document.execCommand("copy");
        });
    });
</script>
@endsection
