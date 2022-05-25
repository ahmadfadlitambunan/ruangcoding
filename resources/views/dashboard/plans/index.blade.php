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
                    <h6 class="mr-auto font-weight-bold text-primary">Daftar Plans</h6>
                    <a href="/dashboard/plans/create" class="btn btn-primary mx-2">Buat Plan Baru</a>
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
                                    <th>Durasi</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($plans as $plan)      
                                <tr>
                                     <td>{{ $loop->iteration }}</td>
                                     <td>{{ $plan->name }}</td>
                                     <td>{{ $plan->duration }}</td>
                                     <td>{{ $plan->price }}</td>
                                     <td >
                                         <a href="/dashboard/plans/{{ $plan->id }}" class="btn btn-sm btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                
                                        <a href="/dashboard/plans/{{ $plan->id }}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                
                                        <form action="/dashboard/plans/{{ $plan->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                     </td>
                                 </tr>
                                @endforeach
                                {{-- 
                                    SELECT * FROM `plans`  
                                --}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



    