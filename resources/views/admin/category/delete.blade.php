@extends('layouts.admin')
@section('title','Editar categoría')
@section('styles')
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
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorías</a></li>
                <li class="breadcrumb-item active" aria-current="page">Eliminar categoría</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Eliminar categoría</h4>
                    </div>
                    {!! Form::model($category,['route'=>['categories.update',$category], 'method'=>'PUT']) !!}


                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" readonly name="name" id="name" value="{{$category->name}}" class="form-control" placeholder="Nombre" required>
                        <input type="hidden" readonly name="deleted_at" id="deleted_at" value="{{$category->deleted_at}}" class="form-control"  value="2017-06-01">
                      </div>
                      <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" readonly name="description" id="description" rows="3">{{$category->description}}</textarea>
                    </div>


                     <button type="submit" class="btn btn-primary mr-2">Eliminar</button>
                     <a href="{{route('categories.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                     {!! Form::close() !!}
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$categories->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection
