@extends('admin.partials.master')

@section('title', 'Admin | Histórico')

@section('content-header')
    <section class="content-header">
        <h1>Histórico</h1>

        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Histórico</li>
        </ol>
    </section>
@endsection

@section('content-main')
    <div class="box">
        <div class="box-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Valor</th>
                        <th>Tipo</th>
                        <th>Data</th>
                        <th>Destinatário</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($historics as $historic)
                        <tr>
                            <td>{{ $historic->id }}</td>
                            <td>R$ {{ number_format($historic->amount, 2, ',', '.') }}</td>
                            <td>{{ identify_type_transaction($historic->type, $historic->user_id_transaction) }}</td>
                            <td>{{ $historic->date }}</td>
                            <td>
                                @if ($historic->user_id_transaction)
                                    {{ $historic->user->name }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="box-footer">
            {!! $historics->links() !!}
        </div>
    </div>
@endsection
