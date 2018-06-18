@extends('layouts.app')

@section('content')
    <div class="page_container">
        <h1 class="page_title">My Interests</h1>

        <div class="my_interests">
            @if(count($userInterests->interests) > 0)
                @foreach($userInterests->interests as $interest)
                    <div class="my_interest">
                        <div class="interest_name"> {{ $interest->name }} </div>
                        <div class="delete_interest" data-title="{{$interest->id}}" data-content="{{ $interest->name }}">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                @endforeach
            @else
                <div> You have no interests set yet!</div>
            @endif
        </div>

        <div class="interest_container">
            <div class="title" style="padding-left: 20px">
                <h3>Add your interests, so we can show you relevant content</h3>
            </div>

            <div>
                <form action="{{ route('user.interests.search') }}" method="GET" id="interest_search" autocomplete="nope">
                    <div class="input-group mb-3">
                        <input style="background-color: #dddddd" type="text" class="form-control" placeholder="Search for interests..." name="search">
                        <div class="input-group-append">
                            <button class="search_button btn btn-outline-secondary" type="button">Search</button>
                            <a style="color: white; font-weight: bold" class=" btn btn-secondary" href="{{ route('user.interests') }}">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
            @foreach($interests->chunk(6) as $chuckedInterests)
                <div class="content-row">
                    @foreach($chuckedInterests as $interest)
                        <div class="interest-wrapper">
                            <div class="interest">
                                <div>{{$interest->name}}</div>
                            </div>
                            <input type="text" value="{{$interest->id}}" name="interest" style="display: none">
                            <button class="btn add_interest" type="submit" data-title="{{$interest->id }}" data-content="{{ $interest->name }}">
                                <i class="fas fa-plus"></i>
                                <span>Add</span>
                            </button>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        @if(!empty($interests->links))
            {{ $interests->links() }}
        @endif
        <span class="add_message"></span>
    </div>
@endsection