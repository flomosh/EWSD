<?php

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

use App\Contribution;
use App\Faculty;
use App\User;
use App\Year;

use Illuminate\Http\Request;

Route::get('/', function () {
    if(Auth::user()->type == 'default'){
        return redirect('/submit');
    }
    if(Auth::user()->type == 'admin'){
        return redirect('/coordinator');
    }
    if(Auth::user()->type == 'superadmin'){
        return redirect('/admin');
    }
})->middleware('auth');

Route::get('/submit', function () {
    $years = year::get()->first();
    $contributions = contribution::all()->where('submitted_by', Auth::user()->id);
    return view('submit', compact('contributions','years'));
})->middleware('auth');

Route::get('/admin', function () {
    $contributions = contribution::all()->where('status', 3);
    $users = user::all();
    $faculties = faculty::all();
    return view('dashboard', compact('contributions','users','faculties'));
})->middleware('is_super');

Route::get('/faculty', function () {
    $users = user::all();
    $faculties = faculty::all();
    return view('faculties', compact('users','faculties'));
})->middleware('is_super');

Route::get('/users', function () {
    $users = user::all()->where('type','!=','superadmin');
    $faculties = faculty::all();
    return view('users', compact('users','faculties'));
})->middleware('is_super');

Route::get('/contributors', function () {
    $users = user::all()->where('faculty','!=',Auth::user()->faculty);
    return view('contributors', compact('users'));
})->middleware('is_admin');

Route::get('/coordinator', function () {
    $contributions = contribution::all();
    $users = user::all();
    $faculties = faculty::all();
    return view('coordinator', compact('users','faculties','contributions'));
})->middleware('is_admin');

Route::get('/closure', function () {
    $years = year::all();
    return view('closure', compact('years'));
})->middleware('is_super');

Route::post('/newyear', function (Request $request) {
    $year = new year();
    $year->year = $request->input('year');
    $year->closure_date = $request->input('closure_date');
    $year->final_closure_date = $request->input('final_closure_date');
    $year->save();

    return redirect()->back();
})->middleware('is_super');

Route::get('/report', function () {
    $contributions = contribution::all();
    $users = user::all();
    $faculties = faculty::all();
    $years = year::all();
    return view('report', compact('contributions','users','faculties','years'));
});

Auth::routes(['reset' => false]);

Route::get('/register', 'Auth\RegisterController@showForm')->name('register');
Route::post('role/{id}', 'SuperController@role');
Route::post('new-faculty', 'SuperController@faculty');
Route::post('review/{id}', 'CoordinatorController@review');
Route::resource('submission', 'SubmissionController');