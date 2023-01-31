<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Menu</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('public/yummy/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('public/yummy/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

   <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('public/yummy/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/yummy/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('public/yummy/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('public/yummy/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/yummy/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('public/yummy/assets/css/main.css')}}" rel="stylesheet">

<script type="text/javascript" src="https://code.jquery.com/jquery-1.8.2.js"></script>
<style type="text/css">
  #overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #000;
    filter:alpha(opacity=70);
    -moz-opacity:0.7;
    -khtml-opacity: 0.7;
    opacity: 0.7;
    z-index: 100;
    display: none;
  }
  .cnt223 a{
    text-decoration: none;
  }
  .popup{
    width: 100%;
    margin: 0 auto;
    display: none;
    position: fixed;
    z-index: 101;
  }
  .cnt223{
    min-width: 600px;
    width: 600px;
    min-height: 150px;
    margin: 100px auto;
    background: #f3f3f3;
    position: relative;
    z-index: 103;
    padding: 15px 35px;
    border-radius: 5px;
    box-shadow: 0 2px 5px #000;
  }
  .cnt223 p{
  clear: both;
      color: #555555;
      /* text-align: justify; */
      font-size: 20px;
      font-family: sans-serif;
  }
  .cnt223 p a{
    color: #d91900;
    font-weight: bold;
  }
  .cnt223 .x{
    float: right;
    height: 35px;
    left: 22px;
    position: relative;
    top: -25px;
    width: 34px;
  }
  .cnt223 .x:hover{
    cursor: pointer;
  }
  </style>
  <script type='text/javascript'>
  $(function(){
    var overlay = $('<div id="overlay"></div>');
    overlay.show();
    overlay.appendTo(document.body);
    $('.popup').show();
    $('.close').click(function(){
      $('.popup').hide();
      overlay.appendTo(document.body).remove();
      return false;
  });
  
  
   
  
  $('.x').click(function(){
  $('.popup').hide();
  overlay.appendTo(document.body).remove();
  return false;
  });
  });
  </script>

</head>
<body>
  <div class='popup'>
    <div class='cnt223'>
      <h3>Fill Information</h3>
      <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="form-group col-md-12">
          <label>Customer Name </label>
          <input type="text" name="name" class="form-control" value="{{ old('name', isset($store->name) ? $store->name : '' ) }}" placeholder="Enter Your Name">
      </div>
      <div class="form-group col-md-12">
        <label>Customer Contact </label>
        <input type="text" name="name" class="form-control" value="{{ old('name', isset($store->name) ? $store->name : '' ) }}" placeholder="Enter Your Contact">
      </div>
      <div class="form-group col-md-12">
        <label>Select Table</label>
        <select class="form-control" id="category_id" name="category_id">
          {{-- @foreach($categories as $key => $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach                                   --}}
      </select>
    </div>
      <br/>
      <button type="submit" class='btn btn-primary'>Submit</button>
      <a href='' class='close'>Close</a>
    </form>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="{{asset('public/yummy/assets/img/logo.png')}}" alt=""> -->
        <h1>Yummy<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="btn" href="#order">Order Now</a></li>
        </ul>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <main id="main">
 <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2></h2>
          <p>Check Our <span>Yummy Menu</span></p>
        </div>
        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
          @foreach ($category as $item)
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-{{$item['name']}}">
                <h4>{{$item['name']}}</h4>
              </a>
            </li><!-- End tab nav item -->
          @endforeach
        </ul>
        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
          @foreach ($category as $item)
            <div class="tab-pane fade" id="menu-{{$item['name']}}">
              <div class="tab-header text-center">
                <p>Menu</p>
                <h3>{{$item['name']}}</h3>
              </div>
              <div class="row gy-5">
                @if(!empty($item['menu']))
                  @foreach($item['menu'] as $menu)
                    <div class="col-lg-4 menu-item">
                      <a href="{{ $menu['image'] }}" class="glightbox"><img src="{{ $menu['image'] }}" class="menu-img img-fluid" alt="{{ $menu['name'] }}"></a>
                      <h4>{{$menu['name']}}</h4>
                      <p class="ingredients">
                        {{$menu['description']}}
                      </p>
                      <p class="price">
                        ${{$menu['prize']}}
                      </p>
                      <button type="button" class="btn btn-success" href="javascript:void(0)" onclick="{{$menu['id']}}">Add To Cart</button>
                    </div><!-- Menu Item -->
                  @endforeach                    
                @else
                    <h2 class="text-center">NO DATA FOUND</h2>
                @endif
              </div>
            </div><!-- End Starter Menu Content -->
          @endforeach
        </div>
      </div>
    </section><!-- End Menu Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Address</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022 - US<br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Reservations</h4>
            <p>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Sat: 11AM</strong> - 23PM<br>
              Sunday: Closed
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Yummy</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">Ashwajit</a>
      </div>
    </div>
  </footer><!-- End Footer -->
  <!-- End Footer -->
  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('public/yummy/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('public/yummy/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('public/yummy/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('public/yummy/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('public/yummy/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('public/yummy/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('public/yummy/assets/js/main.js')}}"></script>

</body>
</html>