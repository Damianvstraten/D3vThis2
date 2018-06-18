<?php

namespace App\Http\Controllers;

use App\Interest;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    public function search(Request $request) {
        $interests = Interest::where('name', 'LIKE', '%'.$request->search.'%')->limit(5)->get();
        return $interests;
    }
}
