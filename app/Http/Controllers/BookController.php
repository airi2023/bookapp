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
        $items = Book::all(); //入力フォームで入力された値をすべて変数$itemsに代入する
        return view('book.index', ['items' => $items]);
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
        $form = $request->all(); //送信されたフォームの値を、変数$formに代入して保管
        unset($form['_token']); //非表示フィールドtoken削除
        $book->fill($form)->save(); //Bookインスタンスに値（$form＝フォームに入力された値のまとめ）を設定して保存
        return redirect('/bookapp');
    }

    //更新-----------------------------------------
    public function edit(Request $request)
    {
        $book = Book::find($request->id); //URLで指定されたidパラメータの値を取得し、変数$bookに代入する
        return view('book.edit', ['form' => $book]); //formという値に設定。bookフォルダのedit.blade.phpの入力フォームのvalueに表示。
    }

    public function update(Request $request)
    {
        $this->validate($request, Book::$rules); // バリデーションの実行
        $book = Book::find($request->id); //URLで指定されたidパラメータの値（Bookインスタンス）を取得して、変数$bookに代入
        $form = $request->all(); //送信されたフォームの値を、変数$formに代入して保管
        unset($form['_token']); //非表示フィールドtoken削除
        $book->fill($form)->save(); //Bookインスタンスに値（$form＝フォームに入力された値のまとめ）を設定して保存
        return redirect('/bookapp');
    }

    //削除-----------------------------------------
    public function delete(Request $request)
    {
        $book = Book::find($request->id); //URLで指定されたidパラメータの値を取得し、変数$bookに代入する
        return view('book.del', ['form' => $book]); //formという値に設定。bookフォルダのedit.blade.phpの入力フォームのvalueに表示。
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
