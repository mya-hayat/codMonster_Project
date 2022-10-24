<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/46a02c0f3f.js" crossorigin="anonymous"></script>
    <title>Document</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .navbar{
            padding-top: 0;
            background: rgb(255, 214, 184);
        }
        .navbar-brand{
            width: 100px;
            height: 100px;
        }
        .navbar-nav{
            margin-left: auto;
        }
        .nav-item{
            padding-right: 40px;
            font-size: 18px;
        }
        li .active{
            border-bottom: 1px solid rgb(0, 0, 0);
            padding-bottom: 10px;
        }
        li .nav-link{
            color: black;
          font-weight: bold;
        }
        .email-form{
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
          font-weight: bold;
        }
        #submit{
            width: 90px;
            height: 35px;
            margin-top: 10px;
            border: transparent;
            background: rgb(255, 214, 184);
            color: #FFFFFF;
            border-radius: 20px;
        }
        .main{
            margin-top: 50px;
        }
        .img-content{
            margin-left: 60px;
        }
        .store-link{
            text-decoration: none;
        }
        .price{
            font-size: 40px;
        }
        .stock{
            color: green;
            margin-top: -15px;
        }
        .branch{
            margin-top: -15px;
            font-size: 16px;
        }
        .branch-link{
            text-decoration: none;
            font-size: 16px;
            color: green;
        }
        .label{
            font-size: 16px;
        }
        .select{
            padding-right: 5px;
        }
        .submit{
            width: 110px;
            height: 40px;
            border: transparent;
            background: #000000;
            color: #FFFFFF;
            font-size: 16px;
            margin-top: 20px;
            border-radius: 20px;
        }
        .buy{
            width: 110px;
            height: 40px;
            border: transparent;
            background: rgb(255, 214, 184);
            color: #FFFFFF;
            font-size: 16px;
            margin-top: 10px;
            border-radius: 20px;
        }
        #banner-img{
            width: 100%;
            margin-top: 10%;
        }
        #features{
            margin-top: 50px;
          padding-top: 7%;
            padding-bottom: 7%;
            background: rgb(255, 214, 184);
        }
        .video-link{
            margin-top: 7%;
            margin-left: 20px;
        }
        .img-content-1{
            margin-left: 90px;
            padding-top: 2%;
            font-size: 18px;
            color: black;
            font-weight: bold;
        }
        .description{
            padding-bottom: 20px;
            font-size: 25px;
        }
        #new-releases{
            margin-top: 40px;
        }
        span{
            font-size: 22px;
        }
        .card{
            width: 350px;
            height: 460px;
            margin-left: 35px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        .card-img-top{
            width: 300px;
            height: 300px;
            margin: 0;
            padding-left: 30px;
        }
        .card-title{
            margin-top: -50px;
            font-size: 26px;
        }
        .card-text{
            font-size: 26px;
            margin-top: -10px;
        }
        .del{
            font-size: 16px;
            margin-top: -17px;
        }
        .submit-1{
            width: 110px;
            height: 40px;
            border: transparent;
            background: rgb(255, 214, 184);
            color: #FFFFFF;
            font-size: 16px;
            margin-top: 0px;
            border-radius: 20px;
        }
        #contact{
            height: 100px;
            margin-top: 50px;
            background: rgb(255, 214, 184);
        }
        .contact{
            color: #FFFFFF;
        }
        .list-item{
            float: right;
            display: inline;
            position: relative;
            margin-right: 30px;
            margin-top: 30px;
        }
        .contact-text{
            float: right;
            margin-top: 30px;
            margin-right: -205px;
            color: grey;

        }
        /**************************BUTTON BUY ME **********************************/


          #neonShadow{
            height:50px;
            width:100px;
            border:none;
            border-radius:50px;
            transition:0.3s;
            background-color:rgba(156, 161, 160,0.3);
            animation: glow 1s infinite ;
            transition:0.5s;
          }

          #neonShadow:hover{
            transform:translateX(-20px)rotate(30deg);
            border-radius:5px;
            background-color:#c3bacc;
            transition:0.5s;
          }

          @keyframes glow{
            0%{
            box-shadow: 5px 5px 20px rgb(93, 52, 168),-5px -5px 20px rgb(93, 52, 168);}

            50%{
            box-shadow: 5px 5px 20px rgb(81, 224, 210),-5px -5px 20px rgb(81, 224, 210)
            }
            100%{
            box-shadow: 5px 5px 20px rgb(93, 52, 168),-5px -5px 20px rgb(93, 52, 168)
            }
          }



 .button {

	 transform: translateY(-50%);
     background-color:wheat;
     color: white;
	 width: 225px;
	 height: 75px;
     margin-left:150px;
     margin-top:60px;
	 position: absolute;
	 border-radius: 100px 100px 100px 100px;
	 display: flex;
	 justify-content: center;
	 align-items: center;
	 animation: vibrate ease-out 1s infinite;
}
 .email-text {
	 color: #fff;
	 text-decoration: none;
}
 .email-icon {
	 margin: 5px;
}
 @keyframes vibrate {
	 0% {
		 left: -3px;
		 right: -3px;
	}
	 12.5% {
		 left: 3px;
		 right: 0px;
	}
	 25% {
		 left: -3px;
		 right: 3px;
	}
	 37.5% {
		 left: 0px;
		 right: -3px;
	}
	 50% {
		 left: 0px;
		 right: 3px;
	}
	 62.5% {
		 left: 3px;
		 right: -3px;
	}
	 75% {
		 left: -3px;
		 right: 0;
	}
	 87.5% {
		 left: 3px;
		 right: 3px;
	}
	 100% {
		 left: 0px;
		 right: 3px;
	}
}





    </style>

