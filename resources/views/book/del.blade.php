@extends('layouts.helloapp')
{{-- viewフォルダのlayoutsフォルダの親helloapp.blade.phpファイルを継承する --}}

@section('title', 'Book.Delete')
{{-- titleという名前のsection部分に「Add」と表示させる --}}

@section('menubar')
    {{-- menubarという名前のsection部分に「@parent」（親のセクションをそのまま表示したいとき）、「インデックスページ」と表示させる --}}
    @parent
    削除ページ
@endsection

@section('content'){{-- contentという名前のsection部分に<p>タグ部分を表示させる --}}
    <form action="/bookapp/del" method="post">
        <table>
            @csrf

            <input type="hidden" name="id" value="{{$form->id}}">

            <tr>
                <th>Title:</th>
                <td>{{$form->title}}</td>
            </tr>

            <tr>
                <th>Author:</th>
                <td>{{$form->author}}</td>
            </tr>

            <tr>
                <th>Price:</th>
                <td>{{$form->price}}</td>
            </tr>

            <tr>
                <th></th>
                <td><input type="submit" name="send"></td>
            </tr>
        </table>
    </form>
@endsection

@section('footer')
    copyright 2023 ak.
@endsection
