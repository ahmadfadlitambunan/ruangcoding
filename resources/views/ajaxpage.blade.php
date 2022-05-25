@foreach ($courses as $course)
<div class="col-md-2 mx-2 my-2">
    <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
      <a href="/belajar/{{ $course->id }}">
        <div class="row">
          <div class="card" style="width: 12rem;">
            <div class="card-body">
              <img class="card-img-top" src="{{ asset('storage/'. $course->image) }}">
              <h5>{{ $course->name }}</h5>
            </div>
          </div>
        </div>
      </a>
    </div>
</div>
@endforeach