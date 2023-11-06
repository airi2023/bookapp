@extends('layouts.helloapp')
{{-- viewフォルダのlayoutsフォルダの親helloapp.blade.phpファイルを継承する --}}

@section('title', 'Book.Edit')
{{-- titleという名前のsection部分に「Add」と表示させる --}}

@section('menubar')
    {{-- menubarという名前のsection部分に「@parent」（親のセクションをそのまま表示したいとき）、「インデックスページ」と表示させる --}}
    @parent
    編集ページ
@endsection

@section('content'){{-- contentという名前のsection部分に<p>タグ部分を表示させる --}}
    <div class="edit">
        <table>
            @csrf
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
            </tr>

            @foreach ($items as $item)
                <tr>
                    <form action="/bookapp/edit" method="post">
                        @csrf
                        <td class="id">{{ $item->id }}</td>
                        <td><input type="text" name="title" value="{{ $item->title }}"></td>

                        <td><input type="text" name="author" value="{{ $item->author }}"></td>

                        <td><input type="number" name="price" value="{{ $item->price }}"></td>

                        <td>
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <input type="submit" value="更新">
                        </td>
                    </form>

                </tr>
            @endforeach
        </table>
    </div>
@endsection

@section('footer')
    copyright 2023 ak.
@endsection
