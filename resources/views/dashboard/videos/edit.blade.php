@extends('dashboard.layouts.main')
@section('container') 
<div class="row">
    <div class="col-xl-8 col-md-5 mx-4 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center">
                <h6 class="mr-auto font-weight-bold text-primary">Tambah Vide Baru</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="/dashboard/videos" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                      <label for="title">Judul</label>
                      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Judul...." value="{{ old('title', $video->title) }}">
                      @error('title')
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
                        <input id="desc" type="hidden" name="desc" value="{{ old('desc', $video->desc)  }}">
                        <trix-editor input="desc"></trix-editor>
                    </div>

                    <div class="form-group mt-4">
                        <label>Pilih : </label>
                        <div class="row">
                            <div class="col-xl-3">
                                <select class="form-select @error('access_type') is-invalid @enderror" id="access_type" name="access_type">
                                    <option value="" selected>Pilih Akses</option>
                                    <option value="free">Gratis</option>
                                    <option value="premium">Berbayar</option>
                                </select>
                                @error('access_type')
                                  <div class="invalid-feedback">
                                  {{ $message }}
                                  </div>
                                @enderror
                            </div>

                            <div class="col-xl-3">
                                <select class="form-select @error('course_id') is-invalid @enderror" name="course_id" id="course" onchange="updatePlaylist()" required>
                                    <option value="" selected>Pilih Kelas</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                  <div class="invalid-feedback">
                                  {{ $message }}
                                  </div>
                                @enderror
                            </div>

                            <div class="col-xl-6">
                                <select class="form-select" name="playlist_id" id="playlist">
                                    <option value="" selected disabled>Pilih Playlist</option>
                                </select>
                                @error('playlist_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="thumg_img">Gambar</label>
                        @if ($video->thumb_img)     
                        <img src="{{ asset('storage/'.$video->thumb_img) }}" class="img-preview img-fluid mb-3 col-sm-4">
                        @else
                        <img class="img-preview img-fluid mb-3 col-sm-4">
                        @endif
                        <input type="file" class="form-control-file  @error('thumg_img') is-invalid @enderror" id="image" name="thumg_img" onchange="previewImage()">
                        @error('thumg_img')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="file_name">Video</label>
                        <input type="file" class="form-control-file  @error('file_name') is-invalid @enderror" id="video" name="file_name">
                        @error('file_name')
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

    function updatePlaylist() {
        let playlist = $('#course').val();
        $('#playlist').children().remove();
        $('#playlist').val('');
        $('#playlist').append('<option value="">Pilih Playlist</option>');
        $('#playlist').prop('disabled', true);
        if(playlist != '' && playlist != null){
            $.ajax({
                url: "{{ url('') }}/playlist-fetch/"+ playlist,
                success: function(res){
                    $('#playlist').prop('disabled', false);
                    let tampilan_option = '';
                    $.each(res,function(index, data){
                        tampilan_option += '<option value="'+data.id+'">'+ data.name +'</option>';
                    })
                    $('#playlist').append(tampilan_option);
                }
            }); 
        }
    }

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
  