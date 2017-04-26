<?php
use App\Comment;
use Spatie\Analytics\Period;


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
Route::get('data', 'ViewController@view');
/*Route::get('/data', function () {
    $analyticsData = Analytics::fetchTopBrowsers(Period::days(14));
    dd($analyticsData);
});*/

