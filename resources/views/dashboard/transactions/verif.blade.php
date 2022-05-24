@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-xl-12 col-md-10 mx-1 ">
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
                    <h6 class="mr-auto font-weight-bold text-primary">Daftar Transaksi</h6>
                    <form method="GET" onsubmit="return confirm ('Download Pdf Daftar Posting?')" action="pdf.php?pdf=2">
                        <button type='submit' name='btnpost'class='btn btn-outline-primary'>Report</button>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class = 'table table-bordered' id="adminTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Paket</th>
                                    <th>Nama Pengguna</th>
                                    <th>Harga</th>
                                    <th>Metode</th>
                                    <th>Tanggal</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $tran)      
                                <tr>
                                     <td>{{ $tran->id }}</td>
                                     <td>{{ $tran->plan->name }}</td>
                                     <td>{{ $tran->user->name }}</td>
                                     <td>{{ $tran->plan->price }}</td>
                                     <td>{{ $tran->methodPay->name }}</td>
                                     <td>{{ $tran->created_at }}</td>
                                     <td><a href="{{ asset('storage/' . $tran->proof_of_payment) }}">Klik untuk melihat</a></td>
                                     <td>
                                        <form action="/dashboard/verifikasi-transaksi/{{ $tran->id }}" method="post">
                                            @method('put')
                                            @csrf
                                            <input type="submit" name="status" class="btn btn-success" onclick="return confirm('Apakah anda yakin?')" value="pass">
                                            <input type="submit" name="status" class="btn btn-danger" onclick="return confirm('Apakah anda yakin')" value="fail">
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