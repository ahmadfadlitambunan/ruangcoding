@extends('layouts.main')

@section('container')
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
  <div class="container py-3">
    <main>
      <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
        <div class="row pricing-tables">
          <div class="col-lg-8 offset-lg-2">
            <div class="section-heading">
              <h4>Daftar <em>Paket</em> Belajar</h4>
              <img src="/images/heading-line-dec.png" alt="">
              <p>Pilih paket yang sesuai dan daftarkan dirimu.</p>
            </div>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 mb-3">
          <div class="owl-carousel owl-theme">
            @foreach ($plans as $plan) 
            <div class="col item">
              <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                  <h4 class="my-0 fw-normal text-primary">{{ $plan->name }}</h4>
                </div>
                <div class="card-body">
                  <h4 class="card-title pricing-card-title">Rp{{ $plan->price }}</h4>
                  <hr>
                  <p class="fs-6">Bebas akses playlist dan quiz di kelas: </p>
                  <div class="row mb-3">
                    @foreach ($plan->courses as $course)
                      <div class="col-md-5">
                        <i class="far fa-check-circle"></i>  {{ $course->name }}
                      </div>
                    @endforeach
                  </div>
                  <a href="/paket-belajar/{{ $plan->id }}" class="w-100 btn btn-outline-primary">Berlangganan</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </main>
  </div>
</div>


<script>
  $(document).ready(function(){
    $('.owl-carousel').owlCarousel({
      margin:10,
      dotsEach: true,
      nav: true,
      responsive:{
          0:{
              items:2
          },
          600:{
              items:3
          },
          1000:{
              items:3
          }
      }
    })
});
</script>
@endsection