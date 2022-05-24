@extends('layouts.main')

@section('container')
    <!-- KELAS -->
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="kelas">
        <div class="row">
          <div class="col-lg-12">
            <div class="row justify-content-center">
  
              <div class="col-md-5 mb-5 align-self-center">
                <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                  <div class="row">
                    <div class="card" style="width: 70rem;">
                      
                        <div class="select-box">
                          <label for="plans" class="label select-box1">
                            <h5><span class="label-desc">Pilih Kelas</span></h5>
                          </label>
                          <select id="plans" class="select" onchange="updateCourses()">
                            @foreach ($plans as $plan)
                            <option class="card" value="{{ $plan->id }}"><h5>{{ $plan->name }}</h5></option>
                            @endforeach
                          </select>             
                        </div>
  
                    </div>
                  </div>
                </div>
              </div>

            <div id="courses" class="row justify-content-center">
              @foreach ($plans[0]->courses as $course)
              <div class="col-md-2 mx-1 my-2">
                <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                    <a href="/belajar/{{ $course->id }}">
                    <div class="row">
                      <div class="card" style="width: 12rem;">
                        <div class="card-body">
                          <img class="card-img-top" src="/images/{{ $course->image }}">
                          <h5 class="text-decoration-none">{{ $course->name }}</h5>
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
        </div>
      </div>
    </div>
  </div>
</div>

  <script>
    function updateCourses(){
      let plan_id = $('#plans').val();
      $.ajax({
        url : "{{ url('') }}/ajax",
        data : "id=" + plan_id,
        success : function(data){
          $('#courses').html(data); 
        }
      });
    };

  </script>

  
@endsection
