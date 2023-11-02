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
        $items = Book::all(); //変数$itemsに代入する。Book＝モデル。all()メソッド＝（booksテーブルの全項目を）全て取得
        return view('book.index', ['items' => $items]);//①index.blade.php実行、⓶引数として「キー「items」の値は「$items」」を渡す
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
        $form = $request->all(); //入力されたフォームの値を全て取得、配列変数$formに代入（保管）
        unset($form['_token']); //非表示フィールドtoken削除
        $book->fill($form)->save(); //変数$bookの->プロパティ（title、author、price）それぞれに値を設定する（引数は配列$form（フォームに入力された値をまとめて入れてる配列変数）->保存する
        return redirect('/bookapp');
    }

    //更新-----------------------------------------
    public function edit(Request $request)
    {
        $book = Book::find($request->id); //URLで指定されたidパラメータの値を取得し、変数$bookに代入する
        return view('book.edit', ['form' => $book]); //⓶引数「キー「form」の値として「$book」」を渡す
    }

    public function update(Request $request)
    {
        $this->validate($request, Book::$rules); // バリデーションの実行
        $book = Book::find($request->id); //URLで指定されたidパラメータの値（Bookインスタンス）を取得して、変数$bookに代入
        $form = $request->all(); //入力されたフォームの値を全て取得、配列変数$formに代入（保管）
        unset($form['_token']); //非表示フィールドtoken削除
        $book->fill($form)->save();//変数$bookの->プロパティ（title、author、price）それぞれに値を設定する（引数は配列$form（フォームに入力された値をまとめて入れてる配列変数）->保存する
        return redirect('/bookapp');
    }

    //削除-----------------------------------------
    public function delete(Request $request)
    {
        // 一覧表示
        $items = Book::all(); //変数$itemsに代入する。Book＝モデル。all()メソッド＝（booksテーブルの全項目を）全て取得
        return view('book.del', ['items' => $items]);//①del.blade.php実行、⓶引数「キー「items」の値として「$items」」を渡す

        // URLに入力されたid値を取得し、削除対象のデータのみを表示
        $book = Book::find($request->id); //URLで指定されたidパラメータの値を取得し、変数$bookに代入する
        return view('book.del', ['form' => $book]); //①del.blade.php実行、⓶引数「キー「form」の値として「$book」」を渡す
    }

    public function remove(Request $request)
    {
        Book::find($request->id)->delete(); //URLで指定されたidパラメータの値を取得し、変数$bookに代入する。-＞それをdelete実行？
        return redirect('/bookapp');
    }

    //titleで検索-----------------------------------------
    public function find(Request $request)
    {
        return view('book.find', ['input' => '']); //bookフォルダのfind.blade.phpファイルを呼び出し
    }

    public function search(Request $request)
    {
        //$item = Book::find($request->input); //送信されたフォームの値(id)を、変数$itemに代入
        $item = Book::where('title', $request->input)->first(); //DBに登録されているtitleと、送信されたフォームの値が同じ条件(一致)なら、最初のデータだけ取得して、変数$itemに代入
        $param = ['input' => $request->input, 'item' => $item]; //送信されたフォームの値を、$paramに代入?
        return view('book.find', $param); //送信されたフォームの値を引数に指定して、find.blade.phpを呼び出す
    }
}
