@extends('dashboard.layouts.main')
@section('container')
<div class="card shadow mb-4 mx-4">
    <div class="card-header">
      <h4>Data Admin</h4>
    </div>
    <div class="card-body">
      <div class="row">
          <div class="col-md-8">
            Nama  :  {{ $admin->name }}
          </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-8">
          Email :  {{ $admin->email }}
        </div>
      </div>
      <hr>
    </div>
  </div>
    
@endsection