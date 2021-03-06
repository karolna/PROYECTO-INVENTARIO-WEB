@extends('layouts.admin')
@section('title','Registrar cliente')
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
            Registro de clientes
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de clientes</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de clientes</h4>
                    </div>
                    {!! Form::open(['route'=>'clients.store', 'method'=>'POST','files' => true]) !!}


                    @include('admin.client._form')


                     <button type="submit"  id="validar-cedula" class="btn btn-primary mr-2"  onclick="validar()" style=" display:none;"  >Registrar</button>
                     <a href="{{route('clients.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                     {!! Form::close() !!}
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$clients->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function validar() {
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
   const btnvalidar = document.getElementById('validar-cedula');
   btnvalidar.style.display = "inline";
   }
   else{
   const btnvalidar = document.getElementById('validar-cedula');
   btnvalidar.style.display = "none";
   }


 }else{
    const btnvalidar = document.getElementById('validar-cedula');
    btnvalidar.style.display = "none";
 }
}else{
 //imprimimos en consola si la cedula tiene mas o menos de 10 digitos
 const btnvalidar = document.getElementById('validar-cedula');
 btnvalidar.style.display = "none";
}
}

  </script>
@endsection
