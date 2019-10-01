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

                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Novo Post</th>
                                {{-- 
                                <th>Email</th>
                                <th>Bio</th>
                                <th colspan="" rowspan="" headers="" scope="">Posts</th> --}}

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authors as $author)
                                <tr>
                                    <td rowspan="{{ count($author->posts) + 1 }}">{{ $author->id }}</td>
                                    <td rowspan="{{ count($author->posts) + 1 }}">{{ $author->name }}</td>
                                    <td rowspan="{{ count($author->posts) + 1 }}"><a href="{{ route('posts.create', $author->id) }}" title="">Novo Post</a></td>
                                    {{-- 
                                    <td rowspan="5">{{ $author->email }}</td>
                                    <td rowspan="5">{{ $author->bio }}</td> --}}
                                    @foreach ($author->posts as $post)
                                        <tr>
                                            <td class="text-info"><b>{{ $post->title }} </b><a href="{{ route('comments.create', $post->id) }}" title=""><em>Commentar</em></a></td>
                                        </tr>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
