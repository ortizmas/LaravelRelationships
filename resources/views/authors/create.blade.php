@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Listado de Authores e Posts por Author</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('authors.store') }}" method="post" accept-charset="utf-8">
                        {{ csrf_token() }}

                        <div class="form-group">
                            <input type="text" name="title" value="" placeholder="Titulo">
                        </div>
                        <div class="form-group">
                            <input type="text" name="title" value="" placeholder="Titulo">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="enviar" value="Enviar" placeholder="Titulo">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
