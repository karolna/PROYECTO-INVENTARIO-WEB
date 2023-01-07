@extends('layouts.admin')
@section('title','Registrar proveedor')
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
                <li class="breadcrumb-item"><a href="{{route('providers.index')}}">Proveedores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de proveedores</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de proveedores</h4>
                    </div>
                    {!! Form::open(['route'=>'providers.store', 'method'=>'POST']) !!}

                    {{--  'name', 'email','ruc_number', 'address','phone',  --}}

                    <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" required>
                    </div>

                    <div class="form-group">
                      <label for="email">Correo electrónico</label>
                      <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="ejemplo@gmail.com" required>
                    </div>

                    <div class="form-group">
                        <label for="ruc_number">Numero de RUC</label>
                        <input type="number" class="form-control" name="ruc_number" id="ruc_number" aria-describedby="helpId" required>
                        <button type="button" class="btn btn-light" name="button" onclick="validar()"><small id="helpId" class="form-text text-muted">Valida primero tu Cédula</small>
                        </button>
                    </div>


                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" class="form-control" name="address" id="address" aria-describedby="helpId" required>
                    </div>


                    <div class="form-group">
                        <label for="phone">Numero de contacto</label>
                        <input type="number" class="form-control" name="phone" id="phone" aria-describedby="helpId" required>
                    </div>

                    <button type="submit"  id="validar-cedula" class="btn btn-primary mr-2"  onclick="validar()" style=" display:none;"  >Registrar</button>
                     <a href="{{route('providers.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                     {!! Form::close() !!}
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$providers->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
<script type="text/javascript">
function validar() {


       numero = document.getElementById('ruc_number').value;
     /* alert(numero); */

       var suma = 0;
       var residuo = 0;
       var pri = false;
       var pub = false;
       var nat = false;
       var numeroProvincias = 22;
       var modulo = 11;

       /* Verifico que el campo no contenga letras */
       var ok=1;
       for (i=0; i<numero.length && ok==1 ; i++){
          var n = parseInt(numero.charAt(i));
          if (isNaN(n)) ok=0;
       }
       if (ok==0){
          alert("No puede ingresar caracteres en el número");
          return false;
       }

       if (numero.length < 10 ){
          alert('El número ingresado no es válido');
          return false;
       }

       /* Los primeros dos digitos corresponden al codigo de la provincia */
       provincia = numero.substr(0,2);
       if (provincia < 1 || provincia > numeroProvincias){
          alert('El código de la provincia (dos primeros dígitos) es inválido');
      return false;
       }

       /* Aqui almacenamos los digitos de la cedula en variables. */
       d1  = numero.substr(0,1);
       d2  = numero.substr(1,1);
       d3  = numero.substr(2,1);
       d4  = numero.substr(3,1);
       d5  = numero.substr(4,1);
       d6  = numero.substr(5,1);
       d7  = numero.substr(6,1);
       d8  = numero.substr(7,1);
       d9  = numero.substr(8,1);
       d10 = numero.substr(9,1);

       /* El tercer digito es: */
       /* 9 para sociedades privadas y extranjeros   */
       /* 6 para sociedades publicas */
       /* menor que 6 (0,1,2,3,4,5) para personas naturales */

       if (d3==7 || d3==8){
          alert('El tercer dígito ingresado es inválido');
          return false;
       }

       /* Solo para personas naturales (modulo 10) */
       if (d3 < 6){
          nat = true;
          p1 = d1 * 2;  if (p1 >= 10) p1 -= 9;
          p2 = d2 * 1;  if (p2 >= 10) p2 -= 9;
          p3 = d3 * 2;  if (p3 >= 10) p3 -= 9;
          p4 = d4 * 1;  if (p4 >= 10) p4 -= 9;
          p5 = d5 * 2;  if (p5 >= 10) p5 -= 9;
          p6 = d6 * 1;  if (p6 >= 10) p6 -= 9;
          p7 = d7 * 2;  if (p7 >= 10) p7 -= 9;
          p8 = d8 * 1;  if (p8 >= 10) p8 -= 9;
          p9 = d9 * 2;  if (p9 >= 10) p9 -= 9;
          modulo = 10;
       }

       /* Solo para sociedades publicas (modulo 11) */
       /* Aqui el digito verficador esta en la posicion 9, en las otras 2 en la pos. 10 */
       else if(d3 == 6){
          pub = true;
          p1 = d1 * 3;
          p2 = d2 * 2;
          p3 = d3 * 7;
          p4 = d4 * 6;
          p5 = d5 * 5;
          p6 = d6 * 4;
          p7 = d7 * 3;
          p8 = d8 * 2;
          p9 = 0;
       }

       /* Solo para entidades privadas (modulo 11) */
       else if(d3 == 9) {
          pri = true;
          p1 = d1 * 4;
          p2 = d2 * 3;
          p3 = d3 * 2;
          p4 = d4 * 7;
          p5 = d5 * 6;
          p6 = d6 * 5;
          p7 = d7 * 4;
          p8 = d8 * 3;
          p9 = d9 * 2;
       }

       suma = p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9;
       residuo = suma % modulo;

       /* Si residuo=0, dig.ver.=0, caso contrario 10 - residuo*/
       digitoVerificador = residuo==0 ? 0: modulo - residuo;

       /* ahora comparamos el elemento de la posicion 10 con el dig. ver.*/
       if (pub==true){
          if (digitoVerificador != d9){
            const btnvalidar = document.getElementById('validar-cedula');
   btnvalidar.style.display = "none";
   return;
          }
          /* El ruc de las empresas del sector publico terminan con 0001*/
          if ( numero.substr(9,4) != '0001' ){
            const btnvalidar = document.getElementById('validar-cedula');
   btnvalidar.style.display = "none";
   return;
          }
       }
       else if(pri == true){
          if (digitoVerificador != d10){
            const btnvalidar = document.getElementById('validar-cedula');
   btnvalidar.style.display = "none";
   return;
          }
          if ( numero.substr(10,3) != '001' ){
            const btnvalidar = document.getElementById('validar-cedula');
   btnvalidar.style.display = "none";
   return;
          }
       }

       else if(nat == true){
          if (digitoVerificador != d10){
            const btnvalidar = document.getElementById('validar-cedula');
   btnvalidar.style.display = "none";
   return;
          }
          if (numero.length >10 && numero.substr(10,3) != '001' ){
            const btnvalidar = document.getElementById('validar-cedula');
   btnvalidar.style.display = "none";
   return;
          }
       }
       const btnvalidar = document.getElementById('validar-cedula');
   btnvalidar.style.display = "inline";
   return;
    }


 </script>
@endsection
