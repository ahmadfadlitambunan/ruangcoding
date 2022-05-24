@extends('layouts.main')

@section('container')
    <!-- SUBBAB -->
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="subbab">
        <div class="row">
          <div class="col-lg-12">
            <div class="row justify-content-center">
  
              <div class="col-lg-10 mb-3 align-self-center">
                <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                  <div class="row">
                    <h2>{{ $playlists[0]->course->name }}</h2>
                    <h5>Daftar Playlist</h5>
                  </div>
                </div>
              </div>
              
              @foreach ($playlists as $playlist)
              <div class="col-lg-5 mb-3">
                <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                  <div class="card mb-2" style="max-width: 580px;">
                    <a href="/belajar/{{ $playlist->course->id }}/{{ $playlist->id }}">  
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="https://source.unsplash.com/1280x720?Python-Programming" class="rounded-start img-fluid" alt="https://source.unsplash.com/1280x720?Python" width="10px">
                        </div>
                        <div class="col-md-7 mx-2" >
                            <p class="fs-6 fw-bold">{{ $playlist->name }}</p>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              @endforeach
  
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection