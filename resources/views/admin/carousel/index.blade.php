@extends('admin.layouts.app') {{-- Ganti sesuai layout kamu --}}

@section('content')
<div class="container">
    <h1>Kelola Carousel</h1>
    <a href="{{ route('carousel.create') }}" class="btn btn-primary mb-3">Tambah Carousel</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Link</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carousel as $item)
                <tr>
                    <td>{{ $item->judul }}</td>
                    <td><img src="{{ asset('storage/' . $item->gambar) }}" width="120"></td>
                    <td>{{ $item->link }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                    <td>
                        <a href="{{ route('carousel.edit', $item->id_carousel) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('carousel.destroy', $item->id_carousel) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
