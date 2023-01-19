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
    {!! Html::style('jquery-ui/jquery-ui.min.css') !!}

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
        @if (isset($error))
        <div class="col-sm-12">
            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
              $error
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
        </div>
    @endif

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
                        <button type="submit" id="guardar"  class="btn btn-primary float-right" style="display: none;">Registrar</button>
                        <a href="{{ route('reserve.index') }}" class="btn btn-light">
                            Cancelar
                        </a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div style="padding-right:10%; padding-left:15z%; display:flex" class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th></th>
                                    <th></th>

                                    <th></th>
                                </tr>
                            </thead>
                          {{--  <tbody>
                                @foreach ($productosvendidos as $productosvendido)
                                <tr>
                                    <td style="width:200px ; padding-right:0px; ">
                                        <img class="card-img-top" src="{{asset('image/'.$productosvendido->image)}}" width="1px" height="1px" style="width: 20%; height:40%" alt="Card image cap">

                                    </td>
                                    <td>{{$productosvendido->name}}</td>
                                    <td>Quedan pocas Unidades</td>

                                    <td>
                                        <a class="btn btn-primary"
                                            href="{{route('products.show', $productosvendido->id)}}">
                                            <i class="far fa-eye"></i>
                                            Ver detalles
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>--}}
                        </table>
                    </div>
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
                                        <h4 class="card-title">Otros roductos</h4>
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

</body>
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
    {!! Html::script('js/jquery/jquery-3.6.3.min.js') !!}
    {!! Html::script('jquery-ui/jquery-ui.min.js') !!}

    <!-- End custom js for this page-->



    <script type="text/javascript">
        function validar() {
            var cedula = document.getElementById("dni").value.trim();
            var clientes = @json($clients->toArray());
        console.log(clientes,cedula);

        var dni_clients =$('#dni')
        var dni_client = dni_clients.val();
        $.ajax({
                url: "{{ route('get_client_by_dni') }}",
                method: 'GET',
                data: {
                    dni_client,
                },
                success: function(data) {
                    console.log(data);
                    $("#phone").val(data.phone);
                    $("#name").val(data.name);
                    $("#lastname").val(data.lastname);
                }
            })
          var cedula = document.getElementById("dni").value.trim();
    //Preguntamos si la cedula consta de 10 digitos
    if(cedula.length == 10){

     //Obtenemos el digito de la region que sonlos dos primeros digitos
     var digito_region = cedula.substring(0,2);

     //Pregunto si la region existe ecuador se divide en 24 regiones
     if( digito_region >= 1 && digito_region <=24 ){

       // Extraigo el ultimo digito
       var ultimo_digito   = cedula.substring(9,10);

       //Agrupo todos los pares y los sumo
       var pares = parseInt(cedula.substring(1,2)) + parseInt(cedula.substring(3,4)) + parseInt(cedula.substring(5,6)) + parseInt(cedula.substring(7,8));

       //Agrupo los impares, los multiplico por un factor de 2, si la resultante es > que 9 le restamos el 9 a la resultante
       var numero1 = cedula.substring(0,1);
       var numero1 = (numero1 * 2);
       if( numero1 > 9 ){ var numero1 = (numero1 - 9); }

       var numero3 = cedula.substring(2,3);
       var numero3 = (numero3 * 2);
       if( numero3 > 9 ){ var numero3 = (numero3 - 9); }

       var numero5 = cedula.substring(4,5);
       var numero5 = (numero5 * 2);
       if( numero5 > 9 ){ var numero5 = (numero5 - 9); }

       var numero7 = cedula.substring(6,7);
       var numero7 = (numero7 * 2);
       if( numero7 > 9 ){ var numero7 = (numero7 - 9); }

       var numero9 = cedula.substring(8,9);
       var numero9 = (numero9 * 2);
       if( numero9 > 9 ){ var numero9 = (numero9 - 9); }

       var impares = numero1 + numero3 + numero5 + numero7 + numero9;

       //Suma total
       var suma_total = (pares + impares);

       //extraemos el primero digito
       var primer_digito_suma = String(suma_total).substring(0,1);

       //Obtenemos la decena inmediata
       var decena = (parseInt(primer_digito_suma) + 1)  * 10;

       //Obtenemos la resta de la decena inmediata - la suma_total esto nos da el digito validador
       var digito_validador = decena - suma_total;

       //Si el digito validador es = a 10 toma el valor de 0
       if(digito_validador == 10)
         var digito_validador = 0;

       //Validamos que el digito validador sea igual al de la cedula
       if(digito_validador == ultimo_digito){
       const btnvalidar = document.getElementById('guardar');
       btnvalidar.style.display = "inline";
       }
       else{
       const btnvalidar = document.getElementById('guardar');
       btnvalidar.style.display = "none";
       }


     }else{
        const btnvalidar = document.getElementById('guardar');
        btnvalidar.style.display = "none";
     }
    }else{
     //imprimimos en consola si la cedula tiene mas o menos de 10 digitos
     const btnvalidar = document.getElementById('guardar');
     btnvalidar.style.display = "none";
    }
    }

      </script>



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

     var clientes = @json($clients->toArray());
        console.log(clientes)
        var clientesDni = clientes.map((cliente) => {
            return cliente.dni;
        })
        $('.dni').autocomplete({
            source: clientesDni
        });

    </script>
    @yield('scripts')



</html>


