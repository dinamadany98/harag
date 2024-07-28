<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
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
    public function showpucherchat()
    {
 
        $puchchat=Chat::orderBy('id', 'desc')->where('pucher_id',auth()->user()->id)->get()
                       ->groupBy('saller_id') ;

        return view("pucher.chat",["data"=>$puchchat]);
    }

    public function getsallerchat($id){
        $pucherchat=Chat::where([
            ['saller_id', '=',  $id],
            ['pucher_id', '=', auth()->user()->id],
        ])->get();
    
        
    $user=User::where("id",$id)->get();
    
        return redirect("/showpucherchat")->with('message',$pucherchat)->with('id',$user);
     
    
    }

    public function showsallerchat()
    {
 

        $sallerchat=Chat::orderBy('id', 'desc')->where('saller_id',auth()->user()->id)->get()
        ->groupBy('pucher_id') ;




        return view("saller.chat",["data"=>$sallerchat]);
    }
public function getpucherchat($id){
    $sallerchat=Chat::where([
        ['saller_id', '=', auth()->user()->id],
        ['pucher_id', '=', $id],
    ])->get();

    
$user=User::where("id",$id)->get();

    return redirect("/showsallerchat")->with('message',$sallerchat)->with('id',$user);
 

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
    public function store(StoreChatRequest $request)
    {
        // dd($request);
        Chat::create([ 
            'saller_id'=>$request['saller_id'],
            'pucher_id'=>auth()->user()->id,
            'messagecontent'=>$request['messagecontent'],
            'type'=>"recived"
        ]);
        return back()->withSuccess(' تم إرسال الرساله بنجاح ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChatRequest $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        //
    }
    public function mynotification(){


        $user =User::find(auth()->user()->id);
 
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        return view("saller.mynotifications");
    }

    
    public function addmessagetwo(){
        $pucerid = $_GET["pucerid"];
        $messagecontent = $_GET["messagecontent"];
        Chat::create([ 
            'saller_id'=>$pucerid,
            'pucher_id'=>auth()->user()->id,
            'messagecontent'=>$messagecontent,
            'type'=>"recived"
        ]);
        return response()->json(['message' => "done"]);

    }






    public function addmessage(){
        $pucerid = $_GET["pucerid"];
        $messagecontent = $_GET["messagecontent"];
        Chat::create([ 
            'saller_id'=>auth()->user()->id,
            'pucher_id'=>$pucerid,
            'messagecontent'=>$messagecontent,
            'type'=>"send"
        ]);
        return response()->json(['message' => "done"]);

    }
}
