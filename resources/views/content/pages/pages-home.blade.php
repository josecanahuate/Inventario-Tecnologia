@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
<div class="row">
    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
      <div class="card">
        <div class="card-body text-center">
          <div class="avatar avatar-md mx-auto mb-3">
            <span class="avatar-initial rounded-circle bg-label-info"><i class="bx bx-edit fs-3"></i></span>
          </div>
          <span class="d-block mb-1 text-nowrap">Sistemas</span>
          <h2 class="mb-0">{{ $n_sos }}</h2>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
      <div class="card">
        <div class="card-body text-center">
          <div class="avatar avatar-md mx-auto mb-3">
            <span class="avatar-initial rounded-circle bg-label-warning"><i class="bx bx-dock-top fs-3"></i></span>
          </div>
          <span class="d-block mb-1 text-nowrap">Tipos</span>
          <h2 class="mb-0">{{ $n_types }}</h2>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
      <div class="card">
        <div class="card-body text-center">
          <div class="avatar avatar-md mx-auto mb-3">
            <span class="avatar-initial rounded-circle bg-label-danger"><i class="bx bx-message-square-detail fs-3"></i></span>
          </div>
          <span class="d-block mb-1 text-nowrap">Dispositivos</span>
          <h2 class="mb-0">{{ $n_devices }}</h2>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
      <div class="card">
        <div class="card-body text-center">
          <div class="avatar avatar-md mx-auto mb-3">
            <span class="avatar-initial rounded-circle bg-label-primary"><i class="bx bx-cube fs-3"></i></span>
          </div>
          <span class="d-block mb-1 text-nowrap">Reportes</span>
          <h2 class="mb-0">72</h2>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
      <div class="card">
        <div class="card-body text-center">
          <div class="avatar avatar-md mx-auto mb-3">
            <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-purchase-tag fs-3"></i></span>
          </div>
          <span class="d-block mb-1 text-nowrap">Backups</span>
          <h2 class="mb-0">65</h2>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
      <div class="card">
        <div class="card-body text-center">
          <div class="avatar avatar-md mx-auto mb-3">
            <span class="avatar-initial rounded-circle bg-label-danger"><i class="bx bx-cart fs-3"></i></span>
          </div>
  
          <span class="d-block mb-1 text-nowrap">Order</span>
          <h2 class="mb-0">40</h2>
        </div>
      </div>
    </div>
  </div>
@endsection
