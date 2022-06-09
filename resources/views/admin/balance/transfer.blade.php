@extends('admin.template.master')

@section('title', 'Admin | Transferir')

@section('content-header')
    <section class="content-header">
        <h1>
            Transferir
        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Transferir</li>
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
            <h3>Meu saldo: R$ {{ $balance }}</h3>

            <form method="post" action="{{ route('admin.transfer.store') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="">E-mail do usuário destino</label>
                    <div class="input-group">
                        <input type="text" name="sender" id="sender" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Valor da transferência</label>
                    <div class="input-group">
                        <input type="text" name="value" id="value" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Transferir</button>
                </div>
            </form>
        </div>
    </div>
@endsection
