@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Novo Commentario</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('comments.store') }}" method="POST" accept-charset="utf-8">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <input type="email" name="author_email" value="" placeholder="E-mail" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="content" value="" placeholder="Content" class="form-control">
                        </div>
                        <input type="hidden" name="post_id" value="{{ $id }}">
                        <div class="form-group">
                            <input type="submit" name="enviar" value="Enviar" placeholder="Titulo" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
