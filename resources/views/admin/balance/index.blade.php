@extends('admin.template.master')

@section('title', 'Admin | Saldo')

@section('content-header')
    <section class="content-header">
        <h1>
            Saldo
        </h1>

        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Saldo</li>
        </ol>
    </section>
@endsection

@section('content-main')
    @if(session('message-alert'))
        <div class="alert alert-{{ session('message-alert.type') }}">
            {{ session('message-alert.message') }}
        </div>
    @endif

    <div class="box">
        <div class="box-header">
            <a href="{{ route('admin.financial.balance.deposit') }}" class="btn btn-primary">Depositar</a>

            @if ($amount > 0)
                <a href="{{ route('admin.withdraw') }}" class="btn btn-danger">Sacar</a>
                <a href="{{ route('admin.transfer') }}" class="btn btn-info">Transferir</a>
            @endif
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>R$ {{ $amount }}</h3>
                        </div>

                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>

                        <a href="#" class="small-box-footer">Histórico <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
