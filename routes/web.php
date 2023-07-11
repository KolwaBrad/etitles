<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtitlesController;
use App\Http\Controllers\Block;
use App\Http\Controllers\Blockchain;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MarketPlace;
use App\Http\Controllers\TransactionController;


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
    return view('welcome');
});
Route::get('/login',[EtitlesController::class,'login'])->middleware('alreadyLoggedIn');
Route::get('/signup',[EtitlesController::class,'signup'])->middleware('alreadyLoggedIn');
Route::post('/actionsignup',[EtitlesController::class,'actionsignup'])->name('actionsignup');
Route::post('/actionlogin',[EtitlesController::class,'actionlogin'])->name('actionlogin');
Route::get('/dashboard',[EtitlesController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/logout',[EtitlesController::class,'logout']);
Route::get('/sendMail',[EtitlesController::class,'sendMail']);
Route::get('/forgotpassword',[EtitlesController::class,'forgotpassword']);
Route::get('/recovercode',[EtitlesController::class,'recovercode']);
Route::post('/actionforgotpassword',[EtitlesController::class,'actionforgotpassword'])->name('actionforgotpassword');
Route::post('/actionchangepassword',[EtitlesController::class,'actionchangepassword'])->name('actionchangepassword');
Route::get('/confirmrecovery',[EtitlesController::class,'confirmrecovery']);
Route::get('/passwordchanged',[EtitlesController::class,'passwordchanged']);
Route::get('/activateaccount',[EtitlesController::class,'activateaccount']);
Route::post('/actionactivateaccount',[EtitlesController::class,'actionactivateaccount'])->name('actionactivateaccount');
Route::get('/accountactivated',[EtitlesController::class,'accountactivated']);
Route::get('/activationsent',[EtitlesController::class,'activationsent']);

Route::get('/landadded',[Blockchain::class,'landadded']);

Route::get('/addland',[Blockchain::class,'addland']);
Route::get('/viewlands',[Blockchain::class,'viewlands']);
Route::get('/alllands',[Blockchain::class,'alllands']);
Route::post('/addTitle',[Blockchain::class,'addTitle'])->name('addTitle');
Route::post('/storeImage',[Blockchain::class,'storeImage'])->name('storeImage');

Route::get('/admin',[EtitlesController::class,'admin']);
Route::get('/adminlogin',[EtitlesController::class,'adminlogin'])->middleware('adminalreadyLoggedIn');
Route::get('/adminsignup',[EtitlesController::class,'adminsignup'])->middleware('adminalreadyLoggedIn');
Route::post('/actionadminsignup',[EtitlesController::class,'actionadminsignup'])->name('actionadminsignup');
Route::post('/actionadminlogin',[EtitlesController::class,'actionadminlogin'])->name('actionadminlogin');
Route::get('/admindashboard',[EtitlesController::class,'admindashboard'])->middleware('adminisLoggedIn');
Route::get('/adminlogout',[EtitlesController::class,'adminlogout']);
Route::get('/sendMail',[EtitlesController::class,'sendMail']);
Route::get('/adminforgotpassword',[EtitlesController::class,'adminforgotpassword']);
Route::get('/adminrecovercode',[EtitlesController::class,'adminrecovercode']);
Route::post('/actionadminforgotpassword',[EtitlesController::class,'actionadminforgotpassword'])->name('actionadminforgotpassword');
Route::post('/actionadminchangepassword',[EtitlesController::class,'actionadminchangepassword'])->name('actionadminchangepassword');
Route::get('/adminconfirmrecovery',[EtitlesController::class,'adminconfirmrecovery']);
Route::get('/adminpasswordchanged',[EtitlesController::class,'adminpasswordchanged']);
Route::get('/adminactivateaccount',[EtitlesController::class,'adminactivateaccount']);
Route::post('/actionadminactivateaccount',[EtitlesController::class,'actionadminactivateaccount'])->name('actionadminactivateaccount');
Route::get('/adminaccountactivated',[EtitlesController::class,'adminaccountactivated']);
Route::get('/adminactivationsent',[EtitlesController::class,'adminactivationsent']);

Route::get('/addblocks',[Blockchain::class,'addblocks']);
Route::get('/addmoreblocks',[Blockchain::class,'addmoreblocks']);
Route::get('/blockcommands',[Blockchain::class,'blockcommands']);
Route::get('/updateblocks',[Blockchain::class,'updateblocks']);
Route::get('/viewblocks',[Blockchain::class,'viewblocks']);
Route::get('/interactWithSmartContract', [Controller::class, 'interactWithSmartContract']);
Route::get('/index',[Blockchain::class,'index']);
Route::get('/blockchainindex',[Blockchain::class,'blockchainindex']);

Route::post('/storemessage',[MessageController::class,'storemessage'])->name('storemessage');
Route::get('/getmessages',[MessageController::class,'getmessages']);

//Route::get('/chatarea',[MessageController::class,'chatarea']);
Route::get('/allchats',[MessageController::class,'allchats']);
Route::get('/replychatarea',[MessageController::class,'replychatarea']);
Route::get('/chatarea', [MessageController::class, 'chatarea']);

Route::get('/markettitles', [MarketPlace::class, 'markettitles']);
Route::get('/allmarketplace', [MarketPlace::class, 'allmarketplace']);

Route::post('/requestpurchase', [TransactionController::class, 'requestpurchase'])->name('requestpurchase');
Route::get('/mytransactions', [TransactionController::class, 'mytransactions']);
Route::get('/incomingrequests', [TransactionController::class, 'incomingrequests']);
Route::get('/outgoingrequests', [TransactionController::class, 'outgoingrequests']);
Route::get('/appincomingrequests', [TransactionController::class, 'appincomingrequests']);
Route::get('/appoutgoingrequests', [TransactionController::class, 'appoutgoingrequests']);
Route::get('/rejincomingrequests', [TransactionController::class, 'rejincomingrequests']);
Route::get('/rejoutgoingrequests', [TransactionController::class, 'rejoutgoingrequests']);
Route::post('/respondrequest', [TransactionController::class, 'respondrequest'])->name('respondrequest');
Route::post('/completerequest', [TransactionController::class, 'completerequest'])->name('completerequest');

Route::get('/pendingrequests',[EtitlesController::class,'pendingrequests']);
