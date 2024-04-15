@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Tipos')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<h4>Tipos de Dispositivos</h4>
<a href="{{route('types.create') }}" type="button" class="btn btn-primary mb-2">Crear Tipo</a href="{{route('types.create') }}">

<!-- Basic Bootstrap Table -->
<div class="card">
    <h5 class="card-header">Table Basic</h5>
    <div class="table-responsive text-nowrap">

      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Activo</th>
            <th>Creado en</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($types as $type)
            <tr>
                <td>{{ $type->id }}</td>
                <td>{{ $type->name }}</td>
                <td>
                  @if ($type->active)
                  <a href="{{route('types.switch', $type->id) }}">
                  <span class="badge bg-success">Activo</span></a>
                  @else
                  <a href="{{route('types.switch', $type->id) }}">
                  <span class="badge bg-danger">Inactivo</span></a>
                  @endif
                </td>
                <td>{{ $type->created_at }}</td>
                <td>
                  <a href="{{ route('types.edit', $type->id) }}">Editar</a> | 
                  <a href="{{ route('types.destroy', $type->id) }}">Borrar</a>
    {{--               <form action="{{ route('types.destroy', $type->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                </form> --}}
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
  

@endsection





