<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\StoreTownshipRequest;
use App\Http\Requests\UpdateTownshipRequest;
use App\Township;
use Illuminate\Http\Request;

class TownshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $townships = Township::cursor();
        return view('township.index', compact('townships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::get(['name', 'id']);
        return view('township.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTownshipRequest $request)
    {
        $township = Township::create([
            'name' => ucfirst($request->name),
            'city_id' => $request->my_city
        ]);

        return back()->with('status', $township->name.' successfully created!');
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
        $township = Township::findOrFail($id);
        return view('township.edit', compact('township'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTownshipRequest $request, $id)
    {   
        
        $township = Township::findOrFail($id);
        $township->name = $request->name;
        $township->push();

        return back()->withSuccess('Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $township = Township::findOrFail($id);
        $township->delete();

        return back()->with('status', 'Successfully Deleted!');
    }
}
