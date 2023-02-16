@extends('layouts.admin')
@section('title','Registro de entrada de inventario')
@section('styles')
{!! Html::style('select/dist/css/bootstrap-select.min.css') !!}
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Edición de entrada de inventario
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('purchases.index')}}">Entrada de inventario</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de entrada de inventario</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                {!! Form::model($purchase,['route'=>['purchases.update',$purchase], 'method'=>'PUT','files' => true]) !!}
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de entrada de inventario</h4>
                    </div>

                   {{-- @include('admin.purchase._form')--}}

<div class="form-row">
    <div class="form-group col-md-8">
        <div class="form-group">
            <label for="provider_id">Proveedor</label>
            <select class="form-control" name="provider_id" id="provider_id">
                @foreach ($providers as $provider)
                <option value="{{$provider->id}}"> {{$provider->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group col-md-4">
        <label for="tax">Impuesto</label>
        <div class="input-group">

            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">%</span>
            </div>
            <input type="number" class="form-control" name="tax" id="tax" aria-describedby="basic-addon3"
                readonly value="12">
        </div>
    </div>
</div>


<div class="form-row">
    <div class="form-group col-md-6">
        <div class="form-group">
            <label for="product_id">Producto</label>
            {{--  <select class="form-control selectpicker" data-live-search="true" name="product_id" id="product_id">  --}}
            <select class="form-control" name="product_id" id="product_id">
                <option value="" disabled selected>Selecccione un producto</option>
                @foreach ($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input type="number" class="form-control" name="quantity" id="quantity" aria-describedby="helpId">
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="form-group">
            <label for="price">Precio</label>
            <input type="number" class="form-control" name="price" id="price" aria-describedby="helpId">
        </div>
    </div>
</div>
<div class="form-group">
    <button type="button" id="agregar" class="btn btn-primary float-right">Agregar producto</button>
</div>
<div class="form-group">
    <h4 class="card-title">Detalles de entrada de inventario</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio(USD)</th>
                    <th>Cantidad</th>
                    <th>SubTotal(USD)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">USD 0.00</span> </p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL IMPUESTO (12%):</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">USD 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL PAGAR:</p>
                    </th>
                    <th>
                        <p align="right"><span align="right" id="total_pagar_html">USD 0.00</span> <input type="hidden"
                                name="total" id="total_pagar"></p>
                    </th>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

                    {{-- @include('admin.purchase._form')--}}


                </div>
                <div class="card-footer text-muted">
                     <button type="submit" class="btn btn-primary mr-2">Editar</button>
                     <a href="{{route('purchases.index')}}" class="btn btn-light">
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
    $(document).ready(function () {
        $("#agregar").click(function () {
            agregar();
        });
    });

    var cont = 0;
    total = 0;
    subtotal = [];

    $("#guardar").hide();


    var product_id = $('#product_id');
    product_id.change(function(){
        $.ajax({
            url: "{{route('get_products_by_id')}}",
            method: 'GET',
            data:{
                product_id: product_id.val(),
            },
            success: function(data){
                $("#code").val(data.code);
            }
        });
    });
    $(obtener_registro());
    function obtener_registro(code){
        $.ajax({
            url: "{{route('get_products_by_barcode')}}",
            type: 'GET',
            data:{
                code: code
            },
            dataType: 'json',
            success:function(data){
                console.log(data);
                $("#product_id").val(data.id);
            }
        });
    }
    $(document).on('keyup', '#code', function(){
        var valorResultado = $(this).val();
        if(valorResultado!=""){
            obtener_registro(valorResultado);
        }else{
            obtener_registro();
        }
    })


    function agregar() {

        product_id = $("#product_id").val();
        producto = $("#product_id option:selected").text();
        quantity = $("#quantity").val();
        price = $("#price").val();
        impuesto = $("#tax").val();

        if (product_id != "" && quantity != "" && quantity > 0 && price != "") {
            subtotal[cont] = quantity * price;
            total = total + subtotal[cont];
            var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-times"></i></button></td> <td><input type="hidden" name="product_id[]" value="'+product_id+'">'+producto+'</td> <td> <input type="hidden" id="price[]" name="price[]" value="' + price + '"> <input class="form-control" type="number" id="price[]" value="' + price + '" disabled> </td>  <td> <input type="hidden" name="quantity[]" value="' + quantity + '"> <input class="form-control" type="number" value="' + quantity + '" disabled> </td> <td align="right">s/' + subtotal[cont] + ' </td></tr>';
            cont++;
            limpiar();
            totales();
            evaluar();
            $('#detalles').append(fila);
        } else {
            Swal.fire({
                type: 'error',
                text: 'Rellene todos los campos del detalle de la entrada de inventario',

            })
        }
    }

    function limpiar() {
        $("#quantity").val("");
        $("#price").val("");
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
