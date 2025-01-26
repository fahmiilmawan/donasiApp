<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Donation Invoice') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg p-8">
                <div class="text-center">
                    <h1 class="text-2xl font-bold mb-4">{{ __('Donation Invoice') }}</h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Invoice ID: #{{ $donations->order_id }}</p>
                </div>

                <hr class="my-6 border-gray-300 dark:border-gray-700">

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <h2 class="text-lg font-semibold">Donatur Details</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                            <strong>Nama:</strong> {{ $donations->nama_donatur }}<br>
                            <strong>Email:</strong> {{ $donations->email_donatur }}<br>
                            <strong>Nomor HP:</strong> {{ $donations->no_hp_donatur }}
                        </p>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold">Campaign Details</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                            <strong>Judul Campaign:</strong> {{ $donations->campaign->judul }}<br>
                            <strong>Target Donasi:</strong> Rp. {{ number_format($donations->campaign->target_donasi, 0, ',', '.') }}<br>
                            <strong>Terkumpul:</strong> Rp. {{ number_format($donations->campaign->donasi_terkumpul, 0, ',', '.') }}
                        </p>
                    </div>
                </div>

                <div class="mb-6">
                    <h2 class="text-lg font-semibold">Donation Details</h2>
                    <table class="w-full text-sm mt-2">
                        <tr>
                            <td class="font-semibold">Jumlah Donasi</td>
                            <td>:</td>
                            <td>Rp. {{ number_format($donations->jumlah_donasi, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold">Pesan Donatur</td>
                            <td>:</td>
                            <td>{{ $donations->pesan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold">Status</td>
                            <td>:</td>
                            <td>
                                <span class="badge badge-{{ $donations->status == 'pending' ? 'warning' : ($donations->status == 'success' ? 'success' : 'error') }} text-white">
                                    {{ ucfirst($donations->status) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-semibold">Tanggal Donasi</td>
                            <td>:</td>
                            <td>{{ $donations->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                    </table>
                </div>

                <hr class="my-6 border-gray-300 dark:border-gray-700">

                <div class="text-center">
                    <p class="text-sm text-gray-600 dark:text-gray-400">Terima kasih telah berdonasi di campaign <strong>{{ $donations->campaign->judul }}</strong>.</p>
                </div>

                <div class="mt-8 flex justify-center">
                    <a href="{{ route('donation-admin.index') }}" class="btn btn-success text-white">Kembali</a>
                    <button onclick="window.print()" class="ml-4 btn btn-primary">Print Invoice</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
@media print {
    .btn, header, .header, footer, .footer {
        display: none;
    }
    .bg-white {
        box-shadow: none;
    }
}
</style>
