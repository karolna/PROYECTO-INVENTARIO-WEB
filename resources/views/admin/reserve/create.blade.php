@extends('layouts.admin')
@section('title', 'Registro de Reserva')
@section('styles')

    {!! Html::style('jquery-ui/jquery-ui.min.css') !!}
    <style type="text/css">
        .unstyled-button {
            border: none;
            padding: 0;
            background: none;
        }
    </style>
@endsection

@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('reserve.index') }}">Ventas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de venta</li>
                </ol>
            </nav>
        </div>
        @if (isset($success))
        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
              $success
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
        </div>
    @endif
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    {!! Form::open(['route' => 'reserve.store', 'method' => 'POST']) !!}
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de Reserva</h4>
                        </div>

                        @include('admin.reserve._form')


                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" id="guardar" class="btn btn-primary float-right"
                            style="display: none;">Registrar</button>
                        <a href="{{ route('reserve.index') }}" class="btn btn-light">
                            Cancelar
                        </a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>





@endsection
@section('scripts')
    {!! Html::script('melody/js/alerts.js') !!}
    {!! Html::script('melody/js/avgrund.js') !!}


    {!! Html::script('js/sweetalert2.all.min.js') !!}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script>

    {!! Html::script('melody/js/dashboard.js') !!}

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

    <!-- End custom js for this page-->
    {!! Html::script('melody/js/alerts.js') !!}
    {!! Html::script('melody/js/avgrund.js') !!}
    {!! Html::script('js/jquery/jquery-3.6.3.min.js') !!}
    {!! Html::script('jquery-ui/jquery-ui.min.js') !!}

    {!! Html::script('js/sweetalert2.all.min.js') !!}
    <script type="text/javascript">


const dni_selector = document.querySelector('dni');
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
                    $("#phone").val(data.phone);
                    $("#name").val(data.name);
                    $("#lastname").val(data.lastname);
                }
            })
            //Preguntamos si la cedula consta de 10 digitos
            if (cedula.length == 10) {

                //Obtenemos el digito de la region que sonlos dos primeros digitos
                var digito_region = cedula.substring(0, 2);

                //Pregunto si la region existe ecuador se divide en 24 regiones
                if (digito_region >= 1 && digito_region <= 24) {

                    // Extraigo el ultimo digito
                    var ultimo_digito = cedula.substring(9, 10);

                    //Agrupo todos los pares y los sumo
                    var pares = parseInt(cedula.substring(1, 2)) + parseInt(cedula.substring(3, 4)) + parseInt(cedula
                        .substring(5, 6)) + parseInt(cedula.substring(7, 8));

                    //Agrupo los impares, los multiplico por un factor de 2, si la resultante es > que 9 le restamos el 9 a la resultante
                    var numero1 = cedula.substring(0, 1);
                    var numero1 = (numero1 * 2);
                    if (numero1 > 9) {
                        var numero1 = (numero1 - 9);
                    }

                    var numero3 = cedula.substring(2, 3);
                    var numero3 = (numero3 * 2);
                    if (numero3 > 9) {
                        var numero3 = (numero3 - 9);
                    }

                    var numero5 = cedula.substring(4, 5);
                    var numero5 = (numero5 * 2);
                    if (numero5 > 9) {
                        var numero5 = (numero5 - 9);
                    }

                    var numero7 = cedula.substring(6, 7);
                    var numero7 = (numero7 * 2);
                    if (numero7 > 9) {
                        var numero7 = (numero7 - 9);
                    }

                    var numero9 = cedula.substring(8, 9);
                    var numero9 = (numero9 * 2);
                    if (numero9 > 9) {
                        var numero9 = (numero9 - 9);
                    }

                    var impares = numero1 + numero3 + numero5 + numero7 + numero9;

                    //Suma total
                    var suma_total = (pares + impares);

                    //extraemos el primero digito
                    var primer_digito_suma = String(suma_total).substring(0, 1);

                    //Obtenemos la decena inmediata
                    var decena = (parseInt(primer_digito_suma) + 1) * 10;

                    //Obtenemos la resta de la decena inmediata - la suma_total esto nos da el digito validador
                    var digito_validador = decena - suma_total;

                    //Si el digito validador es = a 10 toma el valor de 0
                    if (digito_validador == 10)
                        var digito_validador = 0;

                    //Validamos que el digito validador sea igual al de la cedula
                    if (digito_validador == ultimo_digito) {
                        const btnvalidar = document.getElementById('guardar');
                        btnvalidar.style.display = "inline";
                    } else {
                        const btnvalidar = document.getElementById('guardar');
                        btnvalidar.style.display = "none";
                    }


                } else {
                    const btnvalidar = document.getElementById('guardar');
                    btnvalidar.style.display = "none";
                }
            } else {
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
            var product_id = product_selected.val();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@endsection
