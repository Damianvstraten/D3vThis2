@extends('layouts.app')

@section('content')
    <?php
        $tagsAmount = 0;
        $tagsMax = 4;
    ?>
    <div class="container study_page">
        <h1>My Study</h1>
        <div class="my_study">
            @if(!empty($user->study))
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <div class="study_info">
                            <ul>
                                <li><img src="{{asset('images/students-cap.png')}}">{{ $user->study->name }}</li>
                                <li><img src="{{asset('images/school-building.png')}}">{{ $user->study->level }}, {{ $user->study->facility }}</li>
                                <li><img src="{{asset('images/location.png')}}">{{ $user->study->city }} </li>
                            </ul>
                        </div>

                        {{--<p class="lead">--}}
                            {{--<a class="btn btn-secondary edit" href="#" role="button">Change study</a>--}}
                        {{--</p>--}}
                    </div>
                </div>
                @else
                <form method="POST" action="{{ route('user.study.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="study_select">Add your study to help other students find their perfect study</label>
                        <select class="form-control" id="study_select" name="study">
                            <option value="none" @if($user->study_id == null) selected @endif>None</option>
                            @foreach($studies as $study)
                                <option value="{{ $study->id }}" @if($study->id == $user->study_id) selected @endif>{{ $study->name }}, {{ $study->facility }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save study</button>
                    {{ method_field('PUT') }}
                </form>
            @endif
        </div>

        @if(!empty($user->study))
            <p class="lead" style="background-color: #e9ecef; padding: 10px; border-radius: 5px">Upload all your school assignments to help other students chose their study!</p>
            <a class="btn btn-secondary" href="{{ route('posts.create') }}" role="button">Create new project</a>

            {{--<div class="assignment-row">--}}
                {{--<div class="assignment-card">--}}
                    {{--<div class="jumbotron">--}}
                        {{--<div class="assignment-header">--}}
                            {{--<h5>Create New</h5>--}}
                        {{--</div>--}}
                        {{--<div class="image-placeholder">--}}
                            {{--<h3>Image</h3>--}}
                        {{--</div>--}}
                        {{--<div class="description">--}}
                            {{--<p class="lead">Describe your project here...</p>--}}
                            {{--<hr class="my-4">--}}
                            {{--<p class="lead">--}}
                                {{--<a class="btn btn-secondary" href="{{ route('posts.create') }}" role="button">Create new</a>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        <div class="assignments">
            @foreach($user->posts->chunk(2) as $chunkedPosts)
                <div class="assignment-row">
                    @foreach($chunkedPosts as $post)
                        <div class="assignment-card">
                            <div class="jumbotron">
                                <div class="assignment-header">
                                    <h5> <a style="color: white" href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h5>
                                </div>
                                <div class="image-placeholder">
                                    <h3>Image</h3>
                                </div>
                                <div class="description">
                                    <p class="lead">{{ $post->description }}</p>
                                    <hr class="my-4">
                                    <div>
                                        @foreach($post->tags->chunk(3) as $chunkedTags)
                                            <div class="tag-row">
                                                @foreach($chunkedTags as $tag)
                                                    <span class="tag"> {{ $tag->name }}</span>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                    <p class="lead">
                                        <a class="btn btn-secondary edit" href="#" role="button">Edit</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        @endif
    </div>
@endsection