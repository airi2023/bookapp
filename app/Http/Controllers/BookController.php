<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class BookController extends Controller
{
    //DBの登録データを一覧表示-----------------------------------------
    public function index(Request $request)
    {
        $items = Book::all(); //Bookモデルを通じて、booksテーブルの全項目を取得（all()メソッド）
        return view('book.index', ['items' => $items]); //①index.blade.php呼び出し、⓶変数itemsの値として「$items」(Book::all();)を渡す
    }

    //投稿を新規追加-----------------------------------------
    public function add(Request $request)
    {
        return view('book.add'); //bookフォルダのadd.blade.phpファイルを呼び出し
    }

    public function create(Request $request)
    {
        $this->validate($request, Book::$rules); // バリデーションの実行
        $book = new Book; //Bookインスタンス生成
        $form = $request->all(); //入力されたフォームの値を全て取得（$request->all()）、配列変数$formに代入（保管）
        unset($form['_token']); //非表示フィールドtoken削除
        $book->fill($form)->save(); //変数$bookの->各プロパティ（title、author、price）に、配列$form（フォームに入力された値をまとめて入れてる配列変数）から取り出した値を設定する->保存する
        return redirect('/bookapp'); ///bookappページ（一覧表示画面）にリダイレクトする
    }

    //更新-----------------------------------------
    public function edit(Request $request)
    {
        // 一覧表示
        $items = Book::all();
        $book = Book::find($request->id); //URLで指定されたidパラメータの値を取得し、変数$bookに代入する
        return view('book.edit', ['items' => $items], ['form' => $book]); //①edit.blade.php呼び出し、⓶変数「form」の値として「$book」を渡す
    }

    public function update(Request $request)
    {
        $this->validate($request, Book::$rules); // バリデーションの実行
        $book = Book::find($request->id); //URLで指定されたidパラメータの値（Bookインスタンス）を取得して、変数$bookに代入
        $form = $request->all(); //入力されたフォームの値を全て取得、配列変数$formに代入（保管）
        unset($form['_token']); //非表示フィールドtoken削除
        $book->fill($form)->save(); //変数$bookの->プロパティ（title、author、price）それぞれに値を設定する（引数は配列$form（フォームに入力された値をまとめて入れてる配列変数）->保存する
        return redirect('/bookapp');
    }

    //削除-----------------------------------------
    public function delete(Request $request)
    {
        // 一覧表示
        $items = Book::all();

        // URLに入力されたid値を取得し、削除対象のデータのみを表示
        $book = Book::find($request->id); //URLで指定されたidパラメータの値を取得し、変数$bookに代入する
        return view('book.del', ['items' => $items], ['form' => $book]); //①del.blade.php呼び出し、⓶変数「items」の値として「$items」を渡す、変数「form」の値として「$book」を渡す
    }

    public function remove(Request $request)
    {
        Book::find($request->id)->delete(); //URLで指定されたidパラメータの値を取得->Bookモデル（DB）のidと一致したら、deleteメソッド実行
        return redirect('/bookapp');
    }

    //titleで検索-----------------------------------------
    public function find(Request $request)
    {
        // 一覧表示
        $items = Book::all();
        return view('book.find',['items' => $items], ['input' => '']); //①find.blade.php呼び出し、⓶変数「input」の値として「空白」を渡す
    }

    public function search(Request $request)
    {
        $item = Book::find($request->input); //送信されたフォームの値(id)を、変数$itemに代入
        $item = Book::where('title', $request->input)->first(); //DBに登録されているtitleと、送信されたフォームの値が同じ条件(一致)なら、最初のデータだけ取得して、変数$itemに代入
        $param = ['input' => $request->input, 'item' => $item]; //変数inputに$request->input（送信されたフォームの値）、変数itemに$itemを入れて、$paramに代入
        return view('book.find', $param); //①find.blade.php呼び出し、⓶変数$param（送信されたフォームの値）を渡す

        // // 一覧表示
        // $items = Book::all();

        // // $item = Book::find($request->input);
        // $item = Book::find($request->input('search')); //search フィールドの値が書籍の ID として使用される
        // $items = Book::where('title', 'like', '%' . $request->input('search') . '%')->get(); //モデルBook（テーブルbooks）のカラムtitleに対して、部分一致検索
        // $item = Book::nameLike($request->input)->get(); //モデルの部分一致検索メソッドを起動
        // $param = ['input' => $request->input, 'item' => $item,'items' => $items]; //viewに渡す情報を格納
        // return view('book.find', $param); //paramの変数をfindへ送っている
    }
}
