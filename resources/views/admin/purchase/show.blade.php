@extends('layouts.admin')
@section('title','Detalles de Entrada de inventario')
@section('styles')

@endsection
@section('create')

@endsection
@section('options')

@endsection
@section('preference')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Detalles de entrada de inventario
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="#">Entrada de inventario</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalles de entrada de inventario</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group row">
                        <div class="col-md-4 text-center">
                            <label class="form-control-label" for="nombre"><strong>Proveedor</strong></label>
                            <p>{{$purchase->provider->name}}</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-control-label" for="num_compra"><strong>Número entrada de inventario</strong></label>
                            <p>{{$purchase->id}}</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-control-label" for="num_compra"><strong>Responsable del ingreso de inventario</strong></label>
                            <p>{{$purchase->user->name}}</p>
                        </div>
                    </div>
                    <br /><br />
                    <div class="form-group row ">
                        <h4 class="card-title ml-3">Detalles de entrada de inventario</h4>
                        <div class="table-responsive col-md-12">
                            <table id="detalles" class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio (USD)</th>
                                        <th>Cantidad</th>
                                        <th>SubTotal (USD)</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">
                                            <p align="right">SUBTOTAL:</p>
                                        </th>
                                        <th>
                                            <p align="right">s/{{number_format($subtotal,2)}}</p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">
                                            <p align="right">TOTAL IMPUESTO ({{$purchase->tax}}%):</p>
                                        </th>
                                        <th>
                                            <p align="right">s/{{number_format($subtotal*$purchase->tax/100,2)}}</p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">
                                            <p align="right">TOTAL:</p>
                                        </th>
                                        <th>
                                            <p align="right">s/{{number_format($purchase->total,2)}}</p>
                                        </th>
                                    </tr>

                                </tfoot>
                                <tbody>
                                    @foreach($purchaseDetails as $purchaseDetail)
                                    <tr>
                                        <td>{{$purchaseDetail->product->name }}</td>
                                        <td>s/{{$purchaseDetail->price}}</td>
                                        <td>{{$purchaseDetail->quantity}}</td>
                                        <td>s/{{number_format($purchaseDetail->quantity*$purchaseDetail->price,2)}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>



                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('purchases.index')}}" class="btn btn-primary float-right">Regresar</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/profile-demo.js') !!}
{!! Html::script('melody/js/data-table.js') !!}
@endsection
