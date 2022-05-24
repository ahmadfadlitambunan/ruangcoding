@extends('dashboard.layouts.main')
@section('container')
<div class="card shadow mb-4 mx-4">
    <div class="card-header">
      <h4>{{ $playlist->name }}</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                {{ $playlist->desc }}
            </div>
        </div>
        <hr>
        {{-- Video --}}
        {{-- <div id="courses" class="row justify-content-start">
          @foreach ($playlist->courses as $course)
          <div class="col-lg-5 mb-3">
              <div class="card mb-2" style="max-width: 580px;">
                <a href="/belajar/{{ $playlist->course->id }}/{{ $playlist->id }}">  
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="https://source.unsplash.com/1280x720?Python-Programming" class="rounded-start img-fluid" alt="https://source.unsplash.com/1280x720?Python" width="100px">
                    </div>
                    <div class="col-md-6 mx-2" >
                        <p class="fs-6 fw-bold">{{ $playlist->name }}</p>
                    </div>
                  </div>
                </a>
              </div>
          </div>
          @endforeach
        </div> --}}
    </div>
  </div>
    
@endsection