@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Novo post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('posts.store') }}" method="POST" accept-charset="utf-8">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <input type="text" name="title" value="" placeholder="Titulo" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="content" value="" placeholder="Content" class="form-control">
                        </div>
                        <input type="hidden" name="author_id" value="{{ $id }}">
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
