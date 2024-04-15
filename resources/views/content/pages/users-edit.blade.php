@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Editar Usuario')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Editar Usuario</h5>
              <small class="text-muted float-end">Merged input group</small>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('users.update', $user_id) }}">
                @csrf
                @method('PUT') 
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">Nombre Completo</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                    <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                  </div>
                </div>

                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Email</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                      <input type="text" name="email" value="{{ $user->email }}" id="basic-icon-default-email" class="form-control" placeholder="example@example.com" aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
                    </div>
                    <div class="form-text"> You can use letters, numbers & periods </div>
                  </div>

                  <div class="mb-3">
                    <div class="form-password-toggle">
                      <label class="form-label" for="multicol-password">Password Anterior</label>
                      <div class="input-group input-group-merge">
                        <input type="password" name="old_password" id="multicol-password" class="form-control" placeholder="" aria-describedby="multicol-password2" />
                        <span class="input-group-text cursor-pointer" id="multicol-password2"><i class="bx bx-hide"></i></span>
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <div class="form-password-toggle">
                      <label class="form-label" for="multicol-password">Password Nuevo</label>
                      <div class="input-group input-group-merge">
                        <input type="password" name="new_password" id="multicol-password" class="form-control" placeholder="" aria-describedby="multicol-password2" />
                        <span class="input-group-text cursor-pointer" id="multicol-password2"><i class="bx bx-hide"></i></span>
                      </div>
                    </div>
                  </div>
                <button type="submit" class="btn btn-primary">Send</button>
              </form>
            </div>
          </div>
    </div>
</div>


@endsection
