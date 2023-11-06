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
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
            </tr>

            @foreach ($items as $item)
                <tr>
                    <form action="/bookapp/del" method="post">

                        @csrf
                        <td>{{ $item->id }}</td>{{-- $itemから、プロパティ「id」を呼び出す(表示する) --}}
                        <td>{{ $item->title }}</td>{{-- $itemから、プロパティ「title」を呼び出す(表示する) --}}
                        <td>{{ $item->author }}</td>{{-- $itemから、プロパティ「author」を呼び出す(表示する) --}}
                        <td>{{ $item->price }}</td>{{-- $itemから、プロパティ「price」を呼び出す(表示する) --}}

                        <td>
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <input class="del" type="submit" value="削除する">
                        </td>
                </tr>
    </form>
    </td>

    </tr>
    @endforeach

    </table>
    </form>
@endsection

@section('footer')
    copyright 2023 ak.
@endsection
