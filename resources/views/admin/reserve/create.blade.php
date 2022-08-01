@extends('layouts.admin')
@section('title', 'Registro de Reserva')
@section('styles')
    {!! Html::style('select/dist/css/bootstrap-select.min.css') !!}
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





@endsection
@section('scripts')
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



@endsection
