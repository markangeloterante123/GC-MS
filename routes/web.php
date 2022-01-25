<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\SalaryHistoryController;
use App\Http\Controllers\GoogleSocialiteController;
use App\Http\Controllers\ReprimandUserController;
use App\Http\Controllers\ReprimandDetailController;
use App\Http\Controllers\MemoController;


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

Route::get('/auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('/callback/google', [GoogleSocialiteController::class, 'handleCallback']);

Route::get('/', function () {
    return redirect('/login');
});

Route::group([ "middleware" => ['auth:sanctum', 'verified'] ], function() {
    Route::view('/dashboard', "dashboard")->name('dashboard');

    Route::get('/user', [ UserController::class, "index_view" ])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');

    // Client Information
    Route::view('/client', "pages.client.client-data")->name('client');

    //View Profile
    Route::get('/user/info', [ UserController::class, "user_file" ])->name('user.info');
    Route::get('/user/information/{userId}', [ UserController::class, "userInformations" ])->name('user.information');

    //update user information routes
    Route::view('/update/account',"pages.user.user-update-profile" )->name('update.account');
    Route::view('/update/password',"pages.user.user-update-password" )->name('update.password');
    Route::view('/update/setting',"pages.user.user-setting" )->name('update.setting');
    Route::put('/update/user/info/{id}', [ UserController::class, "user_update" ])->name('update.user.info');

    //adding user setting 
    Route::get('/setting/options', [ OptionsController::class, "index" ])->name('setting.options');
    Route::put('/setting/add/{type}', [ OptionsController::class, "create"])->name('setting.add');
    Route::delete('/setting/remove/{id}', [ OptionsController::class, "destroy" ])->name('setting.remove');

    //salary informations
    Route::put('/setting/salary/update/{id}', [ SalaryHistoryController::class, "store" ])->name('setting.salary.update');
    Route::put('/setting/salary/edit/{id}', [ SalaryHistoryController::class, "edit" ])->name('setting.salary.edit');

    // Reprimands Details
    Route::get('/reprimand/details', [ ReprimandDetailController::class, "index" ])->name('reprimand.detail');
    Route::put('/reprimand/add/{author}',[ ReprimandDetailController::class, "create" ])->name('reprimand.add');
    Route::delete('/reprimand/delete/{id}', [ ReprimandDetailController::class, "destroy" ])->name('reprimand.delete');
    Route::get('/reprimand/edit/{id}', [ ReprimandDetailController::class, "edit" ])->name('reprimand.edit');
    Route::put('/reprimand/update/{id}', [ ReprimandDetailController::class, "update" ])->name('reprimand.update');
    
    //Send reprimands to its users
    Route::get('/send/reprimand/{id}', [ ReprimandUserController::class, "index"])->name('send.reprimand');
    Route::put('/send/user/reprimand/{userId}',[ ReprimandUserController::class, "create"] )->name('send.user.reprimand');

    // Memo Notes
    Route::get('/memo/details', [ MemoController::class, "index" ])->name('memo.details');
    Route::put('/memo/add/{author}', [ MemoController::class, "create" ])->name('memo.add');
    Route::delete('/memo/delete/{id}', [ MemoController::class, "destroy" ])->name('memo.delete');
    Route::get('/memo/edit/{id}', [ MemoController::class, "edit" ])->name('memo.edit');
    Route::put('/memo/update/{id}', [ MemoController::class, "update" ])->name('memo.update');

    //Import and Exporting User information
    Route::get('export', [UserController::class, "export"])->name("export");
    Route::post("import", [UserController::class, "import"])->name('import');

});
