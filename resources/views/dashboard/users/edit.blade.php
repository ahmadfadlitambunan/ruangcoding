@extends('dashboard.layouts.main')
@section('container') 
<div class="row">
    <div class="col-xl-8 col-md-5 mx-4 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center">
                <h6 class="mr-auto font-weight-bold text-primary">Edit User</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="/dashboard/users/{{ $user->id }}">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama User" value="{{ old('name') }}">
                        @error('name')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email User" value="{{ old('email') }}">
                          @error('email')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="no_phone">No. Telepon</label>
                          <input type="text" class="form-control @error('no_phone') is-invalid @enderror" id="no_phone" name="no_phone" placeholder="No. Telepon User" value="{{ old('no_phone') }}">
                          @error('no_phone')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="password">Password</label>
                          <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password User" value="{{ old('password') }}">
                          @error('password')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="gender">Gender</label>
                          <input type="text" class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" placeholder="Gender User" value="{{ old('gender') }}">
                          @error('gender')
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
  