<?php

use App\Http\Controllers\LegacyController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

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
    //include_once(base_path('legacy') . '/config/symbini.php');
    $lang = Cookie::get('SymbiotaCrumb');

    return view('Home', ['lang' => $lang]);
});

//Route::any('{path}', LegacyController::class)->where('path', '.*');
