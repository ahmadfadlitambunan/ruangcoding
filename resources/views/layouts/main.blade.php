@include('layouts.partials.head')

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  @include('layouts.partials.header')
  <!-- ***** Header Area End ***** -->

  <!-- Banner -->
  @yield('container')

  {{-- footer --}}
  @include('layouts.partials.footer')
  {{-- end footer --}}


  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="/js/owl-carousel.js"></script>
  <script src="/js/animation.js"></script>
  <script src="/js/imagesloaded.js"></script>
  <script src="/js/popup.js"></script>
  <script src="/js/custom.js"></script>
  <script src="/js/select.js"></script>
  <script src="/js/video-list.js"></script>

</body>

</html>