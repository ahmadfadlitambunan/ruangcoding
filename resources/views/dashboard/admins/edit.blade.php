@extends('dashboard.layouts.main')
@section('container') 
<div class="row">
    <div class="col-xl-8 col-md-5 mx-4 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center">
                <h6 class="mr-auto font-weight-bold text-primary">Edit Data Admin</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="/dashboard/admins/{{ $admin->id }}">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Admin" value="{{ old('name') }}">
                        @error('name')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Admin" value="{{ old('email') }}">
                          @error('email')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="password">Password</label>
                          <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password Admin" value="{{ old('password') }}">
                          @error('password')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                          @enderror
                      </div>
                    <button type="submit" class="btn btn-primary mt-3">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    }); 
    
</script>
@endsection
  