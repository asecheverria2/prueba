<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">  
  <title>Nueva planta Vivero|GAD</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">  
  <!-- Favicons -->
  <link href="{{ url('/assets/img/logo.png') }}" rel="icon">
  <link href="{{ url('/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
  <!-- Vendor CSS Files -->
  <link href="{{ url('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ url('/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ url('/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ url('/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ url('/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  

  <!-- Template Main CSS File -->
  <link href="{{ url('/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Knight - v2.1.0
  * Template URL: https://bootstrapmade.com/knight-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>




<!-- ======= Hero Section ======= -->
<section id="hero2">
      <div class="hero2-container">
        <a href="{{ url('/') }}" class="hero-logo" data-aos="zoom-in"><img src="{{ url('/assets/img/hero-logo.png') }}" alt=""></a>
        <h1 data-aos="zoom-in">Registro Planta</h1>
      </div>
    </section><!-- End Hero -->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container">

      <!-- The main logo is shown in mobile version only. The centered nav-logo in nav menu is displayed in desktop view  -->
      <div class="logo d-block d-lg-none">
        <a href="{{ url('/') }}"><img src="{{ url('/assets/img/logo.png') }}" alt="" class="img-fluid"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul class="nav-inner">
          

          <li class="nav-logo"><a href="{{ url('/') }}"><img src="{{ url('/assets/img/logo.png') }}" alt="" class="img-fluid"></a></li>

  

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <div class="signup-form2">
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul> 
    @endif
    <form action="{{route('plantas.store')}}" method="POST" novalidate>
    @csrf
    <h2>Registrar Nueva Planta</h2>
        <div class="form-group">
        <div class="row">
        <div class="col"><input type="text" class="form-control" name="nombrecomun" placeholder="Nombre Comun" required="required" value="{{old('nombrecomun')}}">
            @if($errors->has('nombrecomun'))
                <p class="text-danger">{{$errors->first('nombrecomun')}}</p>
            @endif
        </div>
        
        <div class="col"><input type="text" class="form-control" name="nombrecientifico" placeholder="Nombre Cientifico" required="required" value="{{old('nombrecientifico')}}">
            @if($errors->has('nombrecientifico'))
                <p class="text-danger">{{$errors->first('nombrecientifico')}}</p>
            @endif
        </div>
        </div>        	
        </div>
        <div class="form-group">
        <div class="row"> 
            <div class="col"><input type="text" class="form-control" name="familia" placeholder="Familia" required="required" value="{{old('familia')}}">
                @if($errors->has('familia'))
                    <p class="text-danger">{{$errors->first('familia')}}</p>
                @endif
            </div>
            <div class="col"><input type="text" class="form-control" name="cantidad" placeholder="Cantidad" required="required" value="{{old('cantidad')}}">
                @if($errors->has('cantidad'))
                    <p class="text-danger">{{$errors->first('cantidad')}}</p>
                @endif
            </div>
        </div>
        </div>
    <div class="form-group">
        <div class="row">
        <div class="col"><input type="text" class="form-control" name="descripcion" placeholder="Descripcion" required="required" value="{{old('descripcion')}}">
            @if($errors->has('descripcion'))
                <p class="text-danger">{{$errors->first('descripcion')}}</p>
            @endif
        </div>
        <div class="col"><input type="date" class="form-control" name="fechaingreso" placeholder="Fecha Ingreso" required="required" value="{{old('fechaingreso')}}">
            @if($errors->has('fechaingreso'))
                <p class="text-danger">{{$errors->first('fechaingreso')}}</p>
            @endif
        </div>
        </div>
        </div>

        <div class="form-group">
            <p class="btn  btn-lg btn-block" href="#" role="button"  data-toggle="dropdown" >
            Seleccionar Tratamiento
            </p>
        
            <select class="form-control btn btn-success btn-lg btn-block" placeholder="Seleccione" name="tratamiento_id" id="tratamiento_id" aria-haspopup="true" aria-expanded="false">
                @foreach((\App\Tratamiento::all() ?? [] ) as $tratamiento)
                <option value="{{$tratamiento->id}}">
                    {{$tratamiento->descripcion}}</option>
                @endforeach
            </select>
        </div>       
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-lg btn-block">Agregar Planta</button> <br>
        <a href="{{route('plantas.index')}}" class="btn btn-primary">Regresar</a>
        </div>
    </form>
    </div>
    </main><!-- End #main -->



<!-- ======= Footer ======= -->
<footer id="footer">

<div class="footer-top">
  <div class="social-links">
    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
  </div>
</div>

<div class="container footer-bottom clearfix">
  <div class="copyright">
    &copy; Copyright <strong><span>Vivero GAD Latacunga</span></strong>. Todos los derechos reservados. 
  </div>
  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/knight-free-bootstrap-theme/ -->
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    
  </div>
</div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ url('/assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ url('/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ url('/assets/vendor/jquery-sticky/jquery.sticky.js') }}"></script>
  <script src="{{ url('/assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ url('/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ url('/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ url('/assets/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('/assets/js/main.js') }}"></script>
</body>
</html>