@extends('dashboard.layouts.main')
@section('container')
<div class="card shadow mb-4 mx-4">
  <div class="card-header">
    <h4>Data User</h4>
  </div>
  <div class="card-body">
    <div class="row">
        <div class="col-md-8">
          Nama  :  {{ $user->name }}
        </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-8">
        Email :  {{ $user->email }}
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-8">
        No. Telepon :  {{ $user->no_phone }}
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-8">
        Verifikasi Email pada :  {{ $user->email_verified_at }}
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-8">
        Gender :  {{ $user->gender }}
      </div>
    </div>
    <hr>
  </div>
</div>
    
@endsection