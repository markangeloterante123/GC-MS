<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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
    return view('welcome');
});

Route::group([ "middleware" => ['auth:sanctum', 'verified'] ], function() {
    Route::view('/dashboard', "dashboard")->name('dashboard');

    Route::get('/user', [ UserController::class, "index_view" ])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');

    //View Profile
    Route::get('/user/info', [ UserController::class, "user_file" ])->name('user.info');
    Route::get('/user/information/{userId}', [ UserController::class, "userInformations" ])->name('user.information');

    //update user information routes
    Route::view('/update/account',"pages.user.user-update-profile" )->name('update.account');
    Route::view('/update/password',"pages.user.user-update-password" )->name('update.password');
    Route::view('/update/setting',"pages.user.user-setting" )->name('update.setting');
    Route::put('/update/user/info/{id}', [ UserController::class, "user_update" ])->name('update.user.info');

    //Import and Exporting User information
    Route::get('export', [UserController::class, "export"])->name("export");
    Route::post("import", [UserController::class, "import"])->name('import');

});
