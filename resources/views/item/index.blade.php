@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="search" >
                        <form class="d-flex" action="{{ url('/items') }}" method="GET">
                            <input class="word" type="text" name="keyword" value="{{ $keyword }}" autofocus>
                            <input class="btn-search" type="submit" value="検索">
                        </form>
                    </div>
                    <div class="card-tools">
                    @can('admin-higher')
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    @elsecan('user-higher')
                    @endcan
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>種別</th>
                                <th>在庫数</th>
                                <th>詳細</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->type_name }}</td>
                                    <td>{{ $item->inventory }}</td>
                                    <td>{{ $item->detail }}</td>
                                    @can('admin-higher')
                                    <td><a href=" {{ url('/items/item_edit', ['id'=>$item->id]) }} ">{{ __('>>編集') }}</td>
                                    @elsecan('user-higher')
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
@stop
