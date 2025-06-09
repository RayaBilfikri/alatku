@extends('layouts.backend')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Ulasan</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr class="text-center">
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">Nama Pengirim</th>
                            <th class="px-4 py-2 border">Isi Ulasan</th>
                            <th class="px-4 py-2 border">Status</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ulasans as $index => $ulasan)
                        <tr class="text-center">
                            <td class="px-4 py-2 border">{{ $ulasans->firstItem() + $index }}</td>
                            <td class="px-4 py-2 border">{{ $ulasan->user->name ?? 'Anonim' }}</td>
                            <td class="px-4 py-2 border text-left">{{ $ulasan->content }}</td>
                            <td class="px-4 py-2 border text-capitalize">
                                @if($ulasan->status === 'approved')
                                <span class="text-success fw-bold">Disetujui</span>
                                @elseif($ulasan->status === 'pending')
                                <span class="text-warning fw-bold">Menunggu</span>
                                @else
                                <span class="text-danger fw-bold">Ditolak</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="d-inline-flex gap-2">
                                    @if ($ulasan->status === 'pending')
                                    <form action="{{ route('superadmin.ulasans.approve', $ulasan->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="shadow btn btn-success btn-sm">
                                            Setujui
                                        </button>
                                    </form>
                                    <form action="{{ route('superadmin.ulasans.reject', $ulasan->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="shadow btn btn-danger btn-sm">
                                            Tolak
                                        </button>
                                    </form>
                                    @endif
                                    @if ($ulasan->status === 'approved')
                                    <form action="{{ route('superadmin.ulasans.destroy', $ulasan->id) }}" method="POST" class="delete-form d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="shadow btn btn-danger btn-sm btn-delete">
                                            Hapus
                                        </button>
                                    </form>
                                    @endif
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
</div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Ulasan</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr class="text-center">
                                <th class="px-4 py-2 border">No</th>
                                <th class="px-4 py-2 border">Nama Pengirim</th>
                                <th class="px-4 py-2 border">Isi Ulasan</th>
                                <th class="px-4 py-2 border">Status</th>
                                <th class="px-4 py-2 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ulasans as $index => $ulasan)
                                <tr class="text-center">
                                    <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2 border">{{ $ulasan->user->name ?? 'Anonim' }}</td>
                                    <td class="px-4 py-2 border text-left">{{ $ulasan->content }}</td>
                                    <td class="px-4 py-2 border text-capitalize">
                                        @if($ulasan->status === 'approved')
                                            <span class="text-success fw-bold">Disetujui</span>
                                        @elseif($ulasan->status === 'pending')
                                            <span class="text-warning fw-bold">Menunggu</span>
                                        @else
                                            <span class="text-danger fw-bold">Ditolak</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 border">
                                        <div class="d-inline-flex gap-2">
                                            @if ($ulasan->status === 'pending')
                                                <form action="{{ route('superadmin.ulasans.approve', $ulasan->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        Setujui
                                                    </button>
                                                </form>

                                                <form action="{{ route('superadmin.ulasans.reject', $ulasan->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        Tolak
                                                    </button>
                                                </form>
                                            @endif

                                            @if ($ulasan->status === 'approved')
                                                <form action="{{ route('superadmin.ulasans.destroy', $ulasan->id) }}" method="POST" class="d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm btn-delete">
                                                        Hapus
                                                    </button>
                                                </form>
                                            @endif
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
    </div>

    <!-- Sweet Alert Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $('.delete-form').on('submit', function (e) {
                e.preventDefault(); // Mencegah form submit langsung

                const form = this; // Simpan referensi form

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

    <!-- Notifikasi berhasil -->
    @if (session('message'))
        <script>
            $(document).ready(function () {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'message',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    timer: 2500,
                    showConfirmButton: false
                });
            });
        </script>
    @endif
@endsection