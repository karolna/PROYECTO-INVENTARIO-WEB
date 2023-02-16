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


        @include('layouts._navinfo')
        <nav class="navbar navbar-expand-lg navbar-light bg-light" >
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                {{--<a class="navbar-brand" href="{{ route('login') }}">Ingresar</a>--}}
                <li class="nav-item " style="">
                    <a class="navbar-brand" href="{{ route('login') }}">Ingresar</a>
                  </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('reserve.reserve_all') }}">Reservas</a>
                  </li>
                <li class="nav-item  ">
                  <a class="nav-link " href="{{ route('index.reencauchadas') }}">Llantas reencauchadas</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('index.nuevas') }}">Llantas nuevas </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="{{ route('index.tubos') }}">Tubos </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="{{ route('index.defensas') }}">Defensas </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="{{ route('index.aros') }}">Aros </a>
                  </li>
              </ul>
            </div>
          </nav>
         {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link "  href="{{ route('index.defensas') }}" role="tab" aria-controls="home" aria-selected="true">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="{{ route('index.aros') }}" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="{{ route('index.nuevas') }}" role="tab" aria-controls="contact" aria-selected="true">Contact</a>
            </li>
          </ul>--}}

          @include('layouts._banners')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper" style="padding:0 0 0 0 !important;">             <!-- partial:partials/_settings-panel.html -->


            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->

            <!-- partial -->
            <div class="main-panel" style="width:100%">
                <div class="content-wrapper">

                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Productos con más salidas</h4>
                            {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>

                              </div>
                        </div>
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">



                                    <div class=" card-group col-xs-12 col-md-12 col-lg-12">

                                        @foreach ($productosvendidos as $productosvendido)



                                        <div class=" col-sx-4 col-md-6 col-lg-2">

                                            <div class="card">

                                                <img class="card-img-top" src="{{asset('image/'.$productosvendido->image)}}" width="1px" height="1px" style=" padding-left:20%,width: 300px; height:200px" alt="Card image cap">
                                                <div class="card-body">
                                                <h5 class="card-title"> {{$productosvendido->name}}</h5>
                                                <p class="card-text"> Quedan pocas Unidades</p>
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

                <div class="content-wrapper">

                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Otros Productos</h4>
                            {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>

                              </div>
                        </div>
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">


                                    <div class=" card-group col-xs-12 col-md-12 col-lg-12">



                                        <br>
                                        <br>
                                        @foreach ($products as $product)

                                            <div class=" col-sx-12 col-md-6 col-lg-3">

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


