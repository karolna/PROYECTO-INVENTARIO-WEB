




  <div class="form-row">

    <div class="form-group col-md-3">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" required pattern="[A-Za-z]{5,40}" title="Letras. Tamaño mínimo: 5. Tamaño máximo: 40">
        </div>
    </div>
    <div class="form-group col-md-3 ">
        <div class="form-group">
            <label for="phone">Telefono</label>
            <input type="number" class="form-control" name="phone" id="phone" aria-describedby="helpId" required pattern="[0-9]{9,10}"title="Números. Tamaño mínimo: 9. Tamaño máximo: 10">
        </div>
    </div>
    <div class="form-group col-md-3">
        <div class="form-group">
            <label for="dni">CÉDULA</label>
            <input type="number" class="form-control" name="dni" id="dni" aria-describedby="helpId" required pattern="[0-9]{10} " title="Números. Tamaño: 10">

        </div>
    </div>

  </div>




  <div class="form-row">
    <div class="form-group col-md-3">
        <div class="form-group">
            <label for="product_id">Producto</label>
            {{--  <select class="form-control selectpicker" data-live-search="true" name="product_id" id="product_id">  --}}
            <select class="form-control" name="product_id" id="product_id" >
                <option value="" disabled selected>Selecccione un producto</option>
                @foreach ($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="form-group">
            <label for="">Cantidad actual</label>
            <input type="text" name="" id="stock" value="" class="form-control" disabled required>
          </div>
    </div>
    <div class="form-group col-md-2">
        <div class="form-group">
            <label for="price">Precio(sin imp)</label>
            <input type="text" class="form-control" name="price" id="price" aria-describedby="helpId" disabled >
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input type="number" class="form-control" name="quantity" id="quantity" aria-describedby="helpId" required title="Permitidos números">
            <button type="button" class="agregar btn btn-light float-right">Validar cantidad</button>

        </div>
    </div>

  </div>

