@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="study-info">
            <h1>{{ $study->name }}</h1>
            <h3>{{ $study->level }}, {{ $study->facility }}</h3>
            <h4>{{ $study->city }}</h4>
        </div>
    @foreach($study->posts as $post)
        {{ $post->title }}
    @endforeach
    </div>
@endsection