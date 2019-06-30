<?php

use App\Book;
use Illuminate\Http\Request;

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

// Route::get('/', function () {
//     // return view('welcome');
//     return view('books');
// });

// ブラウザからアクセスされた場合
Route::group(['middleware' => ['web']], function() {
    // Routeファサード
    Route::get('/', 'BooksController@index');

    Route::post('/books', 'BooksController@store');

    // Implicit Binding(Laravel 5.2から)
    // {book}はIDが入る。クロージャの引数の$bookにはそのIDが該当するBookが入る。
    Route::delete('/books/{book}', 'BooksController@destroy');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
