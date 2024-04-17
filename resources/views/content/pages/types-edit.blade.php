@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Crear Usuario')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Crear Tipo Nuevo</h5>
              <small class="text-muted float-end">Merged input group</small>
            </div>
            <div class="card-body">
              <form method="POST" action="{{route('types.update', $type_id) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="type_id" value="{{ $type->id }}">
                <div class="mb-3">
                  <label for="name" class="form-label" for="basic-icon-default-fullname">Nombre</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                    <input type="text" id="name" name="name" value="{{ $type->name }}" class="form-control" />
                  </div>

                  @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="description" class="form-label" for="basic-icon-default-fullname">Descripción</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                    <input type="text" id="description" value="{{ $type->description }}" name="description" class="form-control" />
                  </div>

                  @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

{{--                 <div class="mb-3">
                  <label for="selectpickerIcons" class="form-label">Icono</label>
                  <select class="selectPicker w-100 show-tick form-select" name="icon" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default">
                      <option value="bx bx-tv" data-icon="bx bx-tv" {{ $type->icon == 'bx bx-tv' ? 'selected' : '' }}>Monitor</option>
                      <option value="bx bx-laptop" data-icon="bx bx-laptop" {{ $type->icon == 'bx bx-laptop' ? 'selected' : '' }}>Ordenador</option>
                      <option value="bx bx-printer" data-icon="bx bx-printer" {{ $type->icon == 'bx bx-printer' ? 'selected' : '' }}>Impresora</option>
                      <option value="bx bx-mobile" data-icon="bx bx-mobile" {{ $type->icon == 'bx bx-mobile' ? 'selected' : '' }}>Móvil</option>
                      <option value="bx bx-hdd" data-icon="bx bx-hdd" {{ $type->icon == 'bx bx-hdd' ? 'selected' : '' }}>Router/Switch</option>
                  </select>
              </div> --}}

              {{-- opcion de isma --}}
              <div class="mb-3">
                <label for="selectpickerIcons" class="form-label">Icono</label>
                <select class="selectPicker w-100 show-tick form-select" name="icon" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check">
                    <option value="bx bx-tv" @if($type->icon == 'bx bx-tv') selected @endif data-icon="bx bx-tv">Monitor</option>
                    <option value="bx bx-laptop" @if($type->icon == 'bx bx-laptop') selected @endif data-icon="bx bx-laptop">Ordenador</option>
                    <option value="bx bx-printer" @if($type->icon == 'bx bx-printer') selected @endif data-icon="bx bx-printer">Impresora</option>
                    <option value="bx bx-mobile" @if($type->icon == 'bx bx-mobile') selected @endif data-icon="bx bx-mobile" >Móvil</option>
                    <option value="bx bx-hdd" @if($type->icon == 'bx bx-hdd') selected @endif data-icon="bx bx-hdd" >Router/Switch</option>
                </select>
            </div>
              
              
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <button type="submit" href="/types" class="btn btn-primary">Volver</button>

              </form>
            </div>
          </div>
    </div>
</div>


@endsection
