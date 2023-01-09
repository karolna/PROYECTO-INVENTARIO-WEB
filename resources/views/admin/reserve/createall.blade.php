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
                        <li class="nav-item active" style="background-color:#f2f2f2">
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
		<div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
            </h3>

        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    {!! Form::open(['route' => 'reserve.store_all', 'method' => 'POST']) !!}
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de Reserva</h4>
                        </div>

                        @include('admin.reserve._form')


                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" id="guardar" class="btn btn-primary float-right">Registrar</button>
                        <a href="{{ route('reserve.index') }}" class="btn btn-light">
                            Cancelar
                        </a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>



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
  {!! Html::script('melody/js/alerts.js') !!}
    {!! Html::script('melody/js/avgrund.js') !!}

    {!! Html::script('select/dist/js/bootstrap-select.min.js') !!}
    {!! Html::script('js/sweetalert2.all.min.js') !!}




    <script>
        $(document).ready(function() {
            $(".agregar").click(function() {
                agregar();
            });
        });

        var cont = 1;
        total = 0;
        subtotal = [];


      //  $("#product_id").change(mostrarValores);

        function mostrarValores() {
            datosProducto = document.getElementById('product_id').value.split('_');
            $("#price").val(datosProducto[2]);
            $("#stock").val(datosProducto[1]);
        }

        var product_selected = $('#product_id');
        product_selected.on("change", function() {
            var product_id= product_selected.val();
            $.ajax({
                url: "{{ route('get_products_by_id') }}",
                method: 'GET',
                data: {
                    product_id,
                },
                success: function(data) {
                    $("#price").val(data.sell_price);
                    $("#stock").val(data.stock);
                    console.log(data);
                }
            })
            // product_id.change(function(){
            //     $.ajax({
            //         url: "{{ route('get_products_by_id') }}",
            //         method: 'GET',
            //         data:{
            //             product_id: product_id.val(),
            //         },
            //         success: function(data){
            //             $("#price").val(data.sell_price);
            //             $("#stock").val(data.stock);
            //             console.log(data);
            //     }
            // });

        })
        console.log(product_id);
        ;


        $(obtener_registro());

        function obtener_registro(code) {
            $.ajax({
                url: "{{ route('get_products_by_barcode') }}",
                type: 'GET',
                data: {
                    code: code
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $("#price").val(data.sell_price);
                    $("#stock").val(data.stock);
                    $("#product_id").val(data.id);
                }
            });
        }
        $(document).on('keyup', '#code', function() {
            var valorResultado = $(this).val();
            if (valorResultado != "") {
                obtener_registro(valorResultado);
            } else {
                obtener_registro();
            }
        })


        function agregar() {
            if (parseInt(stock) >= parseInt(quantity)) {

} else {
    Swal.fire({
        type: 'error',
        text: 'La cantidad a vender supera el stock.',
    })
    $('#quantity').val('');
}
        }

        function limpiar() {
            $("#quantity").val("");
            $("#discount").val("0");
        }

        function totales() {
            $("#total").html("USD " + total.toFixed(2));

            total_impuesto = total * impuesto / 100;
            total_pagar = total + total_impuesto;
            $("#total_impuesto").html("USD " + total_impuesto.toFixed(2));
            $("#total_pagar_html").html("USD " + total_pagar.toFixed(2));
            $("#total_pagar").val(total_pagar.toFixed(2));
        }

        function evaluar() {
            if (total > 0) {
                $("#guardar").show();
            } else {
                $("#guardar").hide();
            }
        }

        function eliminar(index) {
            total = total - subtotal[index];
            total_impuesto = total * impuesto / 100;
            total_pagar_html = total + total_impuesto;
            $("#total").html("USD" + total);
            $("#total_impuesto").html("USD" + total_impuesto);
            $("#total_pagar_html").html("USD" + total_pagar_html);
            $("#total_pagar").val(total_pagar_html.toFixed(2));
            $("#fila" + index).remove();
            evaluar();
        }
    </script>
    @yield('scripts')

</body>


</html>


