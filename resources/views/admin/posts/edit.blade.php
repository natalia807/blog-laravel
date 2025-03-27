@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Editar Post</h1>
        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ $post->title }}">
            </div>
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Conteúdo</label>
                <textarea name="content" id="content" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $post->content }}</textarea>
            </div>
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Imagem</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full">
            </div>
            <div>
                <button type="submit" class="bg-gray-700 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded">Atualizar</button>
            </div>
        </form>
    </div>
@endsection