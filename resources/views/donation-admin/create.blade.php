<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Campaign') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 font-semibold text-gray-900 dark:text-gray-100">
                    <h2 class="text-lg">Tambah Donation</h2>
                </div>
            </div>

            <div class="grid grid-cols-3">
                <div class="p-10">
                    <h5 class="font-semibold">Donation Information</h5>
                    <p></p>
                </div>
                <div class="col-span-2">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-5 p-6">
                        <form action="{{ route('donation-admin.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <label for="judul" class="label">Pilih Campaign</label>
                                <select name="campaign_id" id="campaign_id" class="select w-full">
                                    <option value="">Pilih Campaign</option>
                                    @foreach ($campaigns as $campaign)
                                        <option value="{{ $campaign->id }}">{{ $campaign->judul }}</option>
                                    @endforeach
                                </select>
                                @error('campaign_id')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="jumlah_donasi" class="label">Jumlah Donasi</label>
                                <input type="number" name="jumlah_donasi" class="input w-full" placeholder="Masukkan jumlah donasi" required>
                                @error('jumlah_donasi')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="nama_donatur" class="label">Nama Donatur</label>
                                <input type="text" name="nama_donatur" class="input w-full" placeholder="Masukkan nama donatur" required>
                                @error('nama_donatur')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="email_donatur" class="label">Email Donatur</label>
                                <input type="email" name="email_donatur" class="input w-full" placeholder="Masukkan email donatur" required>
                                @error('email_donatur')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="no_hp_donatur" class="label">No. HP Donatur</label>
                                <input type="text" name="no_hp_donatur" class="input w-full" placeholder="Masukkan no. hp donatur" required>
                                @error('no_hp_donatur')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="pesan">Pesan</label>
                                <textarea name="pesan" id="pesan" class="textarea w-full" rows="4" placeholder="Masukkan pesan"></textarea>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary w-full">Tambah Donation</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
