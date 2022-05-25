@extends('layouts.main')

@section('container')
<!-- VIDEO -->
  <div class="main-banner-belajar wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="belajar">
  
            <h3 class="heading"><b>MATERI</b></h3>
  
            <div class="container">
            
              <div class="main-video" id="main-video">
                <div class="video">
                  <video src="{{ asset('storage/'.$mainVid->file_name) }}" controls autoplay></video>
                  <h3 class="title">{{ $mainVid->title }}</h3>
                  <p>{{ $mainVid->desc }}</p>
                </div>
                <div class="border-button text-center mb-2">
                  <a href="/quiz/{{ $mainVid->playlist->id }}">Mulai kuis</a>
                </div>
              </div>
            
              <div class="video-list">
                @foreach ($videos as $video)          
                  <a href="/belajar/{{ $video->playlist->course->id }}/{{ $video->playlist->id }}/{{ $video->id }}" class="go-to">
                    <div class="row g-0 vid">
                      <div class="col-md-4">
                        <img src="https://source.unsplash.com/1280x720?Python-Programming" class="rounded" width="40px" alt="https://source.unsplash.com/400x400?Python-Programming">
                      </div>
                      <div class="col-md-7">
                        <h3 class="title">{{ $video->title }}sfsafsfsafsafafa</h3>
                      </div>
                    </div>
                  </a>
                @endforeach
              </div>
            
            </div>
  
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script>
    $(document).ready(function() {
      $(document).on('click','a.go-to', function(e){
        e.preventDefault();
        var pageURL=$(this).attr('href');
    
        history.pushState(null, '', pageURL);
      
        $.ajax({    
          type: "GET",
          url: "{{ url('') }}/ajax-video", 
          data:{page:pageURL},            
          success: function(data){  
            console.log(data.html)           
              $('#main-video').html(data.html)
          }
        });
      })
    })
  </script>


@endsection