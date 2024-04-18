@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Reportes')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<h4>Reportes</h4>
@role('admin')
<a href="{{route('reports.create') }}" type="button" class="btn btn-primary mb-2">Crear Nuevo Report</a href="{{route('reports.create') }}">

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
            @foreach ($reports as $report)
            <tr>
                <td>{{ $report->id }}</td>
                <td>{{ $report->status }}</td>
                <td>{{ $report->created_at }}</td>
                <td>
                  <a href="{{ Storage::url($report->url) }}" target="blank_">Download</a> |
                  <a href="{{ route('reports.destroy', $report->id) }}">Borrar</a>
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





