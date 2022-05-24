@extends('layouts.main')

@section('container')
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container py-3">
      <main>
        <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="card shadow mb-4" style="background-color: #4b8ef1">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <p class="text-light mb-0 small">ID Pesanan</p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <p class="text-light mb-0 small">Nama Paket</p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <p class="text-light mb-0 small">Tanggal</p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <p class="text-light mb-0 small">Status</p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <p class="text-light mb-0 small">Jumlah</p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <span class="text-light mb-0 small">Metode Pembayaran</span>
                        </div>
                      </div>
                    </div>
                </div>
                @foreach ($transcs as $transc)
                    
                <div class="card shadow mb-4">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <p class="text-muted mb-0 small">#{{ $transc->id }}</p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <p class="text-muted mb-0 small">{{ $transc->plan->name }}</p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <p class="text-muted mb-0 small">{{ $transc->created_at }}</p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <p class="text-muted mb-0 small"><span class="badge bg-success">{{ $transc->paid_status }}</span></p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <p class="text-muted mb-0 small">{{ $transc->plan->price }}</p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <p class="text-muted mb-0 small">{{ $transc->methodPay->name }}</p>
                        </div>
                      </div>
                      <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                      <div class="row d-flex align-items-center">

                        @if (!$transc->paid_status && !$transc->proof_of_payment)
                        <div class="col-md-2">
                          <p class="text-muted mb-0 small">Kode Pesanan :</p>
                          <p class="text-muted mb-0 small">{{ $transc->methodPay->no_account }}</p>
                        </div>
                        <div class="col-md-10">  
                          <a href="/upload-pay/{{ $transc->id }}/edit" class="btn btn-success">Upload Bukti Pembayaran</a>
                        </div>
                        @elseif($transc->paid_status == "failed")
                         <div class="col">
                           <div class="alert alert-danger" role="alert">
                             <strong>Transaksi Gagal!</strong> Pembelian paket belajar dibatalkan
                           </div>
                         </div>
                        @elseif($transc->proof_of_payment && !$transc->paid_status)
                        <div class="col">
                          <div class="alert alert-warning" role="alert">
                            <strong>Bukti Pembayaran Telah Terkirim!</strong> Sedang menunggu verifikasi
                          </div>
                        </div>
                      @else
                      @endif
                      </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
      </main>
    </div>
</div>
@endsection