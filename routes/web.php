<?php

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
use Carbon\Carbon;
use App\Models\SubInitiation;
use App\User;

Route::get('/', function () {
    // Detect alpha inside Start Date
    // $datez = 'Agus 2020';
    // $datez = '20/10/2020';
    // if (preg_match('/[a-zA-Z]+/i', $datez, $matches)) {
    //     return $matches;
    // } else {
    //     return $datez;
    // }
    // $stringx = '123e';
    // // $stringx = '8201031284, 8201031285';
    // if (!preg_match('/[0-9]+/i', $stringx, $matches)) {
    //     return 'null';
    // } else {
    //     return $stringx;
    // }
    $planner_id = User::where('name', 'LIKE', '%Guntur Yulianto%')->get();

    // $sub_inisiasi_id = SubInitiation::where('name', 'LIKE', 'rkap%')->get();
return $planner_id;
    return view('welcome');
    return Carbon::now()->addDays(2);
});
Route::get('read_csv', 'ReadCsvController@index');