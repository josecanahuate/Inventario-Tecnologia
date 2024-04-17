@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Editar Equipo')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Editar Equipo</h5>
              <small class="text-muted float-end">Merged input group</small>
            </div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data" action="{{route('devices.update', $device_id) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="device_id" value="{{ $device->id }}">
                
                <div class="row mb-3">
                  <div class="col mb-3">
                      {{-- Imagen que se muestra --}}
                      @isset ($device->image_url)
                      <img id="picture" src="{{ $device->image_url }}" class="w-25" alt="">
                      @else
                      <img id="picture" class="w-25" src="https://media.istockphoto.com/id/1128826884/es/vector/ning%C3%BAn-s%C3%ADmbolo-de-vector-de-imagen-falta-icono-disponible-no-hay-galer%C3%ADa-para-este-momento.jpg?s=612x612&w=0&k=20&c=9vnjI4XI3XQC0VHfuDePO7vNJE7WDM8uzQmZJ1SnQgk=" alt="">
                      @endisset
                  </div>
              
                  <div class="col mb-3">
                      <label class="form-label">Imagen del Dispositivo</label>
                      <div class="input-group input-group-merge">
                          <input type="file" id="fileLogo" name="fileLogo" accept="image/*" class="form-control" />
                      </div>
                      @error('fileLogo')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
              </div>
              
              <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById("fileLogo").addEventListener('change', cambiarImagen);
                });
            
                function cambiarImagen(event) {
                    var file = event.target.files[0];
            
                    var reader = new FileReader();
                    reader.onload = (event) => {
                        document.getElementById("picture").setAttribute('src', event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            </script>

                {{-- FORM DISPOSITIVO ICONO --}}
                <div class="mb-3">
                    <label for="selectpickerIcons" class="form-label">Tipo de Dispositivo</label>
                    <select class="selectPicker w-100 show-tick form-select" name="type_id" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default">
                        @foreach ($types as $type)
                        <option data-icon="bx bx-{{$type->icon}}" @if ($type->id == $device->type_id) selected @endif value="{{$type->id}}">{{$type->name}}</option> 
                        @endforeach
                    </select>
                </div>
                
                {{-- FORM SISTEMA OPERATIVO --}}
                <div class="mb-3">
                    <label for="selectpickerOS" class="form-label">Sistema Operativo</label>
                    <select class="selectPicker w-100 show-tick form-select" name="sos_id" id="selectpickerOS" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default">
                        @foreach ($sos as $so)
                        <option value="{{$so->id}}" @if ($so->id == $device->sos_id) selected @endif>{{$so->name}}</option> 
                        @endforeach
                    </select>
                </div>
                

                <div class="mb-3">
                  <label for="name" class="form-label" for="basic-icon-default-fullname">Nombre</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="name" name="name" value="{{ $device->name }}" class="form-control" id="basic-icon-default-fullname" placeholder="Nombre del Equipo" />
                  </div>
                  @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="name" class="form-label" for="basic-icon-default-fullname">Descripción</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="description" name="description" value="{{ $device->description }}" class="form-control" id="basic-icon-default-fullname" placeholder="Descripción del Equipo" />
                  </div>
                  @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="serial_number" class="form-label" for="basic-icon-default-fullname">Número de Serie</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="serial_number" name="serial_number" value="{{ $device->serial_number }}" class="form-control" id="basic-icon-default-fullname" placeholder="Número de Serie" aria-describedby="basic-icon-default-fullname2" />
                  </div>
                  @error('serial_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>


                <div class="mb-3">
                  <label for="mac_address" class="form-label" for="basic-icon-default-fullname">Mac</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="mac_address" name="mac_address" value="{{ $device->mac_address }}" class="form-control" id="basic-icon-default-fullname" placeholder="Mac Address" aria-describedby="basic-icon-default-fullname2" />
                  </div>
                  @error('mac_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="ip_address" class="form-label" for="basic-icon-default-fullname">Dirección IP</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="ip_address" name="ip_address" value="{{ $device->ip_address }}" class="form-control" id="basic-icon-default-fullname" placeholder="Dirección IP" aria-describedby="basic-icon-default-fullname2" />
                  </div>
                  @error('ip_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="model" class="form-label" for="basic-icon-default-fullname">Modelo</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="model" name="model" value="{{ $device->model }}" class="form-control" id="basic-icon-default-fullname" placeholder="Modelo" />
                  </div>
                  @error('model')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>


                <div class="mb-3">
                  <label for="manufacturer" class="form-label" for="basic-icon-default-fullname">Fábrica</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="manufacturer" name="manufacturer" value="{{ $device->manufacturer }}" class="form-control" id="basic-icon-default-fullname" placeholder="Fábrica" />
                  </div>
                  @error('manufacturer')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>


                <div class="mb-3">
                  <label for="firmware" class="form-label" for="basic-icon-default-fullname">Firmware</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="firmware" name="firmware" value="{{ $device->firmware }}" class="form-control" id="basic-icon-default-fullname" placeholder="Firmware" />
                  </div>
                  @error('firmware')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="stock" class="form-label" for="basic-icon-default-fullname">Stock</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="stock" name="stock" value="{{ $device->stock }}" class="form-control" id="basic-icon-default-fullname" placeholder="Stock" />
                  </div>
                  @error('stock')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="hdd" class="form-label" for="basic-icon-default-fullname">Disco Duro</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="hdd" name="hdd"  value="{{ $device->hdd }}" class="form-control" id="basic-icon-default-fullname" placeholder="Disco Duro" />
                  </div>
                  @error('hdd')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>


                <div class="mb-3">
                  <label for="ram" class="form-label" for="basic-icon-default-fullname">RAM</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="ram" name="ram"  value="{{ $device->ram }}" class="form-control" id="basic-icon-default-fullname" placeholder="RAM" />
                  </div>
                  @error('ram')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>



                <div class="mb-3">
                  <label for="cpu" class="form-label" for="basic-icon-default-fullname">CPU</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="cpu" name="cpu"  value="{{ $device->cpu }}" class="form-control" id="basic-icon-default-fullname" placeholder="CPU" />
                  </div>
                  @error('cpu')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="gpu" class="form-label" for="basic-icon-default-fullname">Tarjeta Gráfica</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="gpu" name="gpu" value="{{ $device->gpu }}" class="form-control" id="basic-icon-default-fullname" placeholder="Tarjeta Gráfica" />
                  </div>
                  @error('gpu')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="total_slots" class="form-label" for="basic-icon-default-fullname">Total Slots</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="total_slots" name="total_slots" value="{{ $device->total_slots }}" class="form-control" id="basic-icon-default-fullname" placeholder="Total Slots" />
                  </div>
                  @error('total_slots')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="history" class="form-label">History</label>
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"></span>
                    <textarea type="text" id="history" name="history" value="{{ $device->history }}" class="form-control" cols="10" rows="5"></textarea>
                  </div>
                  @error('history')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>


                <button type="submit" class="btn btn-primary">Actualizar</button>
                <button type="submit" href="/devices" class="btn btn-primary">Volver</button>

              </form>
            </div>
          </div>
    </div>
</div>
@endsection
