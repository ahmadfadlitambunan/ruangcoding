@extends('layouts.main')

@section('container')
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-6 align-self-center">
            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
              <div class="row">
                <h2>Tingkatkan kemampuanmu di RuangCoding!</h2>
                  <p style="font-size: 18px;">
                    Kami hadir untuk memfasilitasi belajar setiap orang. 
                    <br> Dengan kami, belajar apa saja menjadi mudah dan menyenangkan.
                  </p>
                </div>
                <div class="col-lg-12">
                  <div class="border-button first-button scroll-to-section">
                    <a href="#">Berlangganan sekarang!</a>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
              <img src="/images/slider-dec.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="services" class="services section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
          <h4>Kenapa<em> Harus Belajar</em> di RuangCoding?</h4>
          <img src="/images/heading-line-dec.png" alt="">
          
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="service-item first-service">
          <div class="icon"></div>
          <h4>Membantu meningkatkan skill programming </h4>
          <p>Para pengguna akan diberikan bahan belajar yang dapat diakses kapanpun.</p>
          
        </div>
      </div>
      <div class="col-lg-3">
        <div class="service-item second-service">
          <div class="icon"></div>
          <h4>Kurikulum standar industri global</h4>
          <p>Kurikulum dikembangkan berdasarkan teknologi dunia sesuai kebutuhan industri terkini.</p>
          
        </div>
      </div>
      <div class="col-lg-3">
        <div class="service-item third-service">
          <div class="icon"></div>
          <h4>Konten belajar lengkap dan menarik</h4>
          <p>Dilengkapi video belajar programming sekaligus pemecahan masalah bagi program yang stuck </p>
          
        </div>
      </div>
      <div class="col-lg-3">
        <div class="service-item fourth-service">
          <div class="icon"></div>
          <h4>Seru dan &amp; Menyenangkan</h4>
          <p>Ada kuis ditengah video pembelajaran dan misi berhadiah Teman belajar yang bikin belajar makin asyik</p>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- about --}}
<div id="about" class="about-us section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 align-self-center">
        <div class="section-heading">
          <h4>Kursus <em>Pembelajaran</em></h4>
          <p>Saatnya bijak memilih sumber belajar. Tak hanya materi yang terjamin,
          <br> RuangCoding juga memiliki akses yang menyenangkan.</p>
          <img src="/images/heading-line-dec.png" alt="">
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="box-item">
              <h4><a href="#">HTML</a></h4>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="box-item">
              <h4><a href="#">Javascript</a></h4>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="box-item">
              <h4><a href="#">PHP</a></h4>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="box-item">
              <h4><a href="#">Python</a></h4>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="gradient-button">
              <a href="#">Lainnya</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="right-image">
          <img src="/images/about-right-dec.png" alt="">
        </div>
      </div>
    </div>
  </div>
</div>

<!-- TESTIMONI -->
<div id="clients" class="the-clients">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="section-heading">
          <h4>Apa yang <em>Alumni Katakan</em> Tentang RuangCoding</h4>
          <img src="/images/heading-line-dec.png" alt="">
          <p>RuangCoding telah dipercaya untuk memberikan pembelajaran. <br> Inilah testinomi yang telah diberikan para pembelajar.</p>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="naccs">
          <div class="grid">
            <ul class="nacc">
              <li class="active">
                <div>
                  <div class="thumb">
                    <div class="row">
                      <div class="client-content">
                        <img src="/images/quote.png" alt="">
                        <p>“Mengandalkan kuliah saja, tidak cukup. 
                          Dengan RuangCoding, saya mantap tinggalkan dunia gaming lantas belajar dunia Android yang ternyata menyenangkan. 
                          Yang nomor satu, RuangCoding mengajarkan ilmu berorientasi kerja. Kini saya sangat terbantu dalam karir saya.”</p>  
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-lg-2"></div>

      <div class="col-lg-5">
        <div class="naccs">
          <div class="grid">
            <ul class="nacc">
              <li class="active">
                <div>
                  <div class="thumb">
                    <div class="row">
                      <div class="client-content">
                        <img src="/images/quote.png" alt="">
                        <p>“Saya khusus mendedikasikan waktu saya untuk belajar ngoding. 
                          Di RuangCoding belajarnya step by step, library-nya up-to-date. Kalau ada eror, nggak bingung. 
                          Di sini saya juga belajar untuk nggak asal coding aja. CV pun jadi bagus karena menambah skill pemrograman saya. 
                          Saya jadi percaya diri untuk ngoding.”</p>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- pricing --}}
<div id="pricing" class="pricing-tables">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="section-heading">
          <h4>Daftar <em>Paket</em> Belajar</h4>
          <img src="/images/heading-line-dec.png" alt="">
          <p>Pilih paket yang sesuai dan daftarkan dirimu.</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="pricing-item-regular">
          <span class="price">Rp100k</span>
          <h4>SILVER</h4>
          <div class="icon">
            <img src="/images/orang3.png" alt="">
          </div>
          <ul>
            <li>Akses materi 1 bulan</li>
            <li class="non-function">Bebas Iklan</li>
            <li class="non-function">Bebas Tanya Jawab</li>
            <li class="non-function">Pilihan Lainnya</li>
          </ul>
          <div class="border-button">
            <a href="#">Berlangganan</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="pricing-item-pro">
          <span class="price">Rp250k</span>
          <h4>GOLD</h4>
          <div class="icon">
            <img src="/images/orang3.png" alt="">
          </div>
          <ul>
            <li>Akses materi 2 bulan</li>
            <li>Bebas Iklan</li>
            <li class="non-function">Bebas Tanya Jawab</li>
            <li class="non-function">Pilihan Lainnya</li>
          </ul>
          <div class="border-button">
            <a href="#">Berlangganan</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="pricing-item-regular">
          <span class="price">Rp375k</span>
          <h4>PLATINUM</h4>
          <div class="icon">
            <img src="/images/orang3.png" alt="">
          </div>
          <ul>
            <li>Akses materi 3 bulan</li>
            <li>Bebas Iklan</li>
            <li>Bebas Tanya Jawab</li>
            <li>Pilihan Lainnya</li>
          </ul>
          <div class="border-button">
            <a href="#">Berlangganan</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
@endsection