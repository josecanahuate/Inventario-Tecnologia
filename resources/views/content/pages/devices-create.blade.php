@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Crear Equipo')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Crear Equipo Nuevo</h5>
              <small class="text-muted float-end">Merged input group</small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('devices.store') }}">
                  @csrf

              {{-- FORM DISPOSITIVO ICONO--}}
              <div class="mb-3">
                <label for="selectpickerIcons" class="form-label">Icono</label>
                <select class="selectPicker w-100 show-tick form-select" name="type_id" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default">
                    @foreach ($types as $type)
                    <option data-icon="bx bx-{{$type->icon}}" value="{{$type->id}}">{{$type->name}}</option> 
                    @endforeach
                </select>
              </div>

              {{-- FORM SISTEMA OPERATIVO --}}
              <div class="mb-3">
                <label for="selectpickerOS" class="form-label">Sistema Operativo</label>
                <select class="selectPicker w-100 show-tick form-select" name="sos_id" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default">
                    @foreach ($sos as $so)
                    <option value="{{$so->id}}">{{$so->name}}</option> 
                    @endforeach
                </select>
              </div>


                <div class="mb-3">
                  <label for="name" class="form-label" for="basic-icon-default-fullname">Nombre</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="name" name="name" class="form-control" id="basic-icon-default-fullname" placeholder="Nombre del Equipo" />
                  </div>
                  @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="name" class="form-label" for="basic-icon-default-fullname">Descripción</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="description" name="description" class="form-control" id="basic-icon-default-fullname" placeholder="Descripción del Equipo" />
                  </div>
                  @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="serial_number" class="form-label" for="basic-icon-default-fullname">Número de Serie</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="serial_number" name="serial_number" class="form-control" id="basic-icon-default-fullname" placeholder="Número de Serie" aria-describedby="basic-icon-default-fullname2" />
                  </div>
                  @error('serial_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>


                <div class="mb-3">
                  <label for="mac_address" class="form-label" for="basic-icon-default-fullname">Mac</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="mac_address" name="mac_address" class="form-control" id="basic-icon-default-fullname" placeholder="Mac Address" aria-describedby="basic-icon-default-fullname2" />
                  </div>
                  @error('mac_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="ip_address" class="form-label" for="basic-icon-default-fullname">Dirección IP</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="ip_address" name="ip_address" class="form-control" id="basic-icon-default-fullname" placeholder="Dirección IP" aria-describedby="basic-icon-default-fullname2" />
                  </div>
                  @error('ip_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="model" class="form-label" for="basic-icon-default-fullname">Modelo</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="model" name="model" class="form-control" id="basic-icon-default-fullname" placeholder="Modelo" />
                  </div>
                  @error('model')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>


                <div class="mb-3">
                  <label for="manufacturer" class="form-label" for="basic-icon-default-fullname">Fábrica</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="manufacturer" name="manufacturer" class="form-control" id="basic-icon-default-fullname" placeholder="Fábrica" />
                  </div>
                  @error('manufacturer')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>


                <div class="mb-3">
                  <label for="firmware" class="form-label" for="basic-icon-default-fullname">Firmware</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="firmware" name="firmware" class="form-control" id="basic-icon-default-fullname" placeholder="Firmware" />
                  </div>
                  @error('firmware')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="stock" class="form-label" for="basic-icon-default-fullname">Stock</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="stock" name="stock" class="form-control" id="basic-icon-default-fullname" placeholder="Stock" />
                  </div>
                  @error('stock')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="hdd" class="form-label" for="basic-icon-default-fullname">Disco Duro</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="hdd" name="hdd" class="form-control" id="basic-icon-default-fullname" placeholder="Disco Duro" />
                  </div>
                  @error('hdd')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>


                <div class="mb-3">
                  <label for="ram" class="form-label" for="basic-icon-default-fullname">RAM</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="ram" name="ram" class="form-control" id="basic-icon-default-fullname" placeholder="RAM" />
                  </div>
                  @error('ram')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>



                <div class="mb-3">
                  <label for="cpu" class="form-label" for="basic-icon-default-fullname">CPU</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="cpu" name="cpu" class="form-control" id="basic-icon-default-fullname" placeholder="CPU" />
                  </div>
                  @error('cpu')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="gpu" class="form-label" for="basic-icon-default-fullname">Tarjeta Gráfica</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="gpu" name="gpu" class="form-control" id="basic-icon-default-fullname" placeholder="Tarjeta Gráfica" />
                  </div>
                  @error('gpu')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="total_slots" class="form-label" for="basic-icon-default-fullname">Total Slots</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="total_slots" name="total_slots" class="form-control" id="basic-icon-default-fullname" placeholder="Total Slots" />
                  </div>
                  @error('total_slots')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="history" class="form-label">History</label>
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"></span>
                    <textarea type="text" id="history" name="history" class="form-control" cols="10" rows="5"></textarea>
                  </div>
                  @error('history')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Guardar</button>
              </form>
            </div>
          </div>
    </div>
</div>


@endsection
