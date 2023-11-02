@extends('layouts.helloapp')
{{-- viewフォルダのlayoutsフォルダの親helloapp.blade.phpファイルを継承する --}}

@section('title', 'Book.index')
{{-- titleという名前のsection部分に「Book.index」とテキスト表示する --}}

@section('menubar')
    {{-- menubarという名前のsection部分に「@parent」（親のセクションをそのまま表示したいとき）、「インデックスページ」と表示させる --}}
    @parent
    インデックスページ（一覧表示）
@endsection

@section('content'){{-- contentという名前のsection部分に<p>タグ部分を表示させる --}}
    <table>
        <tr>
            <th>id</th><th>Title</th><th>Author</th><th>Price</th>
        </tr>

        @foreach ($items as $item){{-- 配列$items（booksテーブルの全項目。コントローラーに記述あり）から、1個ずつ取り出して$itemに格納する --}}
            <tr>
                <td>{{ $item->id }}</td>{{-- $itemから、プロパティ「id」を呼び出す(表示する) --}}
                <td>{{ $item->title }}</td>{{-- $itemから、プロパティ「title」を呼び出す(表示する) --}}
                <td>{{ $item->author }}</td>{{-- $itemから、プロパティ「author」を呼び出す(表示する) --}}
                <td>{{ $item->price }}</td>{{-- $itemから、プロパティ「price」を呼び出す(表示する) --}}
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    copyright 2023 ak.
@endsection
