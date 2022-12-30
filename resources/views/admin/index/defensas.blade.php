<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->

    {!! Html::style('melody/vendors/css/vendor.bundle.base.css') !!}
    {!! Html::style('melody/vendors/css/vendor.bundle.addons.css') !!}
    {!! Html::style('melody/vendors/css/vendor.bundle.addons.css') !!}

    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    {!! Html::style('melody/css/style.css') !!}
    {!! Html::style('melody/css/slick.css') !!}
    {!! Html::style('melody/css/slick-theme.css') !!}
    @yield('styles')
    <!-- endinject -->
    <link rel="shortcut icon" href="http://www.urbanui.com/" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class=" bg-light navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
            <div class="bg-light text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="bg-light navbar-brand brand-logo" href="{{ url('/') }}" ><img src="{{asset('melody/images/logo.svg')}}"
                        alt="logo" /></a>
                <a class="bg-light navbar-brand brand-logo-mini" href="index-2.html"><img src="{{asset('melody/images/logo-mini.svg')}}"
                        alt="logo" /></a>
            </div>








            <div class="navbar-menu-wrapper d-flex align-items-stretch bg-light" style="float: right">



                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="{{ route('login') }}">Ingresar</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('reserve.reserve_all') }}">Reservas <span class="sr-only">(current)</span></a>
                          </li>
                        <li class="nav-item ">
                          <a class="nav-link" href="{{ route('index.reencauchadas') }}">Llantas reencauchadas <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('index.nuevas') }}">Llantas nuevas <span class="sr-only">(current)</span></a>
                          </li>
                          <li class="nav-item ">
                            <a class="nav-link" href="{{ route('index.tubos') }}">Tubos <span class="sr-only">(current)</span></a>
                          </li>
                          <li class="nav-item active">
                            <a class="nav-link" href="{{ route('index.defensas') }}">Defensas <span class="sr-only">(current)</span></a>
                          </li>
                          <li class="nav-item ">
                            <a class="nav-link" href="{{ route('index.aros') }}">Aros <span class="sr-only">(current)</span></a>
                          </li>

                      </ul>
                    </div>
                  </nav>


            </div>
        </nav>
        <section >
            <div class="slick-center" style=" align:center; margin:auto "  >
            <img src="{{asset('image/banner1.png')}}">
                <img src="{{asset('image/banner2.png')}}">
                <img src="{{asset('image/banner3.png')}}">
                <img src="{{asset('image/banner4.png')}}">
            </div>
        </section>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper" style="padding:0 0 0 0 !important;">             <!-- partial:partials/_settings-panel.html -->

            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->

            <!-- partial -->
            <div class="main-panel" style="width:100%">
                <div class="content-wrapper">

                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">

                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title">Productos</h4>
                                        {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                                        <div class="btn-group">
                                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>

                                          </div>
                                    </div>

                                    <div class=" card-group col-xs-12 col-md-12 col-lg-12">
                                        @foreach ($products as $product)

                                            <div class=" col-sx-12 col-md-6 col-lg-4">

                                                <div class="card">

                                                  <img class="card-img-top" src="{{asset('image/'.$product->image)}}" width="60px" height="300px" alt="Card image cap">
                                                  <div class="card-body">
                                                    <h5 class="card-title">{{$product->name}}</h5>
                                                    <p class="card-text">Cantidad de  productos {{$product->stock}}</p>
                                                  </div>
                                                  <div class="card-footer">
                                                    <small class="text-muted">{{$product->category->name}}</small>
                                                  </div>

                                                </div>

                                             </div>
@endforeach
                                    </div>


                                </div>
                                {{--  <div class="card-footer text-muted">
                                    {{$products->render()}}
                                </div>  --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022.
                            Todos los derechos reservados.</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    {!! Html::script('melody/vendors/js/vendor.bundle.base.js') !!}
    {!! Html::script('melody/vendors/js/vendor.bundle.addons.js') !!}
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    {!! Html::script('melody/js/off-canvas.js') !!}
    {!! Html::script('melody/js/hoverable-collapse.js') !!}
    {!! Html::script('melody/js/misc.js') !!}
    {!! Html::script('melody/js/settings.js') !!}
    {!! Html::script('melody/js/todolist.js') !!}
      {!! Html::script('melody/js/slick.min.js') !!}
    <script>
        $('.slick-center').slick({
          centerMode: true,
          slidesToShow: 1,
          centerPadding: '4px',
          dots: true,
          arrows: false,
          mobileFirst: true,
          responsive: [{
              breakpoint: 600,
              settings: {
                  centerMode: true,
                  centerPadding: '80px',
                  slidesToShow: 1,
              }
          },
              {
                  breakpoint: 700,
                  settings: {
                      infinite: true,
                      slidesToShow: 1,
                  }
              },
              {
                  breakpoint: 1100,
                  settings: {
                      infinite: true,
                      centerMode: true,
                      centerPadding: '-20px',
                      slidesToShow: 1,
                  }
              }
          ]
      });
      </script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    {!! Html::script('melody/js/dashboard.js') !!}

     <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

    <!-- End custom js for this page-->

    @yield('scripts')

</body>


</html>


