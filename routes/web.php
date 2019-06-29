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
    Route::get('/', function() {
        // booksテーブルを参照する(Railsのアクティブレコードのイメージ)
        $books = Book::all();
        return view('books', [
            'books' => $books
        ]);
    });

    Route::post('/books', function() {

    });

    Route::delete('/books/{book}', function(Book $book) {

    });
});
