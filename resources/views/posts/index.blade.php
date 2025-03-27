@extends('layouts.app')

@section('title', 'Lista de Posts')

@section('content')
    <div class="container bg-gray-100 p-6 rounded-lg shadow-md">
        <h1 class="text-center text-2xl font-bold mb-6">Posts</h1>
        <div class="grid gap-6 place-items-center">
            @foreach ($posts as $post)
                <div class="w-full md:w-1/2 lg:w-1/2 bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="grid grid-cols-1 md:grid-cols-3">
                        <div>
                            <img src="{{ $post->image }}" class="w-full h-auto object-cover" alt="{{ $post->title }}">
                        </div>
                        <div class="md:col-span-2 p-4">
                            <h5 class="text-lg font-semibold">{{ $post->title }}</h5>
                            <p class="text-gray-700">{{ Str::limit($post->content, 100) }}</p>
                            <p class="text-sm text-gray-500 mt-2">
                                Publicado em: {{ $post->created_at->format('d/m/Y H:i') }}<br>
                                Por: {{ $post->user->name }}
                            </p>
                            <a href="{{ route('posts.show', $post->id) }}" class="mt-4 inline-block bg-gray-300 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-400 shadow-md transition-colors duration-300 hover:text-gray-900">Leia mais</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6 flex justify-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection