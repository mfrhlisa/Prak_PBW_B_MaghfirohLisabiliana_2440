<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-pink-600 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-pink-50/30">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-2xl border-t-4 border-pink-500">
                <div class="p-8 text-gray-900">
                    
                    <h3 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-purple-600 mb-2">
                        Halo, {{ Auth::user()->name }}! 👋
                    </h3>
                    
                    <p class="text-lg text-gray-600 mt-2">
                        Selamat datang di halaman Dashboard LaraPress. Anda berhasil login!
                    </p>

                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>