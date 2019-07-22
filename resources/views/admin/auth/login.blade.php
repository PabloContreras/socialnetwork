<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Network Coworking | Admin Login</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/favicon.ico')}}">
    <link href="{{ asset('css/css/bootstrap.min.css')}}">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <!-- Font Awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<style>


.modal-dialog {
      max-width: 800px;
      margin: 30px auto;
  }



.modal-body {
  position:relative;
  padding:0px;
}
.close {
  position:absolute;
  right:-30px;
  top:0;
  z-index:999;
  font-size:2rem;
  font-weight: normal;
  color:#fff;
  opacity:1;
}
</style>
</head>



<body>

    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="cssload-container">
            <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
        </div>
    </div>

   
    <section class="breadcumb-area bg-img d-flex align-items-center justify-content-center" style="background-image: url(/img/bg-img/2.png);">
        <div class="bradcumbContent text-center">
            <h2>Bienvenido, Administrador</h2>
            <br>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->



    <!-- ##### Testimonial Area Start ##### -->
    <section class="testimonial-area section-padding-100 bg-img" style="background-image: url(/img/core-img/pattern.png);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="testimonial-content" style="height: 519px;">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Recuérdame
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group center">
                            <div class="col-md-4 col-md-offset-4">
                                <center><button type="submit" class="btn btn-primary">
                                    Entrar
                                </button></center>

                                {{--<a class="btn btn-link" href="{{ url('/cliente/password/reset') }}">
                                    ¿Olvidaste tu contraseña?
                                </a>--}}
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">

                <!-- Footer Widget Area -->
                <div class="col-12 col-lg-5">
                    <div class="footer-widget-area mt-50">
                        <a href="#" class="d-block mb-5"><img src="/img/core-img/logo.png" alt=""></a>
                        <h6 class="widget-title mb-5" style="text-align: justify">
                        Network Coworking es un espacio de trabajo colaborativo e innovador que ofrece servicios de excelencia en renta de espacios de trabajo, que cuenta con todo lo que necesita un profesional independiente, nómada digital y emprendedor: instalaciones elegantes y equipamiento de la más alta tecnología.
                        </h6>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="footer-widget-area mt-50">
                        <h6 class="widget-title mb-5">Encuéntranos en el mapa</h6>
                        <img src="/img/bg-img/footer-map.png" alt="">
                    </div>
                </div>

                <!-- Copywrite Text -->
                <div class="col-12">
                    <div class="copywrite-text mt-30">
                        <p><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Desarrollado <i class="fa fa-heart-o" aria-hidden="true"></i> por <a href="https://colorlib.com" target="_blank">EOS</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js 
    <script src="js/jquery/jquery-2.2.4.min.js"></script>-->
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js 
    <script src="js/bootstrap/popper.min.js"></script>-->
    <script src="{{ asset('js/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->
    <script src="{{ asset('js/plugins/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{ asset('js/active.js')}}"></script>

   
</body>

</html>

