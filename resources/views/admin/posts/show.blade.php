@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <img src="{{ $post->image }}" class="card-img-top">
                    <div class="card-body">
                        <h1 class="card-title">{{ $post->title }}</h1>
                        <p class="card-text">
                            <small class="text-muted">
                                Publicado em: {{ $post->created_at->format('d/m/Y H:i') }}
                                Por: {{ $post->user->name }}
                            </small>
                        </p>
                        <p class="card-text">{{ $post->content }}</p>
                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection