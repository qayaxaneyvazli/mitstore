<?php

use App\Models\Device;
use App\Models\Ydm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DevicesController;
use App\Http\Controllers\YdmController;
use App\Http\Controllers\DataPageController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {



    if(Auth::user()){

        return redirect('dashboard');
    }

            return view('socar');



});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $devices=Device::all();
    $ydms=Ydm::all();
    return view('dashboard',compact('devices','ydms'));
})->name('dashboard');




Route::post('/dashboard',[DevicesController::class, 'addDevice'])->name('addDevice');

Route::get('/datas',[DataPageController::class, 'showInfo'])->name('showInfo');
Route::post('/datas',[DataPageController::class, 'getInfo'])->name('getInfo');

Route::get('/update/{id}/{device}',[DataPageController::class, 'edit'])->name('editData');

Route::put('/update',[DataPageController::class, 'edit'])->name('editData');

Route::post('/updateInfos/{id}',[DataPageController::class, 'updateInfos'])->name('updateInfos');

//Route::post('/update',[DataPageController::class, 'updateData'])->name('editData');
 //Route::put('/updateData',[DataPageController::class, 'updateData'])->name('updateData');

Route::delete('/deleteData', [DataPageController::class, 'delete'])->name('delete');
