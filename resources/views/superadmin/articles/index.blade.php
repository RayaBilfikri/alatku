@extends('layouts.superadmin')

@section('content')
<div class="flex h-screen">
    @include('partials.sidebar')

    <main class="flex-1 bg-gray-50 p-6 overflow-y-auto">
        <div class="bg-white p-6 rounded shadow">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Data Artikel</h2>
                <a href="{{ route('articles.create') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah
                </a>
            </div>

            <div class="overflow-x-auto rounded border">
                <table class="min-w-full bg-white border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border text-left">No</th>
                            <th class="px-4 py-2 border text-left">Judul</th>
                            <th class="px-4 py-2 border text-left">Tanggal Publish</th>
                            <th class="px-4 py-2 border text-center">Gambar</th>
                            <th class="px-4 py-2 border text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $index => $article)
                            <tr>
                                <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border">{{ $article->judul }}</td>
                                <td class="px-4 py-2 border">{{ $article->tanggal_publish }}</td>
                                <td class="px-4 py-2 border text-center">
                                    @if ($article->gambar)
                                        <img src="{{ asset('storage/' . $article->gambar) }}" alt="Gambar" class="w-12 h-12 object-cover mx-auto rounded">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-4 py-2 border text-center space-x-1">
                                    <a href="{{ route('articles.edit', $article->id_articles) }}"
                                       class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">Edit</a>
                                    <form action="{{ route('articles.destroy', $article->id_articles) }}"
                                          method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-gray-500">Belum ada artikel.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
@endsection
