@extends('layouts.admin')

@section('admin_title', 'Dashboard Admin')

@section('admin_content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
    <h3 class="text-lg font-medium text-gray-900 mb-4">Selamat Datang di Panel Admin SMP Mentari</h3>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div class="bg-blue-50 p-4 rounded-lg border border-blue-200">
            <h4 class="font-semibold text-blue-700">Total Kegiatan</h4>
            <p class="text-2xl font-bold text-blue-900">{{ $jumlahKegiatan ?? 0 }}</p>
        </div>
        <div class="bg-green-50 p-4 rounded-lg border border-green-200">
            <h4 class="font-semibold text-green-700">Total Pesan Tamu</h4>
            <p class="text-2xl font-bold text-green-900">{{ $jumlahPesan ?? 0 }}</p>
        </div>
    </div>

    <h4 class="font-bold text-gray-800 mb-3">Pesan Tamu Terbaru</h4>
    @if(isset($daftarPesanTamu) && $daftarPesanTamu->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pesan</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($daftarPesanTamu as $pesan)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $pesan->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $pesan->email }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($pesan->pesan, 50) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-500 text-sm">Belum ada pesan tamu.</p>
    @endif
</div>
@endsection