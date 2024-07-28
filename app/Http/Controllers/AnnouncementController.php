<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\AnoynceImage;
use App\Models\User;
use App\Models\Comment;
use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;
use Illuminate\Http\Request;
 
class AnnouncementController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['filterdata']);
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
        
        return view('saller.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnnouncementRequest $request)
    {
        
        $input=$request->all();
        $input['user_id']=auth()->user()->id;
       $annouwnc= Announcement::create($input);
      
if($request->hasFile('photo'))
{
   $images=$request->file('photo');
   foreach ($images as $imag) {
       if($imag->isvalid()){
           $imag_path=$imag->store('/','announcements');  //store each image  
           AnoynceImage::create([
                'announce_id'=>$annouwnc->id,
                'image_name'=>$imag_path
           ]);
       }
       
   }

       
}
        return redirect("/announcement/create")->withSuccess(' تم إضافه الاعلان بنجاح ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
       
        $comments=Comment::where([
                        ['announcement_id',$announcement->id]
                       ,['saller_id',auth()->user()->id]])->get();
        return view("saller.showspacificannounce",["data"=>$announcement,"comments"=>$comments]);

    }
    public function showSallerAnnounce()
    {
        $sallerannounce=Announcement::where("user_id",auth()->user()->id)->get();
        return view('saller.showMyAnnounce',["data"=>$sallerannounce]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {

        $images=AnoynceImage::where('announce_id',$announcement->id)->get();

         return view('saller.editMyAnnounce',["data"=>$announcement,"images"=>$images]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnnouncementRequest $request, Announcement $announcement)
    {
        

        $input=$request->all();
        $announcement->update($input);
              
if($request->hasFile('photo'))
{
   $images=$request->file('photo');
   foreach ($images as $imag) {
       if($imag->isvalid()){
           $imag_path=$imag->store('/','announcements');  //store each image  
           AnoynceImage::create([
                'announce_id'=>$announcement->id,
                'image_name'=>$imag_path
           ]);
       }
       
   }
}

        




         return redirect("/sallerannounce");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        $images=AnoynceImage::where('announce_id',$announcement->id)->get();
        foreach($images as $imag){
            $imag->delete();
        }
        $announcement->delete();

        return redirect("/sallerannounce");
    }

    public function deletephoto(AnoynceImage $anoynceimage){
        //  
       
        $anoynceimage->delete(); 
        $announce_id = $_GET["announce_id"];
 
         $image=AnoynceImage::where('announce_id',$announce_id)->get();
         return response()->json(['images' => $image]);
         
         
            }

  public function filterdata($data){
   $ann= Announcement::where('department',$data)->get();
    return redirect("/")->with('message',$ann)->with("data",$data);
    
  }
  public function showmainann(Announcement $announcement){
    // dd($announcement);
    // showmainann.blade.php


$userdata=User::where('id',$announcement->user_id)->get()->first();
return view('mainview.showmainann',["announcement"=>$announcement,"user"=>$userdata]);

  }

  public function advancedsearch(Request $request){
    $announcement=Announcement::where([['department',$request->selectannounce],
    ['country',$request->selectcontary]])->get();
   
    return view('pucher.advancedsearch',["data"=>$announcement]);
  }
  public function searchdata(Request $request){
    $announcement= Announcement::where('department',$request->search)->get();
    return view('pucher.advancedsearch',["data"=>$announcement]);

  }
}
