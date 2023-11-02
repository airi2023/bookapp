@extends('layouts.helloapp')
{{-- viewフォルダのlayoutsフォルダの親helloapp.blade.phpファイルを継承する --}}

@section('title', 'Book.Add')
{{-- titleという名前のsection部分に「Add」と表示させる --}}

@section('menubar')
    {{-- menubarという名前のsection部分に「@parent」（親のセクションをそのまま表示したいとき）、「インデックスページ」と表示させる --}}
    @parent
    新規追加ページ
@endsection

@section('content'){{-- contentという名前のsection部分に<p>タグ部分を表示させる --}}
    <form action="/bookapp/add" method="post">
        <table>
            @csrf
            <tr>
                <th>Title:</th>
                <td><input type="text" name="title" value="{{old('title')}}"></td>
            </tr>

            <tr>
                <th>Author:</th>
                <td><input type="text" name="author" value="{{old('author')}}"></td>
            </tr>

            <tr>
                <th>Price:</th>
                <td><input type="number" name="price" value="{{old('price')}}"></td>
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
