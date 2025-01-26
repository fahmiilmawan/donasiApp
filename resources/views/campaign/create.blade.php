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
                    <h2 class="text-lg">Tambah Campaign</h2>
                </div>
            </div>

            <div class="grid grid-cols-3">
                <div class="p-10">
                    <h5 class="font-semibold">Campaign Information</h5>
                    <p></p>
                </div>
                <div class="col-span-2">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-5 p-6">
                        <form action="{{ route('campaign.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <label for="judul" class="label">Judul Campaign</label>
                                <input type="text" name="judul" class="input input-bordered w-full" placeholder="Masukkan judul campaign" required>
                                @error('judul')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="deskripsi" class="label">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="textarea w-full" placeholder="Masukkan deskripsi campaign" required></textarea>
                                @error('deskripsi')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="target_donasi" class="label">Target Donasi</label>
                                    <input type="number" name="target_donasi" class="input w-full" placeholder="Masukkan target donasi" required>
                                    @error('target_donasi')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="donasi_terkumpul" class="label">Donasi Terkumpul</label>
                                    <input type="number" name="donasi_terkumpul" class="input w-full" placeholder="Masukkan donasi terkumpul" value="0" readonly>
                                    @error('donasi_terkumpul')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="tanggal_dimulai" class="label">Tanggal Dimulai</label>
                                    <input type="date" name="tanggal_dimulai" class="input w-full" required>
                                    @error('tanggal_dimulai')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="tanggal_berakhir" class="label">Tanggal Berakhir</label>
                                    <input type="date" name="tanggal_berakhir" class="input w-full" required>
                                    @error('tanggal_berakhir')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="gambar" class="label">Gambar</label>
                                <input type="file" name="foto" class="file-input w-full">
                                @error('foto')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary w-full">Tambah Campaign</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
