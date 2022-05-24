@extends('layouts.main')
@section('container')
    
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-7 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">

                <div class="row">
                  <div class="card">
                    <div class="card-body">
                      <p class="fs-4 fw-bold">{{ $plan->name }}</p>
                      <p class="fs-6 fw-bold text-primary">Deskripsi</p>
                      <p>{!! $plan->desc !!}</p>
                      <p class="fs-4 fw-bold">Rp{{ $plan->price }}</p>
                      <hr>
                      <p class="fs-6 fw-bold text-primary">Bebas akses playlist dan quiz di kelas: </p>
                      <div class="row">
                      @foreach ($plan->courses as $course)
                        <div class="col-md-5">
                          <i class="far fa-check-circle"></i>  {{ $course->name }}
                        </div>
                      @endforeach
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-lg-5">
              <div class="left-content show-up header-text wow fadeInRight" data-wow-duration="1s" data-wow-delay="1s">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                          <p class="fs-5 fw-bold">Keterangan Paket:</p>
                          <p class="fw-bold">{{ $plan->name }}</p>
                        </div>
                        <hr>
                        <p class="fs-5 fw-bold">Ringkasan Pembayaran: </p>
                        <div class="col-8">
                          <p class="fw-bold">Harga Paket</p>
                        </div>
                        <div class="col-4">
                          <p class="text-secondary fw-bold">Rp{{ $plan->price }}</p>
                        </div>
                        <hr>
                        <div class="col-8">
                          <p class="fw-bold">Total</p>
                        </div>
                        <div class="col-4">
                          <p class="text-secondary fw-bold">Rp{{ $plan->price }}</p>
                        </div>
                        <div class="col-12 mt-3">
                          <form action="/buat-transaksi" method="POST">
                            @csrf
                            <label for="methodPayment" class="form-label @error('method_pay_id') is-invalid @enderror"><p class="fs-5 fw-bold ">Metode Pembayaran: </p></label>
                            <select class="form-select" id="methodPayment" name="method_pay_id">
                              @foreach ($methodPays as $methodPay)
                              <option value="{{ $methodPay->id }}">{{ $methodPay->name }}</option>
                              @endforeach
                            </select>
                            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                            {{-- Perlu auth user id --}}
                            <input type="hidden" name="user_id" value="{{ mt_rand(1, 5) }}">

                            <div class="d-grid gap-2 col-12 mx-auto">
                              <button class="btn mt-3 btn-block" type="submit" onclick="return confirm('Silahkan cek kembali detail pesanan anda! Klik ok jika sudah!')">Lanjutkan Pembayaran</button>
                            </div>
                          </form>
                        </div>
                      </div>  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection