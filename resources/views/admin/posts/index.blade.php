@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4 text-center">Lista de Posts</h1>
        <div class="mb-4">
            <a href="{{ route('admin.posts.create') }}" class="bg-gray-700 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded">
                Criar Post
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Autor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data de Criação</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr class="{{ $loop->even ? 'bg-gray-100' : '' }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('admin.posts.show', $post) }}" class="text-blue-600 hover:text-blue-800">
                                    {{ $post->title }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $post->user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $post->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex space-x-2 justify-center">
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="bg-gray-700 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded text-sm">Editar</a>
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-gray-700 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded text-sm" onclick="return confirmDelete('{{ $post->title }}')">Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>

    <script>
        function confirmDelete(title) {
            return confirm('Tem certeza de que deseja excluir o post "' + title + '"?');
        }
    </script>
@endsection