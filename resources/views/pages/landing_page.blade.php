<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <title>NIVIA Shoes</title>

    <link rel="stylesheet" href="main.css">
</head>
<body class="bg-light" style="">
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: rgb(214, 214, 214);">
        <div class="container-fluid">
        <img src="https://www.niviasports.com/assets/images/logo.png" width="10%" alt="">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="C:\Users\HAYAT MYA\Desktop\landing\index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#feachers">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#feachers">Pricing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#ahlam">Buy Now</a>
              </li>

            </ul>
          </div>
        </div>
      </nav>

    <div style="display: flex;">

        <div style="margin: 3% ;">
            <h5 style="margin-bottom: 3%;color: rgb(74, 72, 156);">NIVIA Pro Lite School Shoes Mens With Laces </h5>
            <img src="https://admin.niviasports.com/uploadfile/product_500/1213-2.png" width="70%" style="border:1px solid;" alt="">
            <div style="margin: 3% ;">
                <img src="https://admin.niviasports.com/uploadfile/product_500/1212-1.png" width="20%" style="border: 1px solid; margin-left: 3%;" alt="">
                <img src="https://admin.niviasports.com/uploadfile/product_500/1213-1.png" width="20%" style="border: 1px solid;" alt="">
                <img src="https://admin.niviasports.com/uploadfile/product_500/1212-5.png" width="20%" style="border: 1px solid;" alt="">

            </div>
            <hr>

            <h5 style="color: rgb(74, 72, 156);"> Price : 299$     </h5>
            <h5  style="color: rgb(74, 72, 156);" id="feachers">Product Features :</h5>
            <ul>
                <li>Upper- Mesh and PVC synthetic leather and TPU film.
                <li>Sole- Phylon and Rubber.
                <li> Closure: Lace-up.
                <li>Breathable mesh for airflow and comfort.
                <li>Padded footbed for additional comfort.
                <li>Material: Mesh.
                <li>In-box Contents: 1 Pair.
            </ul>
        </div>

        <div style="margin: 3%;" id="landing"></div>
    </div>
    <footer class=" pt-5  text-center text-large " style="background-color: rgb(214, 214, 214);" >
        <img src="https://www.niviasports.com/assets/images/logo.png" width="10%" style="margin-bottom:2%" alt="">

        <p class="mb-0">© 2017–2021 NIVIA</p>

      </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="main.js"></script>
    <script>
        var form = new FormData();
        form.append('store', 1);
        console.log('rerer')
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
                } else {

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
            form.append('store', 1);
            console.log('dd')
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
        });

        $(document).on("click",".plus",function(e) {
            console.log('rr')
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

    </script>

</body>
</html>
