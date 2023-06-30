@extends('adminlte::page')

@section('title', '種別一覧')

@section('content_header')
    <h1>種別一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">種別一覧</h3>
                    <div class="card-tools">
                    @can('admin-higher')
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/type_add') }}" class="btn btn-default">種別登録</a>
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
                                <th>種別</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $type)
                                <tr>
                                    <td>{{ $type->id }}</td>
                                    <td>{{ $type->type_name }}</td>
                                    @can('admin-higher')
                                    <td><a href=" {{ url('items/type_edit', ['id'=>$type->id]) }} ">{{ __('>>編集') }}</td>
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
@stop

@section('js')
@stop
