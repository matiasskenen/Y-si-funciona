@extends('layouts.dashboard')

@section('content')
  <!--header-->
  <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center pb-6 border-b border-gray-200 mb-6">
    <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4 sm:mb-0">Gestion de productos</h1>
    <div class="flex items-center space-x-4">
      <!-- Search bar -->
       <form action="{{ route('productos.index') }}" method="GET" class="flex space-x-2">
        <input type="text" name="search" placeholder="Buscar productos..." value="{{ request('search') }}" class="py-2 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-blue-500 transition-all w-full sm:w-auto">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
          <i class="fa fa-search"></i>
        </button>
      </form>


      <!--ordenar-->
      <div class="flex space-x-2">
        <a href="{{ route('productos.index', ['sort' => 'precio']) }}" class="flex items-center py-2 px-4 bg-gray-200 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-300 transition-colors">
          <i class="fas fa-sort-amount-down-alt mr-2"></i> Precio
        </a>
        <a href="{{ route('productos.index', ['sort' => 'stock']) }}" class="flex items-center py-2 px-4 bg-gray-200 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-300 transition-colors">
          <i class="fas fa-sort-numeric-down-alt mr-2"></i> Stock
        </a>
      </div>


      <!-- Agregar producto -->
       <a href="{{ route('productos.create') }}" class="bg-blue-600 text-white py-3 px-6 rounded-lg text-sm font-semibold hover:bg-blue-700 transition-colors hidden sm:inline-block">
        Agregar producto
      </a>
    </div>
  </div>

  <!--tabla-->
  <div class="overflow-x-auto">
    <table class="min-w-full leading-normal">
      <thead>
        <tr class="text-xs font-semibold tracking-wider text-left text-gray-500 uppercase border-b-2 border-gray-200">
          <th class="px-5 py-3">ID</th>
          <th class="px-5 py-3">Nombre</th>
          <th class="px-5 py-3">Precio</th>
          <th class="px-5 py-3">Stock</th>
          <th class="px-5 py-3 text-center">Acciones</th>
        </tr>
      </thead>
        <tbody>
          @forelse ($productos as $producto)
            <tr class="bg-white hover:bg-gray-50 transition-colors">
              <td class="px-5 py-5 text-sm border-b border-gray-200">{{ $producto->id }}</td>
              <td class="px-5 py-5 text-sm border-b border-gray-200">{{ $producto->nombre }}</td>
              <td class="px-5 py-5 text-sm border-b border-gray-200">${{ number_format($producto->precio, 2) }}</td>
              <td class="px-5 py-5 text-sm border-b border-gray-200">{{ $producto->stock }}</td>
              <td class="px-5 py-5 text-sm border-b border-gray-200 text-center">
                <div class="flex justify-center space-x-2">
                  <a href="{{ route('productos.edit', $producto->id) }}" class="px-3 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="5" class="px-5 py-5 text-center text-gray-500">No se encontraron productos.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
  </div>

  <div class="flex justify-between items-center mt-6 border-t border-gray-200 pt-6">
    <div>
      Mostrando {{ $productos->firstItem() }} a {{ $productos->lastItem() }} de {{ $productos->total() }} productos
    </div>
    <div>
      {{ $productos->links() }}
    </div>
  </div>
@endsection

