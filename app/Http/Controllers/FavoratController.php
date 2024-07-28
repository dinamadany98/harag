<?php

namespace App\Http\Controllers;

use App\Models\Favorat;
use App\Http\Requests\StoreFavoratRequest;
use App\Http\Requests\UpdateFavoratRequest;

class FavoratController extends Controller
{
      public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $data=Favorat::where('user_id',auth()->user()->id)->get();
       return view('pucher.favorate',["data"=>$data]);
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
    public function store(StoreFavoratRequest $request)
    {
        //user_id
        $fav=Favorat::where([
            ['announcement_id',$request->announcement_id],
            ['user_id',auth()->user()->id]
        ])->get();

        if(($fav)->isEmpty()){
            $input=$request->all();
            $input['user_id']=auth()->user()->id;
            Favorat::create($input);
           
            
        }else{
            $fav1=Favorat::where([
                ['announcement_id',$request->announcement_id],
                ['user_id',auth()->user()->id]
            ])->get()->first();
            $fav1->delete(); 
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorat $favorat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorat $favorat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFavoratRequest $request, Favorat $favorat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorat $favorat)
    {
        //
    }
}
