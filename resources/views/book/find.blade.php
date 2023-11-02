@extends('layouts.helloapp')
{{-- viewフォルダのlayoutsフォルダの親helloapp.blade.phpファイルを継承する --}}

@section('title', 'Book.find')
{{-- titleという名前のsection部分に「Book.index」とテキスト表示する --}}

@section('menubar')
    {{-- menubarという名前のsection部分に「@parent」（親のセクションをそのまま表示したいとき）、「インデックスページ」と表示させる --}}
    @parent
    タイトル検索ページ（完全一致のみヒット）
@endsection


@section('content'){{-- contentという名前のsection部分に<p>タグ部分を表示させる --}}
    <div class="search">
        <form action="/bookapp/find" method="post">
            @csrf
            <input type="text" name="input" value="{{ $input }}">
            <input type="submit" name="find">
        </form>

        @if (isset($item))
            <table>
                <tr>
                    <th>BookData</th>
                </tr>

                <tr>
                    <td>{{ $item->getData() }}</td>
                </tr>
            </table>
        @endif
    </div>

@endsection

@section('footer')
    copyright 2023 ak.
@endsection
