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
use App\Models\ProductionArea;

Route::get('/', function () {
    // $data = 'LOC II, LOC III, PARAXYLENE, UTILITIES RFCC, RFCC, FOC I';
    $data = 'SRU, UTILITIES 50';
    $AH = explode(', ', $data);
    foreach ($AH as $ex => $vl) {
        $PA = ProductionArea::where('name', $vl)->first();
        echo $PA->id.'<br>';
    }
    dd($AH);
    return '';
    return view('welcome');
});
Route::get('read_csv', 'ReadCsvController@index');