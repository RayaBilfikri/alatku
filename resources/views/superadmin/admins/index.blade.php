@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Admin</h4>
        </div>
        <div class="card-body">
            <div class="flex justify-end mb-4">
                <a href="{{ route('superadmin.admins.create') }}" class="shadow btn btn-primary btn-sm">
                    Tambah
                </a>

                <div class="table-responsive">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">No</th>
                                <th class="px-4 py-2 border">Nama</th>
                                <th class="px-4 py-2 border">Email</th>
                                <th class="px-4 py-2 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($admins as $index => $admin)
                            <tr class="text-center">
                                <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border">{{ $admin->name }}</td>
                                <td class="px-4 py-2 border">{{ $admin->email }}</td>
                                <td class="px-4 py-2 border text-center">
                                    <div class="d-inline-flex gap-2">
                                        <a href="{{ route('superadmin.admins.edit', $admin->id) }}"
                                            class="shadow btn btn-success btn-sm">Edit</a>
                                        <form action="{{ route('superadmin.admins.destroy', $admin->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="shadow btn btn-danger btn-sm btn-delete">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan=" 5" class="text-center py-4">Data admin tidak ada
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection