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

    Route::post('/books', function(Request $request) {
        // バリデータの生成
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
        ]);

        // バリデーション実行
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $book = new Book; // Eloquent ORM: ORMがテーブルとオブジェクトをマッピングしてくれる
        $book->title = $request->title;
        $book->save();

        return redirect('/');
    });

    // Implicit Binding(Laravel 5.2から)
    // {book}はIDが入る。引数の$bookにはそのIDが該当するBookが入る。
    Route::delete('/books/{book}', function(Book $book) {
        $book->delete();

        return redirect('/');
    });
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
