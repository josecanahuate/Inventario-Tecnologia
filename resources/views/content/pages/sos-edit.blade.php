@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Editar Sistema Operativo')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Editar Sistema Operativo</h5>
              <small class="text-muted float-end">Merged input group</small>
            </div>
            <div class="card-body">
              <form method="POST" action="{{route('sos.update', $so_id) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="type_id" value="{{ $so->id }}">
                
                <div class="mb-3">
                  <label for="name" class="form-label" for="basic-icon-default-fullname">Nombre</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                    <input type="text" id="name" name="name" value="{{ $so->name }}" class="form-control" />
                  </div>

                  @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="version" class="form-label" for="basic-icon-default-fullname">Version</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                    <input type="text" id="version" name="version" value="{{ $so->version }}" class="form-control" />
                  </div>

                  @error('version')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="description" class="form-label" for="basic-icon-default-fullname">Descripción</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                    <input type="text" id="description" value="{{ $so->description }}" name="description" class="form-control" />
                  </div>

                  @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <button type="submit" href="/sos" class="btn btn-primary">Volver</button>

              </form>
            </div>
          </div>
    </div>
</div>


@endsection
