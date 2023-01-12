<div class="form-group">
  <label for="name">Nombre</label>
  <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
</div>
<div class="form-group">
  <label for="description">Descripción</label>
  <textarea class="form-control" name="description" id="description" rows="3"></textarea>
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
