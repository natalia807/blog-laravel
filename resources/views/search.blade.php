@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Resultados da Busca</h1>

        <form action="{{ route('search') }}" method="GET" class="mb-4">
            <input type="text" name="query" placeholder="Buscar posts..." class="w-full p-2 border rounded">
            <button type="submit" class="bg-gray-700 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded mt-2">Buscar</button>
        </form>

        @if ($posts->count() > 0)
            @foreach ($posts as $post)
                <div class="mb-4 p-4 border rounded">
                    <h2 class="text-xl font-semibold mb-2">{{ $post->title }}</h2>
                    <p class="text-base">{{ $post->content }}</p>
                    <a href="{{ route('admin.posts.show', $post) }}" class="text-blue-600 hover:underline">Ler mais</a>
                </div>
            @endforeach
        @else
            <p>Nenhum post encontrado para "{{ $query }}".</p>
        @endif
    </div>
@endsection