@extends('dashboard.layouts.main')
@section('container')
<div class="row">
    <div class="col-md-8 ml-2">
        <div class="card shadow mb-4 mx-4">
         <div class="card-header">
             <p class="h3 mb-0 text-gray-800">Detail Soal</p>
         </div>
         <div class="card-body">
             <div class="row">
                 <div class="col-md-6">
                     <p class="h5 mb-0 font-weight-bold text-gray-800 mb-2">Soal : </p>
                     <p>{!! $quiz->question !!}</p>
                 </div>
             </div>
             <hr>
             <div class="row">
                 <div class="col-md-12">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Opsi Jawaban</th>
                            <th scope="col"></th>
                            <th scope="col">Jawaban</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th colspan="2">{{ $quiz->option1 }}</th>
                            <th>
                                @if ($quiz->option1 == $quiz->answer)
                                <span class="badge bg-success text-light">Benar</span>
                                @else
                                <span class="badge bg-danger text-light">Salah</span>
                                @endif
                            </th>
                          </tr>
                          <tr>
                            <th colspan="2">{{ $quiz->option2 }}</th>
                            <th>
                                @if ($quiz->option2 == $quiz->answer)
                                <span class="badge bg-success text-light">Benar</span>
                                @else
                                <span class="badge bg-danger text-light">Salah</span>
                                @endif
                            </th>
                          </tr>
                          <tr>
                            <th colspan="2">{{ $quiz->option3 }}</th>
                            <th>
                                @if ($quiz->option3 == $quiz->answer)
                                <span class="badge bg-success text-light">Benar</span>
                                @else
                                <span class="badge bg-danger text-light">Salah</span>
                                @endif
                            </th>
                          </tr>
                          <tr>
                            <th colspan="2">{{ $quiz->option4 }}</th>
                            <th>
                                @if ($quiz->option4 == $quiz->answer)
                                <span class="badge bg-success text-light">Benar</span>
                                @else
                                <span class="badge bg-danger text-light">Salah</span>
                                @endif
                            </th>
                          </tr>
                        </tbody>
                    </table>
                 </div>
             </div>
         </div>
        </div>
    </div>
</div>
    
@endsection