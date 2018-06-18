<?php

namespace App\Http\Controllers;

use App\Interest;
use App\Post;
use App\Study;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        var_dump($this->getUserSuggestions()->get());
        return view('user.dashboard')->with(array('suggestions' => $this->getUserSuggestions()));
    }

//    public function search(Request $request) {
//            if($request->filter == 'study') {
//                $filtered = $this->getUserSuggestions()->where('study_name', $request->search);
//            } else {
//                $filtered = $this->getUserSuggestions()->where('interest_name', $request->search);
//            }
//
//            var_dump(json_encode($this->getUserSuggestions()));
//            //die();
//
//        return view('user.dashboard')->with(array('suggestions' => $filtered));
//    }

    public function getUserSuggestions() {
        $user = User::with('interests')->where('id', Auth::id())->get();

        $user_interests = array();
        foreach ($user[0]->interests as $interest) {
            array_push($user_interests, $interest->id);
        }

        $suggestions = Post::with('tags', 'owner.study')->whereHas('tags', function ($q) use ($user_interests) {
            $q->whereIn('interest_id', $user_interests);
        })->get();


        foreach ($suggestions as $suggestion) {
            $match_count = 0;

            foreach ($suggestion->tags as $tag) {
                if(in_array($tag->id, $user_interests)) {
                    $match_count = $match_count + 1;

                    $tag->setAttribute('matched', true);

                } else {
                    $tag->setAttribute('matched', false);
                }
            }
            $suggestion->setAttribute('match_count', $match_count);
        }

        return $suggestions;
    }

    public function myStudy() {
        $results = array();
        $studies = Study::all();
        $user = User::with('study', 'posts.tags')->where('id', Auth::id())->get();
        $results['user'] = $user[0];
        $results['studies'] = $studies;
        return view('user.study')->with($results);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addStudy(Request $request)
    {
        if($request->study == 'none') {
            $study = null;
        } else {
            $study = $request->study;
        }

        $user = User::find(Auth::id());

        $user->study_id = $study;
        $user->save();

        return redirect()->route('user.study.index');
    }

    public function settings() {
        return view('user.settings');
    }

    public function interests() {
        $interests = Interest::paginate(18);
        $userInterests = User::with('interests')->where('id', Auth::id())->get();
        return view('user.interests')->with(array('interests' => $interests, 'userInterests' => $userInterests[0]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addInterest(Request $request) {
        $user = User::find(Auth::id());
        $user->interests()->attach($request->id);

        return $request->name;
    }

    public function deleteInterest(Request $request){
        $user = User::find(Auth::id());
        $user->interests()->detach($request->id);

        return $request->name;
    }

    public function searchInterests(Request $request) {
        $userInterests = User::with('interests')->where('id', Auth::id())->get();
        $interests = Interest::where('name', 'LIKE', '%'.$request->search.'%')->get();
        return view('user.interests')->with(array('interests' => $interests, 'userInterests' => $userInterests[0]));
    }
}
