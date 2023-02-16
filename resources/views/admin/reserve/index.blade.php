@extends('layouts.admin')
@section('title','Gestión de Reserva')
@section('styles')
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
    <a class="nav-link" href="{{route('reserve.create')}}">
      <span class="btn btn-primary">+ Registrar reserva</span>
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
                <li class="breadcrumb-item active" aria-current="page">Reservas</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Reservas</h4>
                        {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              </div>
                          </div>
                    </div>

                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Cédula</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Celular</th>
                                    <th>Cant. Reservada</th>
                                    <th>Producto</th>
                                    <th>Estado de reserva</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reserves as $reserve)
                                <tr>

                                    <td>
                                        {{\Carbon\Carbon::parse($reserve->reserve_date)->format('Y-m-d')}}
                                    </td>

                                    <td>{{$reserve->client->dni}}</td>
                                    <td>{{$reserve->client->name}}</td>
                                    <td>{{$reserve->client->lastname}}</td>
                                    <td>{{$reserve->client->phone}}</td>
                                    <td>{{$reserve->quantity}}</td>
                                    <td>{{$reserve->product->name}}</td>

                                   @if ($reserve->status == 'EN ESPERA')
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="{{route('change.status.reserves', $reserve)}}" title="Editar">
                                            EN ESPERA   <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="jsgrid-button jsgrid-edit-button" href="{{route('createSale.sales', $reserve)}}" title="Generar salida de inventario">
                                             <i class="fas fa-file">Generar salida de inventario </i>
                                        </a>
                                    </td>

                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-success" href="{{route('change.status.reserves', $reserve)}}" title="Editar">
                                            ATENDIDO   <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="jsgrid-button jsgrid-edit-button" href="{{route('reserve.pdf', $reserve->id)}}"  title="Comprobante">
                                             <i class="fas fa-file">Generar Comprobante</i>
                                        </a>
                                    </td>

                                    @endif



                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$sales->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection
