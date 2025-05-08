@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Artikel</h1>
        <a href="{{ route('articles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Artikel</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2 border">Judul</th>
                <th class="p-2 border">Tanggal</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr class="text-sm">
                    <td class="p-2 border">{{ $article->judul }}</td>
                    <td class="p-2 border">{{ $article->tanggal_publish }}</td>
                    <td class="p-2 border flex gap-2">
                        <a href="{{ route('articles.edit', $article->id_articles) }}" class="text-blue-600">Edit</a>
                        <form action="{{ route('articles.destroy', $article->id_articles) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
