@extends('admin.template.master')

@section('title', 'Admin | Saque')

@section('content-header')
    <section class="content-header">
        <h1>
            Saque
        </h1>

        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Saque</li>
        </ol>
    </section>
@endsection

@section('content-main')
    @if ($errors->any())
        <div class="alert alert-warning">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if(session('message-alert'))
        <div class="alert alert-{{ session('message-alert.type') }}">
            {{ session('message-alert.message') }}
        </div>
    @endif

    <div class="box">
        <div class="box-body">
            <form method="post" action="{{ route('admin.withdraw.store') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="">Valor do saque</label>
                    <div class="input-group">
                        <input type="text" name="value" id="value" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Sacar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
