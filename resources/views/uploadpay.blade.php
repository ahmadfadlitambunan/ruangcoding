@extends('layouts.main')
@section('container')
    
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row justify-content-center">
            <div class="col-lg-8 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="0s" data-wow-delay="0s">
                  <div class="card">
                      <div class="card-body">
                            <form action="/upload-pay/{{ $transaction->id }}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload Bukti Pembayaran</label>
                                    <input class="form-control @error('proof_of_payment')is-invalid @enderror" type="file" id="formFile" name="proof_of_payment">
                                    @error('proof_of_payment')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn">Upload</button>
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

@endsection