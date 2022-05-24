@extends('dashboard.layouts.main')
@section('container') 
<div class="row">
    <div class="col-xl-8 col-md-5 mx-4 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center">
                <h6 class="mr-auto font-weight-bold text-primary">Buat Kelas Baru</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="/dashboard/courses" enctype="multipart/form-data">
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
                        <label for="image">Gambar</label>
                        <img class="img-preview img-fluid mb-3 col-sm-4">
                        <input type="file" class="form-control-file  @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
                        @error('image')
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

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection
  