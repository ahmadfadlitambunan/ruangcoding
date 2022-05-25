@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="card shadow mb-4 mx-4">
        <div class="card-header">
            <p class="h3 mb-0 text-gray-800">Detail Video</p>
        </div>
        <div class="card-body">
            <div id="courses" class="row">
                <div class="col-12">
                    <p class="h3 mb-0 text-gray-800">Thumbnail   :</p>
                    @if ($video->thumb_img)
                    <img src="{{ asset('storage/'. $video->thumb_img) }}" alt="{{ $video->title }}">
                    @else
                    <img src="{{ asset('storage/'. $video->playlist->course->image) }}" alt="{{ $video->title }}">
                    @endif
                </div>
                <div class="col-4 ml-3">
                    <p class="h3 mb-0 text-gray-800">Playlist :</p>
                </div>
                <div class="col-6">
                    <p class="h3 mb-0 text-gray-800">{{ $video->playlist->name }}</p>
                </div>
                <div class="col-12 ml-3 my-4">
                    <div class="main-video" id="main-video">
                    <div class="video">
                    <video src="{{ asset('storage/' . $video->file_name) }}" controls style="width: 720px"></video>
                    </div>
                    </div>            
                </div>
                <div class="col-12 ml-3">
                    <h3 class="h3 mb-0 text-gray-800 py-3">{{ $video->title }}</h3>
                    <p>{!! $video->desc !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection