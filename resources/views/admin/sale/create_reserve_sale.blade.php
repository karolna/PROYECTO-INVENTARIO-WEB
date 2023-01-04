@extends('layouts.admin')
@section('title', 'Registro de venta')
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
@section('create')
    <li class="nav-item d-none d-lg-flex">
        <a class="nav-link" type="button" data-toggle="modal" data-target="#exampleModal-2">
            <span class="btn btn-warning">+ Registrar cliente</span>
        </a>
    </li>
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
                    <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Ventas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de venta</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    {!! Form::open(['route' => 'sales.store', 'method' => 'POST']) !!}
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de venta</h4>
                        </div>


                        <div class="form-group">
                            <label for="client_id">Cliente</label>
                            <select class="form-control" name="client_id" id="client_id">
                                @foreach ($client as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <div class="form-group">
                                    <label for="product_id">Producto</label>
                                    {{--  <select class="form-control selectpicker" data-live-search="true" name="product_id" id="product_id">  --}}
                                    {{-- <select class="form-control" name="product_id" id="product_id">
                                        <option value="" disabled selected>Selecccione un producto</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-group">
                                    <label for="">Stock actual</label>
                                    <input type="text" name="" id="stock" value="" class="form-control"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-group">
                                    <label for="price">Precio de venta</label>
                                    <input type="number" class="form-control" name="price" id="price"
                                        aria-describedby="helpId" disabled>
                                </div>
                            </div>
                        </div>




                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="quantity">Cantidad</label>
                                    <input type="number" class="form-control" name="quantity" id="quantity"
                                        aria-describedby="helpId">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="tax">Impuesto</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">%</span>
                                    </div>
                                    <input type="number" class="form-control" name="tax" id="tax"
                                        aria-describedby="basic-addon3" value="12">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="discount">Porcentaje de descuento</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">%</span>
                                    </div>
                                    <input type="number" class="form-control" name="discount" id="discount"
                                        aria-describedby="basic-addon2" value="0">
                                </div>
                            </div>
                        </div>







                        <div class="form-group">
                            <button type="button" id="agregar" class="btn btn-primary float-right">Agregar
                                producto</button>
                        </div>
                        <div class="form-group">
                            <h4 class="card-title">Detalles de venta</h4>
                            <div class="table-responsive col-md-12">
                                <table id="detalles" class="table">
                                    <thead>
                                        <tr>
                                            <th>Eliminar</th>
                                            <th>Producto</th>
                                            <th>Precio Venta (USD)</th>
                                            <th>Descuento</th>
                                            <th>Cantidad</th>
                                            <th>SubTotal (USD)</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">
                                                <p align="right">TOTAL:</p>
                                            </th>
                                            <th>
                                                <p align="right"><span id="total">USD 0.00</span> </p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="5">
                                                <p align="right">TOTAL IMPUESTO (12%):</p>
                                            </th>
                                            <th>
                                                <p align="right"><span id="total_impuesto">USD 0.00</span></p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="5">
                                                <p align="right">TOTAL PAGAR:</p>
                                            </th>
                                            <th>
                                                <p align="right"><span align="right" id="total_pagar_html">USD
                                                        0.00</span> <input type="hidden" name="total"
                                                        id="total_pagar"></p>
                                            </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>



                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" id="guardar" class="btn btn-primary float-right">Registrar</button>
                        <a href="{{ route('sales.index') }}" class="btn btn-light">
                            Cancelar
                        </a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Registro rápido de cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                {!! Form::open(['route' => 'clients.store', 'method' => 'POST', 'files' => true]) !!}


                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name"
                            aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="dni">ID</label>
                        <input type="number" class="form-control" name="dni" id="dni"
                            aria-describedby="helpId" required>
                    </div>

                    <input type="hidden" name="sale" value="1">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                </div>

                {!! Form::close() !!}

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
            $("#agregar").click(function() {
                agregar();
            });
        });

        var cont = 1;
        total = 0;
        subtotal = [];
        $("#guardar").hide();

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
        console.log(product_id);;


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
            datosProducto = document.getElementById('product_id').value.split('_');
            product_id = datosProducto[0];
            producto = $("#product_id option:selected").text();
            quantity = $("#quantity").val();
            discount = $("#discount").val();
            price = $("#price").val();
            stock = $("#stock").val();
            impuesto = $("#tax").val();
            if (product_id != "" && quantity != "" && quantity > 0 && discount != "" && price != "") {
                if (parseInt(stock) >= parseInt(quantity)) {
                    subtotal[cont] = (quantity * price) - (quantity * price * discount / 100);
                    total = total + subtotal[cont];

                    //  var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="product_id[]" value="' + product_id + '">' + producto + '</td> <td> <input type="hidden" name="price[]" value="' + parseFloat(price).toFixed(2) + '"> <input class="form-control" type="number" value="' + parseFloat(price).toFixed(2) + '" disabled> </td> <td> <input type="hidden" name="discount[]" value="' + parseFloat(discount) + '"> <input class="form-control" type="number" value="' + parseFloat(discount) + '" disabled> </td> <td> <input type="hidden" name="quantity[]" value="' + quantity + '"> <input type="number" value="' + quantity + '" class="form-control" disabled> </td> <td align="right">s/' + parseFloat(subtotal[cont]).toFixed(2) + '</td></tr>';
                    // var fila=`<tr class="selected" id="fila${cont}"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="product_id[]" value="' + product_id + '">' + producto + '</td> <td> <input type="hidden" name="price[]" value="' + parseFloat(price).toFixed(2) + '"> <input class="form-control" type="number" value="' + parseFloat(price).toFixed(2) + '" disabled> </td> <td> <input type="hidden" name="discount[]" value="' + parseFloat(discount) + '"> <input class="form-control" type="number" value="' + parseFloat(discount) + '" disabled> </td> <td> <input type="hidden" name="quantity[]" value="' + quantity + '"> <input type="number" value="' + quantity + '" class="form-control" disabled> </td> <td align="right">s/' + parseFloat(subtotal[cont]).toFixed(2) + '</td></tr>`
                    var fila = `<tr class="selected" id="fila${cont}">
            <td>
                <button type="button" class="btn btn-danger btn-sm" onclick="eliminar(${cont});">
                    <i class="fa fa-times fa-2x"></i>
                </button>
            </td>
            <td>
                <input type="hidden" name="product_id[]" value="${product_id}">${producto}
            </td>

            <td> <input type="hidden" name="price[]" value="${parseFloat(price).toFixed(2)}">
                <input class="form-control" type="number" value="${parseFloat(price).toFixed(2)}" disabled="">
            </td>

            <td>
                <input type="hidden" name="discount[]" value="${parseFloat(discount)}">
                <input class="form-control" type="number" value="${parseFloat(discount)}" disabled="">
            </td>
            <td> <input type="hidden" name="quantity[]" value="${quantity}">
                    <input type="number" value="${quantity}" class="form-control" disabled="">
            </td>
            <td align="right">${parseFloat(subtotal[cont]).toFixed(2)}
            </td>
        </tr>`;

                    cont++;
                    limpiar();
                    totales();
                    evaluar();
                    $('#detalles').append(fila);
                } else {
                    Swal.fire({
                        type: 'error',
                        text: 'La cantidad a vender supera el stock.',
                    })
                }
            } else {
                Swal.fire({
                    type: 'error',
                    text: 'Rellene todos los campos del detalle de la venta.',
                })
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
