<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\createCommentNotification;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class CommentController extends Controller
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
    public function store(StoreCommentRequest $request)
    {
        $input=$request->all();
        $input['user_id']=auth()->user()->id;
        Comment::create($input);
        $user_create=auth()->user()->name;
        $users=User::where('id',$request->saller_id)->get();
        Notification::send($users, new createCommentNotification($request->announcement_id,$user_create)); //$users->users that i will send notification 

        return back();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
