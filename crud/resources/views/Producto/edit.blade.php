@extends('layouts.dashboard')

@section('content')
<h1>Editar Producto</h1>

<form action="{{ route('productos.update', $producto->id) }}" method="POST">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}" required>
  </div>

  <div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="{{ $producto->precio }}" required>
  </div>

  <div class="mb-3">
    <label for="stock" class="form-label">Stock</label>
    <input type="number" class="form-control" id="stock" name="stock" value="{{ $producto->stock }}" required>
  </div>

  <button type="submit" class="btn btn-primary">Actualizar</button>
  <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection

