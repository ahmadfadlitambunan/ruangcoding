@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-xl-10 col-md-10 mx-4 ">
            @if (session()->has('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center">
                    <h6 class="mr-auto font-weight-bold text-primary">Daftar courses</h6>
                    <a href="/dashboard/courses/create" class="btn btn-primary mx-2">Buat course Baru</a>
                    <form method="GET" onsubmit="return confirm ('Download Pdf Daftar Posting?')" action="pdf.php?pdf=2">
                        <button type='submit' name='btnpost'class='btn btn-outline-primary'>Report</button>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class = 'table table-bordered' id="adminTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    {{-- <th>Gambar</th> --}}
                                    <th>Jumlah Playlist</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)      
                                <tr>
                                     <td>{{ $loop->iteration }}</td>
                                     <td>{{ $course->name }}</td>
                                     {{-- <td>{{ $course->image}}</td> --}}
                                     <td>{{ $course->playlists->count() }}</td>
                                     <td >
                                         <a href="/dashboard/courses/{{ $course->id }}" class="btn btn-sm btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                
                                        <a href="/dashboard/courses/{{ $course->id }}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                
                                        <form action="/dashboard/courses/{{ $course->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                     </td>
                                 </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



    