<?php

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
    return view('welcome');
});
Route::view('/', 'welcome');

// Route::match(['get','put'],'users', function () {
//     return '<h1>Hello</h1>';
// });
// Route::any('users', function () {
//     return '<h1>Hello</h1>';
// });
// Route::get('posts/create', 'App\Http\Controllers\PostController@create');
// Route::post('posts', 'App\Http\Controllers\PostController@store');

// Route::get('students/create', 'App\Http\Controllers\StudentController@create');
// Route::get('students/{id}/edit', 'App\Http\Controllers\StudentController@edit')->name('students.edit');
// Route::put('students/{id}', 'App\Http\Controllers\StudentController@update')->name('students.update');
// Route::delete('students/{id}', 'App\Http\Controllers\StudentController@destroy')->name('students.destroy');
// Route::post('students','App\Http\Controllers\StudentController@store');
// Route::get('students','App\Http\Controllers\StudentController@index')->name('students.index');

Route::resource('students','App\Http\Controllers\StudentController')->middleware('auth');


Route::prefix('contacts')->group(function(){
    Route::get('', 'App\Http\Controllers\ContactsController@index');
    Route::post('','App\Http\Controllers\ContactsController@index2');
    Route::get('/{id}','App\Http\Controllers\ContactsController@index3' );
    Route::get('/{id}/edit', 'App\Http\Controllers\ContactsController@index4');
    Route::get('/{id}/{name?}','App\Http\Controllers\ContactsController@index5');
    // ->where('name','.*')->name('list');
    Route::put('/{id}','App\Http\Controllers\ContactsController@index6' );
    Route::delete('/{id}','App\Http\Controllers\ContactsController@index7' );

});


// Route::redirect( 'student','users');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::fallback(function(){
//add to logs
//send mail
return'Error Page';
});
