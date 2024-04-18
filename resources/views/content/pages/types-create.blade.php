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
                <form method="POST" action="{{route('types.store') }}">
                  @csrf
                <div class="mb-3">
                  <label for="name" class="form-label" for="basic-icon-default-fullname">Nombre</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                    <input type="text" id="name" name="name" class="form-control" id="basic-icon-default-fullname" placeholder="Nombre del Equipo" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                  </div>
                  @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="description" class="form-label" for="basic-icon-default-fullname">Descripción</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                    <input type="text" id="description" name="description" class="form-control" id="basic-icon-default-fullname" placeholder="Descripcion del Equipo" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                  </div>
                  @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="selectpickerIcons" class="form-label">Icono</label>
                  <select class="selectPicker w-100 show-tick form-select" name="icon" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="">
                      <option value="Monitor" data-icon="bx bx-tv">Monitor<i class='bx bx-laptop'></i></option>
                      <option value="Ordenador" data-icon="bx bx-laptop">Ordenador</option>
                      <option value="Impresora" data-icon="bx bx-printer">Impresora</option>
                      <option value="Móvil" data-icon="bx bx-mobile">Móvil</option>
                      <option value="Router/Switch" data-icon="bx bx-hdd">Router/Switch</option>
                  </select>
              </div>

            
            
                <button type="submit" class="btn btn-primary">Guardar</button>
              </form>
            </div>
          </div>
    </div>
</div>
@endsection


{{-- @section('scripts')
<script>
  $(document).ready(function(){
      $('#selectpickerIcons').on('changed.bs.select', function (e) {
          $('#icono').val($(this).val());
      }).selectpicker();
  });
</script>
@stop --}}