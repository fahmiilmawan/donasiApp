<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Donation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 font-semibold text-gray-900 dark:text-gray-100">
                    <h2 class="text-lg">Edit Donation</h2>
                </div>
            </div>

            <div class="grid grid-cols-3">
                <div class="p-10">
                    <h5 class="font-semibold">Donation Information</h5>
                    <p>Edit informasi donasi di bawah ini.</p>
                </div>
                <div class="col-span-2">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-5 p-6">
                        <form action="{{ route('donation-admin.update', $donations->id) }}" method="POST" class="space-y-6">
                            @csrf
                            @method('PUT')
                            <div>
                                <label for="campaign_id" class="label">Campaign</label>
                                <select name="campaign_id" class="select w-full" required>
                                    @foreach ($campaigns as $campaign)
                                        <option value="{{ $campaign->id }}" {{ $donations->campaign_id == $campaign->id ? 'selected' : '' }}>
                                            {{ $campaign->judul }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="jumlah_donasi" class="label">Jumlah Donasi</label>
                                    <input type="number" name="jumlah_donasi" class="input w-full" placeholder="Masukkan jumlah donasi" value="{{ $donations->jumlah_donasi }}" required>
                                </div>
                                <div>
                                    <label for="status" class="label">Status</label>
                                    <select name="status" class="select w-full" required>
                                        <option value="pending" {{ $donations->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="success" {{ $donations->status == 'success' ? 'selected' : '' }}>Success</option>
                                        <option value="failed" {{ $donations->status == 'failed' ? 'selected' : '' }}>Failed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="nama_donatur" class="label">Nama Donatur</label>
                                    <input type="text" name="nama_donatur" class="input w-full" placeholder="Masukkan nama donatur" value="{{ $donations->nama_donatur }}" required>
                                </div>
                                <div>
                                    <label for="email_donatur" class="label">Email Donatur</label>
                                    <input type="email" name="email_donatur" class="input w-full" placeholder="Masukkan email donatur" value="{{ $donations->email_donatur }}" required>
                                </div>
                            </div>
                            <div>
                                <label for="no_hp_donatur" class="label">Nomor HP Donatur</label>
                                <input type="text" name="no_hp_donatur" class="input w-full" placeholder="Masukkan nomor HP donatur" value="{{ $donations->no_hp_donatur }}" required>
                            </div>
                            <div>
                                <label for="pesan" class="label">Pesan</label>
                                <textarea name="pesan" id="pesan" cols="30" rows="5" class="textarea w-full" placeholder="Masukkan pesan donatur (opsional)">{{ $donations->pesan }}</textarea>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary w-full">Edit Donation</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
