<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTokenRequest;
use App\Http\Requests\UpdateTokenRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTokenRequest $request)
    {
        $user = auth()->user();
        // check user hav token or not
        if(auth()->user()->user_token()) {
            return back()->withSuccess('Already Created!');
        } else {
            DB::beginTransaction();
            $token = Str::random(30);
            $user->api_token = $token;
            $user->push();
            DB::commit();
            return back()->withSuccess('User Token Created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTokenRequest $request, $id)
    {
        $user = User::findOrFail($id);
        // check user hav token or not
        if(auth()->user()->user_token()) {
            DB::beginTransaction();
            $user->api_token = Str::random(30);
            $user->push();
            DB::commit();
            return back()->withSuccess('User Token Refreshed!');
        } else {
            return back()->withWarning('Refresh Failed!');
        }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        // check user hav token or not
        if(auth()->user()->user_token()) {
            DB::beginTransaction();
            $user->api_token = null;
            $user->push();
            DB::commit();

            return back()->withSuccess('User Token Deleted!');
        } else {
            return back()->withWarning('Delete Failed!');
        }
        
    }
}
