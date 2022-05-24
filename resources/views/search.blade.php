@extends('layouts.main')
@section('container')

<!-- CARI -->
<div class="tombolcari">
<div class="cari-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container align-self-center">
        <div class="card mb-3 mt-3">
          <div class="card-header pl-0 pr-0">
            <div class="row no-gutters w-100 align-items-center">
              <div class="col ml-3 my-2"><b>Hasil Pencarian</b></div>
            </div>
          </div>
          
        <div class="card-body py-3">
            @if($courses->count()>0 || $playlists->count()>0 || $videos->count()>0)
            
                @foreach ($courses as $course)
                    <div class="row no-gutters align-items-center">
                        <div class="col"> 
                          <a href="/belajar/{{ $course->id }}" class="text-big" data-abc="true">{{ $course->name }}</a>
                          <div class="text-muted small"><a href="/belajar" class="text-muted" data-abc="true">Course</a></div>
                          <hr class="p-0">
                        </div>
                    </div>
                @endforeach

                @foreach ($playlists as $playlist)
                    <div class="row no-gutters align-items-center">
                        <div class="col"> 
                          <a href="/belajar/{{ $playlist->course->id }}/{{ $playlist->id }}" class="text-big" data-abc="true">{{ $playlist->name }}</a>
                          <div class="text-muted small"><a href="/playlist" class="text-muted" data-abc="true">Playlist</a></div>
                          <hr class="p-0">
                        </div>
                    </div>
                @endforeach

                @foreach ($videos as $video)
                    <div class="row no-gutters align-items-center">
                        <div class="col"> 
                          <a href="/belajar/{{ $video->playlist->course->id }}/{{ $video->playlist_id }}/{{ $video->playlist->id }}/{{ $video->id }}" class="text-big" data-abc="true">{{ $video->title }}</a>
                          <div class="text-muted small"><a href="/playlist" class="text-muted" data-abc="true">Video</a></div>
                          <hr class="p-0">
                        </div>
                    </div>
                @endforeach
            
            @else
            <div class="card-body py-3">
              <div class="row no-gutters align-items-center">
                <div class="col">
                  <h6 class="media-heading">
                    <a href="/">Tidak menemukan apapun!</a>
                  </h6>
                </div>
              </div>
            </div>
            @endif
    
        </div>
      </div>
    </div>

</div>

@endsection