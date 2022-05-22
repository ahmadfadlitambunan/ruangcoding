@extends('dashboard.layouts.main')

@section('container')
<div class="card shadow mb-4 mx-4">
  <div class="card-header">
    <h4>Daftar Kelas di {{ $plan->name }}</h4>
  </div>
  <div class="card-body">
    <div id="courses" class="row justify-content-center">
        @foreach ($plan->courses as $course)
        <div class="col-md-2 mx-1 my-2">
          <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
              <a href="/belajar/{{ $course->id }}" class="text-decoration-none">
              <div class="row">
                <div class="card" style="width: 12rem;">
                  <div class="card-body">
                    <img class="card-img-top" src="/images/{{ $course->image }}">
                    <h5 class="text-center">{{ $course->name }}</h5>
                  </div>
                </div>
              </div>
            </a>
            </div>
          </div>
        @endforeach
    </div>
  </div>
</div>
@endsection