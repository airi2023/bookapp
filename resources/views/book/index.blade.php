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
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->author }}</td>
                <td>{{ $item->price }}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    copyright 2023 ak.
@endsection
