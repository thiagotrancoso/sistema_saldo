@extends('site.template.master')

@section('title', 'Meu Perfil')

@section('content-header')
    <section class="content-header">
        <h1>
            Meu Perfil
        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Meu Pefil</li>
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
        <form method="post" action="{{ route('site.profile.update') }}" enctype="multipart/form-data">
            {!! csrf_field() !!}
            {!! method_field('put') !!}

            <div class="box-body">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email" value="{{ $user->email }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="image">Imagem</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                @if ($user->image)
                    <img src="{{ $user->image }}" style="width: 100px;">
                @endif
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-success">Atualizr Perfil</button>
            </div>
        </form>
    </div>
@endsection
