<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    public function store(Request $request, $id) {
        
        dd($);
        $token = Str::random(30);
        $user = User::findOrFail($id);
        $user->api_token = $token;
        $user->push();

        return back()->with()
    }
}
