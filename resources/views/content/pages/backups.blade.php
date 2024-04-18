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
                  <a href="{{ $backup->url }}">Download</a> | 
                  <a href="{{ route('backups.destroy', $backup->id) }}">Borrar</a>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
  

@endsection





