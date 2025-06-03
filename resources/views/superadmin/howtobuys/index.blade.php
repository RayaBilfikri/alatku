@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Cara Membeli</h4>
            </div>
            <div class="card-body">
                <div class="flex justify-end mb-4">
                    <a href="{{ route('superadmin.howtobuys.create') }}" class="btn btn-primary btn-sm">
                        Tambah
                    </a>
                </div>

                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">Judul</th>
                            <th class="px-4 py-2 border">Deskripsi</th>
                            <th class="px-4 py-2 border">Step</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($howtobuys as $index => $howtobuy)
                            <tr class="text-center">
                                <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border">{{ $howtobuy->judul }}</td>
                                <td class="px-4 py-2 border">{{ $howtobuy->deskripsi }}</td>
                                <td class="px-4 py-2 border">{{ $howtobuy->step_number }}</td>
                                <td class="px-4 py-2 border">
                                    <div class="d-inline-flex gap-2">
                                        <a href="{{ route('superadmin.howtobuys.edit', $howtobuy->id) }}"
                                           class="btn btn-success btn-sm">Edit</a>

                                        <form action="{{ route('superadmin.howtobuys.destroy', $howtobuy->id) }}"
                                              method="POST" class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btn-delete">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">Data tidak ada</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection