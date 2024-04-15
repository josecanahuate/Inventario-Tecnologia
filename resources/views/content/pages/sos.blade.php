@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Sistemas Operativos')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<h4>Tipos de Dispositivos</h4>
<a href="{{route('sos.create') }}" so="button" class="btn btn-primary mb-2">Crear Tipo</a href="{{route('sos.create') }}">

<!-- Basic Bootstrap Table -->
<div class="card">
    <h5 class="card-header">Table Basic</h5>
    <div class="table-responsive text-nowrap">

      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Version</th>
            <th>Activo</th>
            <th>Creado en</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($sos as $so)
            <tr>
                <td>{{ $so->id }}</td>
                <td>{{ $so->name }}</td>
                <td>{{ $so->version }}</td>
                <td>
                  @if ($so->active)
                  <a href="{{route('sos.switch', $so->id) }}">
                  <span class="badge bg-success">Activo</span></a>
                  @else
                  <a href="{{route('sos.switch', $so->id) }}">
                  <span class="badge bg-danger">Inactivo</span></a>
                  @endif
                </td>
                <td>{{ $so->created_at }}</td>
                <td>
                  <a href="{{ route('sos.edit', $so->id) }}">Editar</a> | 
                  <a href="{{ route('sos.destroy', $so->id) }}">Borrar</a>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
  

@endsection





