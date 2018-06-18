@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="post-header">
            <h1> {{ $post->title }}</h1>
            <h5> <i>by {{ $post->owner->name }}</i></h5>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="post-image">
                    <h2>Image</h2>
                </div>
                <div class="post-tags">
                    <ul>
                        @foreach($post->tags as $tag)
                            <li>{{ $tag->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="post-description">
                    {{ $post->description }}
                </div>
            </div>
            <div class="col-md-5">
                <div class="study_info">
                    <ul>
                        <li><img src="{{asset('images/students-cap.png')}}"> {{ $post->study->name }} </li>
                        <li><img src="{{asset('images/school-building.png')}}">{{ $post->study->level }}, {{ $post->study->facility }} </li>
                        <li><img src="{{asset('images/location.png')}}"> {{ $post->study->city }} </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection