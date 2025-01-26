<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Campaign Detail') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 font-semibold text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col items-center">
                        <img
                            src="{{ $campaigns->foto ?? 'https://placehold.co/600x400' }}"
                            alt="{{ $campaigns->judul }}"
                            class="rounded-lg w-full max-w-md object-cover h-64 mb-6"
                        >
                        <h1 class="text-3xl font-bold mb-4">{{ $campaigns->judul }}</h1>
                        <p class="mb-6 text-gray-700 text-center">{{ $campaigns->deskripsi }}</p>

                        <div class="w-full max-w-md">
                            <div class="flex justify-between mb-2">
                                <span class="text-sm font-medium text-gray-700">Donasi Terkumpul:</span>
                                <span class="text-sm font-medium text-gray-700">Rp {{ number_format($campaigns->donasi_terkumpul, 0, ',', '.') }} / Rp {{ number_format($campaigns->target_donasi, 0, ',', '.') }}</span>
                            </div>
                            <progress
                                class="progress progress-primary w-full"
                                value="{{ $campaigns->donasi_terkumpul }}"
                                max="{{ $campaigns->target_donasi }}">
                            </progress>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6 w-full max-w-md">
                            <div>
                                <span class="font-semibold">Tanggal Dimulai:</span>
                                <p>{{ \Carbon\Carbon::parse($campaigns->tanggal_dimulai)->format('d M Y') }}</p>
                            </div>
                            <div>
                                <span class="font-semibold">Tanggal Berakhir:</span>
                                <p>{{ \Carbon\Carbon::parse($campaigns->tanggal_berakhir)->format('d M Y') }}</p>
                            </div>
                        </div>

                        <div class="mt-6 w-full max-w-md">
                            <a href="{{ route('campaign.index') }}" class="btn btn-success text-white">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
