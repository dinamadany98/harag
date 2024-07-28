<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Http\Requests\StoreRateRequest;
use App\Http\Requests\UpdateRateRequest;

class RateController extends Controller
{
      public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRateRequest $request)
    {
        $input=$request->all();
        $input['pucher_id']=auth()->user()->id;
        Rate::create($input);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Rate $rate)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rate $rate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRateRequest $request, Rate $rate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rate $rate)
    {
        //
    }
}
