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
                    <h6 class="mr-auto font-weight-bold text-primary">Daftar Admin</h6>
                    <a href="/dashboard/admins/create" class="btn btn-primary mx-2">Buat Admin Baru</a>
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
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)      
                                <tr>
                                     <td>{{ $loop->iteration }}</td>
                                     <td>{{ $admin->name }}</td>
                                     <td>{{ $admin->email }}</td>
                                     <td >
                                         <a href="/dashboard/admins/{{ $admin->id }}" class="btn btn-sm btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                
                                        <a href="/dashboard/admins/{{ $admin->id }}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                
                                        <form action="/dashboard/admins/{{ $admin->id }}" method="POST" class="d-inline">
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



    