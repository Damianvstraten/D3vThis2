@extends('layouts.app')

@section('content')
    <div class="container suggestions-page">
        <h1>My Content</h1>

        <div class="content_search_form">
            <form class=" form-filter form-inline" method="GET" action="{{ route('user.search') }}">
                {{--<label class="mr-sm-2" for="inlineFormCustomSelect">Preference</label>--}}
                <select name="filter" class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
                    <option selected disabled>Filter by preference</option>
                    <option value="study">Study</option>
                    <option value="interest">Interest</option>
                </select>
                <input style="margin-right: 10px" name="search" class="form-control" type="text" placeholder="Search....">
                <input class="form-control" type="submit" value="Search">
            </form>
            <form class="form-sort form-inline">
                <select name="filter" class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
                    <option selected disabled>Sort by</option>
                    <option value="study">Newest</option>
                    <option value="interest">Oldest</option>
                    <option value="interest">Most Likes</option>
                    <option value="interest">Popular</option>
                </select>
            </form>
        </div>

        <div class="suggestions-list">
            @if(count($suggestions) > 0)
                {{--@foreach($suggestions->sortByDesc('match_count')->chunk(2) as $chuckSuggestions)--}}
                    {{--<div class="suggestions-row">--}}
                        @foreach($suggestions->sortByDesc('match_count') as $suggestion)
                           <div class="suggestion">
                               <div class="suggestion-body">
                                   <div class="left-side">
                                       <h3> <a href="{{ route('posts.show', $suggestion->id) }}"> {{ $suggestion->title }} </a></h3>
                                       <p> {{ $suggestion->description }}</p>
                                   </div>
                                   <div class="right-side">
                                       <div class="study_info">
                                           <ul>
                                               <li><img src="{{asset('images/students-cap.png')}}"><a href="{{ route('study.show', $suggestion->owner->study->id) }}">{{ $suggestion->owner->study->name }}<i style="margin-left: 10px" class="fas fa-caret-right"></i></a></li>
                                               <li><img src="{{asset('images/school-building.png')}}">{{ $suggestion->owner->study->level }}, {{ $suggestion->owner->study->facility }}</li>
                                               <li><img src="{{asset('images/location.png')}}">{{ $suggestion->owner->study->city }} </li>
                                           </ul>
                                       </div>
                                       <div class="tag_list">
                                           <?php $tagsAmount = 0; $tagsMax = 3; ?>
                                            @foreach($suggestion->tags->sortByDesc('matched') as $tag)
                                               <?php $tagsAmount++ ?>
                                               @if($tagsAmount <= $tagsMax)
                                                       <span class="tag @if($tag->matched == true) matched @endif ">@if($tag->matched == true) <i class="fas fa-heart" style="margin-right: 5px"></i> @endif {{ $tag->name }}</span>
                                               @endif
                                           @endforeach
                                           @if(count($suggestion->tags) > $tagsMax)
                                               <span> and <b style="font-size: 16px">{{ count($suggestion->tags) - $tagsMax }}</b> more</span>
                                           @endif
                                       </div>
                                   </div>
                               </div>
                               <div class="suggestion-footer">
                                   <h6 style="font-style: italic">by {{ $suggestion->owner->name }}</h6>
                                   <ul>
                                       <li><span>{{ $suggestion->match_count }}</span><img src="{{asset('images/valentines-heart.png')}}"></li>
                                       <li><span>4</span><img src="{{asset('images/thumbs.png')}}"></li>
                                       <li><span>7</span><img src="{{asset('images/star.png')}}"></li>
                                   </ul>
                               </div>

                               {{--<div class="match_results"><i class="fas fa-heart"><span class="match_count">{{ $suggestion->match_count }}</span></i></div>--}}
                           </div>
                        @endforeach
                    {{--</div>--}}
                {{--@endforeach--}}
            </div>
        @else
            <span>There are no projects that match your interests!</span>
            <a href="{{ route('user.interests') }}" class="btn" style="background-color: #4eda8c; display: block; width: 150px; margin-top: 10px; color: white">Add interests</a>
        @endif
    </div>
@endsection