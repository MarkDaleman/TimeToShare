<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchUsers(Request $request)
    {
        return User::where('name', 'LIKE', '%'.$request->q.'%')->get();
    }
}
