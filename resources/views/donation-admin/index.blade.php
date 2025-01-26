<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Donation') }}
        </h2>
    </x-slot>
    @if (session('success'))
        <div id="toast" class="fixed top-5 right-5 bg-green-500 text-white px-6 py-4 rounded shadow-lg flex items-center space-x-4 animate-fade-in-out">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
        <script>
            setTimeout(() => {
                document.getElementById('toast').remove();
            }, 3000);
        </script>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 font-semibold text-gray-900 dark:text-gray-100">
                    <div class="flex flex-row">
                        <div>{{ __("Data Donation") }}</div>
                    </div>
                    <div class="flex flex-row-reverse">
                        <div class="flex-end">
                            <a href="{{ route('donation-admin.create') }}" class="btn btn-success" style="color: white">Tambah Donation</a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="overflow-x-auto">
                        <table class="table">
                          <!-- head -->
                          <thead>
                            <tr>
                              <th></th>
                              <th>Campaign</th>
                              <th>Jumlah Donasi</th>
                              <th>Nama Donatur</th>
                              <th>Email</th>
                              <th>No Hp</th>
                              <th class="text-center">Status</th>
                              <th class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                              @forelse ($donations as $donation )
                              <tr>
                                  <th>{{ $loop->iteration }}</th>
                                  <td>{{ $donation->campaign->judul }}</td>
                                  <td>Rp. {{number_format($donation->jumlah_donasi) }}</td>
                                  <td>{{ $donation->nama_donatur }}</td>
                                  <td>{{ $donation->email_donatur }}</td>
                                  <td>{{ $donation->no_hp_donatur }}</td>
                                    <td class="text-center">
                                        <span class="badge badge-{{ $donation->status == 'pending' ? 'warning' : 'success' }} text-white text-[11px] p-3">{{ $donation->status }}</span>
                                    </td>
                                  <td class="text-center">
                                        <div class="flex justify-center">
                                            <a href="{{ route('donation-admin.show',$donation->id) }}" class="btn btn-sm btn-neutral">Detail</a>
                                            <a href="{{ route('donation-admin.edit',$donation->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{ route('donation-admin.destroy',$donation->id) }}" class="btn btn-sm btn-error text-white" onclick="return confirmDelete({{ $donation->id }})">Delete</a>
                                        </div>
                                  </td>
                              </tr>
                              @empty
                                <tr>
                                    <td colspan="8" class="text-center text-gray-400">Data donation tidak ditemukan</td>
                                </tr>
                              @endforelse

                          </tbody>
                        </table>
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
@keyframes fade-in-out {
    0% { opacity: 0; transform: translateY(-10px); }
    10% { opacity: 1; transform: translateY(0); }
    90% { opacity: 1; transform: translateY(0); }
    100% { opacity: 0; transform: translateY(-10px); }
}
.animate-fade-in-out {
    animation: fade-in-out 3s ease-in-out;
}
</style>

