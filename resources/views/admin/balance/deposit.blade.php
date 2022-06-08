@extends('admin.partials.master')

@section('title', 'Admin | Depósito')

@section('content-header')
    <section class="content-header">
        <h1>
            Depósito
        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Depósito</li>
        </ol>
    </section>
@endsection

@section('content-main')
    <div class="box">
        <div class="box-body">
            <form method="post" action="{{ route('admin.deposit.store') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="">Valor do depósito</label>
                    <div class="input-group">
                        <input type="text" name="value" id="value" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Depositar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
