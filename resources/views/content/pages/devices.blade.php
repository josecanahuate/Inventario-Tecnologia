@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Equipos')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<h4>Equipos</h4>
<a href="{{route('devices.create') }}" type="button" class="btn btn-primary mb-2 mr-2">Crear Equipos</a href="{{route('devices.create') }}">
<a href="{{route('devices.export') }}" type="button" class="btn btn-success mb-2">Exportar a Excel</a href="{{route('devices.create') }}">

<!-- Basic Bootstrap Table -->
<div class="card">
    <div class="table-responsive text-nowrap">

      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Activo</th>
            <th>Creado en</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($devices as $device)
            <tr>
                <td>{{ $device->id }}</td>
                <td>{{ $device->name }}</td>
                <td>{{ $device->icon }}</td>
                <td>
                  @if ($device->active)
                  <a href="{{route('devices.switch', $device->id) }}">
                  <span class="badge bg-success">Activo</span></a>
                  @else
                  <a href="{{route('devices.switch', $device->id) }}">
                  <span class="badge bg-danger">Inactivo</span></a>
                  @endif
                </td>
                <td>{{ $device->created_at }}</td>
                <td>
                  <a href="{{ route('devices.edit', $device->id) }}">Editar</a> | 
                  <a href="{{ route('devices.destroy', $device->id) }}">Borrar</a>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
  

@endsection





