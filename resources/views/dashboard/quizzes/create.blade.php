@extends('dashboard.layouts.main')
@section('container') 
<div class="row">
    <div class="col-xl-8 col-md-5 mx-4 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center">
                <h6 class="mr-auto font-weight-bold text-primary">Buat Playlist Baru</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="/dashboard/quizzes">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label text-gray-800 font-weight-bold">Judul</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  value="{{ old('name')  }}">
                    </div>

                    <div class="form-group">
                        <label for="question" class="form-label text-gray-800 font-weight-bold">Soal</label>
                        @error('question')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input type="hidden" id="question" name="question" value="{{ old('question')  }}">
                        <trix-editor input="question"></trix-editor>
                    </div>

                    <div class="form-group">
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
                    <hr>
                    <div class="row">
                        
                        <div class="col-3">
                            <p class=" text-gray-800 font-weight-bold">Jawaban</p>
                        </div>
                        <div class="col-8">
                            <p class=" text-gray-800 font-weight-bold">Opsi Pilihan</p>
                        </div>

                        <div class="col-3">
                            <input class="form-check" type="radio" id="radio" value="1" name="option">
                        </div>
                        <div class="col-8">
                            <div class="form-group">                        
                                <input type="text" class="form-control @error('option1') is-invalid @enderror" id="option1" name="option1" placeholder="Opsi pertama" value="{{ old('option1')  }}">
                            </div>
                        </div>

                        <div class="col-3">
                            <input class="form-check" type="radio" id="radio" value="2" name="option">
                        </div>
                        <div class="col-8">
                            <div class="form-group">                        
                                <input type="text" class="form-control @error('option2') is-invalid @enderror" id="option1" name="option2" placeholder="Opsi pertama" value="{{ old('option2')  }}">
                            </div>
                        </div>

                        <div class="col-3">
                            <input class="form-check" type="radio" id="radio" value="3" name="option">
                        </div>
                        <div class="col-8">
                            <div class="form-group">                        
                                <input type="text" class="form-control @error('option3') is-invalid @enderror" id="option1" name="option3" placeholder="Opsi pertama" value="{{ old('option3')  }}">
                            </div>
                        </div>

                        <div class="col-3">
                            <input class="form-check" type="radio" id="radio" value="4" name="option">
                        </div>
                        <div class="col-8">
                            <div class="form-group">                        
                                <input type="text" class="form-control @error('option4') is-invalid @enderror" id="option1" name="option4" placeholder="Opsi pertama" value="{{ old('option4')  }}">
                            </div>
                        </div>

                    </div>
                    <input type="hidden" name="answer" value="">

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


</script>
@endsection
  