@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Backups: Disaster Recovery')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<h4>Backups: Disaster Recovery</h4>
@role('admin')
<a href="{{route('backups.create') }}" type="button" class="btn btn-primary mb-2">Crear Nuevo Backup</a href="{{route('backups.create') }}">

<!-- Basic Bootstrap Table -->
<div class="card">
    <div class="table-responsive text-nowrap">

      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Estado</th>
            <th>Creado en</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($backups as $backup)
            <tr>
                <td>{{ $backup->id }}</td>
                <td>{{ $backup->status }}</td>
                <td>{{ $backup->created_at }}</td>
                <td>
                  <a href="{{ Storage::url($report->url) }}">Download</a> | 
                  <a href="{{ route('backups.destroy', $backup->id) }}">Borrar</a>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
  @else
  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">No tienes permisos para ver esta página</h4>
    <p>Por favor, contacta con el administrador del sistema.</p>
  </div>
  @endrole
@endsection





