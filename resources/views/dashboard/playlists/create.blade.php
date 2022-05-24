@extends('dashboard.layouts.main')
@section('container') 
<div class="row">
    <div class="col-xl-8 col-md-5 mx-4 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center">
                <h6 class="mr-auto font-weight-bold text-primary">Buat Playlist Baru</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="/dashboard/playlists">
                    @csrf
                    <div class="form-group">
                      <label for="name">Nama</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Kelas" value="{{ old('name') }}">
                      @error('name')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc">Deskripsi</label>
                        @error('desc')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input id="desc" type="hidden" name="desc" value="{{ old('desc')  }}">
                        <trix-editor input="desc"></trix-editor>
                    </div>
                    <div class="form-group">
                        <label for="course_id">Kelas</label>
                        <input type="int" class="form-control @error('course_id') is-invalid @enderror" id="course_id" name="course_id" placeholder="Pilihan Kelas" value="{{ old('course_id') }}">
                        @error('course_id')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>
                        @enderror
                      </div>
                    {{-- <div class="card">
                        <div class="card-body">
                            <h6>Pilih Kelas:</h6>
                            @foreach ($courses as $course)  
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="{{ $course->id }}" id="check{{ $loop->iteration }}" name="courses[]">
                                <label class="form-check-label" for="check{{ $loop->iteration }}">{{ $course->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div> --}}
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
  