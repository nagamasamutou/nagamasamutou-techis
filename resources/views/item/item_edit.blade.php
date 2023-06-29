@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
    <h1>商品編集</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form action="" method="post" id="input_form" onsubmit="return confirm_action()">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$item->name}}" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="type">種別</label>
                            <select class="form-control" name="type" id="type">
                                @foreach ($types as $type)
                                <option value={{$type['id']}}>{{$type['type_name']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inventory">在庫数</label>
                            <input type="number" class="form-control" id="inventory" name="inventory" value="{{$item->inventory}}">
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" value="{{$item->detail}}">
                        </div>
                    </div>
                        <p>
                            <input class='btn btn-primary' type="submit" name="edit" id="edit" value="編集" />
                            <input class='btn btn-primary' type="submit" name="delete" id="delete" value="削除" />
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
@stop
