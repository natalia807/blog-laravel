@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-auto object-cover max-h-96">
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
                <p class="text-sm text-gray-500 mb-4">
                    Publicado em: {{ $post->created_at->format('d/m/Y H:i') }} por: {{ $post->user->name }}
                </p>
                <p class="text-base mb-6">{{ $post->content }}</p>
                <hr class="my-6">

                <h2 class="text-2xl font-semibold mb-4">Comentários</h2>

                @auth
                    <form action="{{ route('comments.store', $post) }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <textarea name="content" class="w-full p-3 border rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Digite seu comentário"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="bg-gray-700 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded">Comentar</button>
                        </div>
                    </form>
                @else
                    <p><a href="{{ route('login') }}" class="text-blue-600 hover:underline">Faça login</a> para comentar.</p>
                @endauth

                <div class="mt-8">
                    <hr class="my-6">
                    @foreach ($post->comments as $comment)
                        <div class="mb-6">
                            <p class="mb-2">{{ $comment->content }}</p>
                            <p class="text-sm text-gray-500">Comentado por: {{ $comment->user->name }}</p>
                            <hr class="my-4">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection