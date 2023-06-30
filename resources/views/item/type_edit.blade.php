@extends('adminlte::page')

@section('title', '種別編集')

@section('content_header')
    <h1>種別編集</h1>
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
                            <label for="type_name">種別</label>
                            <input type="text" class="form-control" id="type_name" name="type_name" value="{{$type->type_name}}" autofocus>
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
