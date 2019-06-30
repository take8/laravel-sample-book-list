<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * 新しいインスタンスの生成
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 一覧
     *
     * @return Response
     */
    public function index() {
        // booksテーブルを参照する(Railsのアクティブレコードのイメージ)
        $books = Book::all();

        return view('books', [
            'books' => $books
        ]);
    }

    /**
     * 登録
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) {
        // バリデーション
        // バリデーションに失敗すれば、適切なレスポンスが自動的に生成されます。
        // バリデーションに成功すれば、コントローラは続けて通常通り実行されます。
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $book = new Book; // Eloquent ORM: ORMがテーブルとオブジェクトをマッピングしてくれる
        $book->title = $request->title;
        $book->save();

        return redirect('/');
    }

    /**
     * 削除
     *
     * @param Book $book
     * @return Response
     */
    public function destroy(Book $book) {
        $book->delete();

        return redirect('/');
    }
}
