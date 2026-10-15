@extends('layouts.admin')

@section('admin_title', 'Konfigurasi Website')

@section('admin_content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
    @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <form action="{{ route('settings.update') }}" method="POST">
        @csrf
        @method('PUT')

        @foreach($settings as $setting)
            <div class="mb-4">
                <label for="setting_{{ $setting->key }}" class="block text-gray-700 text-sm font-bold mb-2">
                    {{ ucwords(str_replace('_', ' ', $setting->key)) }}
                </label>
                <input type="{{ $setting->type }}" name="settings[{{ $setting->key }}]" id="setting_{{ $setting->key }}" value="{{ old('settings.' . $setting->key, $setting->value) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @if($setting->description)
                    <p class="text-gray-500 text-xs mt-1">{{ $setting->description }}</p>
                @endif
            </div>
        @endforeach

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection