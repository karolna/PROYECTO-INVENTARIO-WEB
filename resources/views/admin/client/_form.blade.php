{{--  <div class="form-row">
    <div class="form-group col-md-6">

    </div>
    <div class="form-group col-md-4">

    </div>
    <div class="form-group col-md-2">

    </div>
</div>  --}}
<div class="form-row">
    <div class="form-group col-md-3">
        <div class="form-group">
            <label for="dni">CÉDULA</label>
            <input type="number" class="form-control" name="dni" id="dni" aria-describedby="helpId" required>

            <button type="button" class="btn btn-light" name="button" onclick="validar()"><small id="helpId" class="form-text text-muted">Valida primero tu Cédula</small>
            </button>
        </div>
    </div>
    <div class="form-group col-md-3">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" required>
        </div>
    </div>
    <div class="form-group col-md-3">
        <div class="form-group">
            <label for="lastname">Apellido</label>
            <input type="text" class="form-control" name="lastname" id="lastname" aria-describedby="helpId" required>
        </div>
    </div>
    <div class="form-group col-md-3">
        <div class="form-group">
            <label for="ruc">RUC</label>
            <input type="number" class="form-control" name="ruc" id="ruc" aria-describedby="helpId">
            <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
        </div>
    </div>

</div>
<div class="form-row">



    <div class="form-group col-md-3">
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId">
            <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
        </div>
    </div>



    <div class="form-group col-md-3">
        <div class="form-group">
            <label for="phone">Teléfono \ Celular</label>
            <input type="number" class="form-control" name="phone" id="phone" aria-describedby="helpId">
            <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
        </div>
    </div>
     <div class="form-group col-md-3">
    <div class="form-group">
        <label for="address">Dirección</label>
        <input type="text" class="form-control" name="address" id="address" aria-describedby="helpId">
        <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
    </div>
      </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
