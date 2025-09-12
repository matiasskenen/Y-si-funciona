@extends('layouts.app')

@section('content')
  <h1>Lista de Productos</h1>

  <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Agregar Producto</a>

  <ul class="list-group">
    @forelse ($productos as $producto)

    <li class="list-group-item d-flex justify-content-between align-items-center">
      {{ $producto->nombre }} - {{ $producto->precio }}

      <span>
        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-sm">Editar</a>
        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
        </form>
      </span>

    </li>

    @empty
    <li class="list-group-item">No hay productos disponibles.</li>
    @endforelse
  </ul>
@endsection
