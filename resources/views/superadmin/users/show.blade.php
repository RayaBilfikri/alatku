@extends('layouts.superadmin')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Detail Pengguna</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Section Nama Pengguna -->
        <div class="bg-gray-50 p-4 rounded-lg shadow-md">
            <div class="text-base font-medium text-gray-600">Nama Pengguna</div>
            <div class="text-lg font-semibold text-gray-800">{{ $user->name }}</div>
        </div>

        <!-- Section Email Pengguna -->
        <div class="bg-gray-50 p-4 rounded-lg shadow-md">
            <div class="text-base font-medium text-gray-600">Email</div>
            <div class="text-lg font-semibold text-gray-800">{{ $user->email }}</div>
        </div>
    </div>

    <div class="mt-6">
        <!-- Section Role -->
        <div class="bg-gray-50 p-4 rounded-lg shadow-md">
            <div class="text-base font-medium text-gray-600">Role Pengguna</div>
            <div class="flex flex-wrap mt-2">
                @foreach ($user->getRoleNames() as $role)
                    <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-lg text-xs font-semibold mr-2 mb-2">{{ $role }}</span>
                @endforeach
            </div>
        </div>
    </div>

    <div class="mt-8 text-center">
        <a href="{{ route('users.index') }}" class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7 7-7M5 12h14" />
            </svg>
            Kembali ke Daftar Pengguna
        </a>
    </div>
</div>
@endsection
