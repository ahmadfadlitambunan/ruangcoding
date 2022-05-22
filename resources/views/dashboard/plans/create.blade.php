@extends('dashboard.layouts.main')
@section('container') 
<div class="row">
    <div class="col-xl-8 col-md-5 mx-4 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center">
                <h6 class="mr-auto font-weight-bold text-primary">Buat Plan Baru</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="/dashboard/plans">
                    @csrf
                    <div class="form-group">
                      <label for="name">Nama</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Plan" value="{{ old('name') }}">
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
                    <div class="card">
                        <div class="card-body">
                            <h6>Pilih Daftar Kelas:</h6>
                            @foreach ($courses as $course)  
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $course->id }}" id="check{{ $loop->iteration }}" name="courses[]">
                                <label class="form-check-label" for="check{{ $loop->iteration }}">{{ $course->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="price">Harga</label>
                        <input type="Number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Harga Rencana Belajar" value="{{ old('price') }}">
                    </div>
                    @error('price')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="durationMany">Berapa Lama: </label>
                                <select class="custom-select  @error('durationMany') is-invalid @enderror" id="durationMany" name="durationMany">
                                @for ($i = 1; $i <= 31; $i++)
                                  @if(old('durationMany') == $i)
                                    <option value="{{ $i }}" selected>{{ $i }}</option>
                                  @else
                                    <option value="{{ $i }}">{{ $i }}</option>
                                  @endif
                                @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="duration">Hari/Bulan/Tahun</label>
                                <select class="custom-select  @error('durationInform') is-invalid @enderror" id="duration" name="durationInform">
                                    @if(old('durationInform') == "day")
                                    <option value="day" selected>Hari</option>
                                    <option value="month">Bulan</option>
                                    <option value="year">Tahun</option>

                                    @elseif(old('durationInform') == "month")
                                    <option value="month" selected>Bulan</option>
                                    <option value="day">Hari</option>
                                    <option value="year">Tahun</option>

                                    @elseif(old('durationInform') == "year")
                                    <option value="year" selected>Tahun</option>
                                    <option value="day">Hari</option>
                                    <option value="month">Bulan</option>

                                    @else
                                    <option value="day">Hari</option>
                                    <option value="month">Bulan</option>
                                    <option value="year">Tahun</option>

                                    @endif
                                </select>
                            </div>
                            <input type="hidden" name="duration">
                        </div>
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
  