</head>
<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<header id="header">
  <!----------navbar---------->
  <nav id="nav-bar" class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <!----------brand-logo----------->
      <a class="navbar-brand" href="#"><img id="header-img" class="navbar-brand" src="https://m.media-amazon.com/images/S/abs-image-upload-na/c/AmazonStores/A21TJRUUN4KGV/365042dad86254f7b01d19bb8569ebf3.w400.h400._CR0%2C0%2C400%2C400_SX200_.jpg"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#features">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#new-releases">Variants</a>
          </li>
          <li class="nav-item">
            <button id="neonShadow" style="color: #000000"> <b>Buy Now</b> </button>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<!-----------body------------>
<section id="home">

  <!-------content----------->
  <div class="container-fluid main">
    <div class="row">
      <!----------img-content------->
      <div class="col-5 img-content">
        <h2>Nivia Flash Badminton Flash Shoes,<br> Men s UK 7 (White/Blue)</h2>
        <h3 class="price"><span>-8%</span> ₹829.00</h3>
        <p class="delete text-muted">M.R.P.: <del>₹899.00</del></p>
        <p>Inclusive of all taxes</p>
        <p class="stock">In stock.</p>
        <p class="branch">Sold by <a class="branch-link" href="">FOOTWEAR KING</a> and Delivered by Amazon.</p>
        <label class="label">Quantity: </label>
        <select class="select">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select><br>
        <div class="button">
            <span class="email-icon">
            <i class="fa-solid fa-cart-shopping"  aria-hidden="true"></i>
            </span>
            <span style="font-size: 30px">Buy Now</span>
        </div>


      </div>
      <!-------------img------------->
      <div class="col-6">
        <img id="banner-img" src="https://m.media-amazon.com/images/I/61q8lY6UUXL._SL1500_.jpg">
      </div>
    </div>
  </div>
</section>
<!--------------video-link------------>
<section id="features">
  <div class="container-fluid">
    <div class="row">
      <!-----------video------------>
      <div class="col-5 video-link">
        <iframe id="video" width="727" height="409" src="https://www.youtube.com/embed/LqJG9YalDR4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <!-----------img-content-1------>
      <div class="col-5 img-content-1">
        <ul>
          <li class="description">The outer material is of Mesh & PVC Synthetic Leather with Solid & Striped heel printing.</li>
          <li class="description">Available with rubber sole .</li>
          <li class="description">The shoe is available with Solid & Striped printing .</li>
          <li class="description">The Nivia Badminton shoe comes in all sizes with an attractive design.</li>
          <li class="description">The pair looks graceful while wearing .</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-----------new-releases----------->
<section id="new-releases">
  <div class="row row-cols-1 row-cols-md-3 g-4 m-2">
    <div class="col">
      <div class="card">
        <img src="https://m.media-amazon.com/images/I/71lKLolpY6L._UL1500_.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Nivia Storm Football<br> Shoe</h5>
          <p class="card-text"><span>-2%</span> ₹782.00</p>
          <p class="del text-muted">M.R.P.: <del>₹799.00</del></p>
         <button  style="margin-left: 55px;" class="submit"></i>Buy Now</button>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img src="https://m.media-amazon.com/images/I/71MNfIBT6ML._SL1500_.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">HY-Court 2.0 Badminton Shoe</h5>
          <p class="card-text"><span>-15%</span> ₹1,408.00</p>
          <p class="del text-muted">M.R.P.: <del>₹1649.00</del></p>
         <button style="margin-left: 100px" class="submit">Buy Now</button>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img src="https://m.media-amazon.com/images/I/81kvEEBJS+L._SL1500_.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Nivia 2669 Endeavour 2.0 Running Shoe for Mens</h5>
          <p class="card-text"><span>-40%</span> ₹899.00</p>
          <p class="del text-muted">M.R.P.: <del>₹1499.00</del></p>
         <button style="margin-left: 100px" class="submit">Buy Now</button>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="contact">
  </section>
</body>
</html>












