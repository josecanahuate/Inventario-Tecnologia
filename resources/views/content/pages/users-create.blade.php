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
              <h5 class="mb-0">Crear Usuario Nuevo</h5>
              <small class="text-muted float-end">Merged input group</small>
            </div>
            <div class="card-body">
              <form method="POST" action="{{route('users.store') }}">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label" for="basic-icon-default-fullname">Nombre Completo</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                    <input type="text" id="name" name="name" class="form-control" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                  </div>
                  @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                  <div class="mb-3">
                    <label for="email" class="form-label" for="basic-icon-default-email">Email</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                      <input type="text" id="email" name="email" id="basic-icon-default-email" class="form-control" placeholder="example@example.com" aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
                    </div>
                    <div class="form-text"> You can use letters, numbers & periods </div>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  </div>

                  <div class="mb-3">
                    <div class="form-password-toggle">
                      <label for="password" class="form-label" for="multicol-password">Password</label>
                      <div class="input-group input-group-merge">
                        <input type="password" id="password" name="password" id="multicol-password" class="form-control" placeholder="" aria-describedby="multicol-password2" />
                        <span class="input-group-text cursor-pointer" id="multicol-password2"><i class="bx bx-hide"></i></span>
                      </div>
                    </div>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  </div>
                <button type="submit" class="btn btn-primary">Send</button>
              </form>
            </div>
          </div>
    </div>
</div>


@endsection
