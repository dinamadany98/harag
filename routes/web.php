<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoratController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
     return view('mainview.home');
});
Route::get('/sallerhome', function () {
    return view('saller.sallerhome');
});
 
Route::resource('/announcement',AnnouncementController::class);
Route::resource('/comment',CommentController::class);
Route::resource('/favorat',FavoratController::class);
Route::resource('/report',ReportController::class);
Route::resource('/chat',ChatController::class);

Route::get('/sallerannounce',[AnnouncementController::class,"showSallerAnnounce"]);
Route::POST('/advancedsearch',[AnnouncementController::class,"advancedsearch"]);
Route::POST('/searchdata',[AnnouncementController::class,"searchdata"]);
Route::get('/showtables/{announcement}',[AnnouncementController::class,"showtables"]);
Route::get('/mynotification',[ChatController::class,"mynotification"]);
Route::get('/deletephoto/{anoynceimage}',[AnnouncementController::class,"deletephoto"]);
Route::get('/filterdata/{data}',[AnnouncementController::class,"filterdata"]);
Route::get('/showmainann/{announcement}',[AnnouncementController::class,"showmainann"]);
Route::get('/showsallerchat',[ChatController::class,"showsallerchat"]);
Route::get('/showpucherchat',[ChatController::class,"showpucherchat"]);
Route::get('/get_pucher_chat/{id}', [ChatController::class,"getpucherchat"])->name('get_pucher_chat');
Route::get('/get_saller_chat/{id}', [ChatController::class,"getsallerchat"])->name('get_saller_chat');
Route::get('/addmessage', [ChatController::class,"addmessage"])->name('addmessage');
Route::get('/addmessagetwo', [ChatController::class,"addmessagetwo"])->name('addmessagetwo');
Route::resource('/rate',RateController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        if(auth()->user()->role =="saller"){
            return view('saller.dashbordsaller');

        }else{
            return redirect('/');

        }
    })->name('dashboard');
});
