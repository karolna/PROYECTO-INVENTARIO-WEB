
<div class="form-group">
    <label for="client_id">Cliente</label>
    <select class="form-control" name="client_id" id="client_id">
        <option value="{{$reserve->client_id}}" selected>{{$reserve->client->name}} {{$reserve->client->lastname}}</option>
    </select>
</div>



  <div class="form-row">
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="product_id">Producto</label>
            {{--  <select class="form-control selectpicker" data-live-search="true" name="product_id" id="product_id">  --}}



            <select class="form-control" name="product_id" id="product_id">

                <optgroup class="product-reserve"  label="Productos de Reserva">
                    @foreach ($reserves as $reserve)
                    <option class="reserve_quantity" attr-tipo-product="product-reserve"  attr-quantity-reserve="{{$reserve->quantity}}" attr-reserve="{{$reserve}}" value="{{$reserve->product->id}}" {{$reserve->product_id==$reserve->product->id ? 'selected' : ''}}>{{$reserve->product->name}}</option>
                   @endforeach
                </optgroup>

                <optgroup class="all_products" label="Agregar más productos a la venta">
                    @foreach ($products as $product)
                     <option  attr-tipo-product="all_products" value="{{$product->id}}" {{$reserve->product_id==$product->id ? 'selected' : ''}}>{{$product->name}}</option>
                    @endforeach
                </optgroup>

            </select>

            <li class="nav-item d-none d-lg-flex" >
                <a style="display: none" class="nav-link" type="button" data-toggle="modal" data-target="#exampleModal-2">
                    <span class="btn btn-warning">+ Agregar productos</span>
                </a>
            </li>
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="">Stock actual</label>
            <input type="text" name="" id="stock" value="{{$reserve->product->stock}}" class="form-control" disabled>
          </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="price">Precio de venta</label>
            <input type="number" value="{{$reserve->product->sell_price}}" class="form-control" name="price" id="price" aria-describedby="helpId" disabled>
        </div>
    </div>
  </div>




  <div class="form-row">
    <div class="form-group col-md-6">
        <div class="form-group  reserve_quantity" attr-quantity-reserve="{{$reserve}}">
            <label for="quantity"  >Cantidad</label>
            <input type="number" value="{{$reserve->quantity}}" class="form-control" name="quantity" id="quantity" aria-describedby="helpId">
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="tax">Impuesto</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">%</span>
            </div>
            <input type="number" class="form-control" name="tax" id="tax" aria-describedby="basic-addon3" value="12">
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="discount">Porcentaje de descuento</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2">%</span>
            </div>
            <input type="number" class="form-control" name="discount" id="discount" aria-describedby="basic-addon2" value="0">
        </div>
    </div>
  </div>







<div class="form-group">
    <button type="button" id="agregar" class="btn btn-primary float-right">Agregar producto</button>
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
