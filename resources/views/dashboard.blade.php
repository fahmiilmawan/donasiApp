<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Summary Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
                <div class="card shadow-md bg-primary text-primary-content">
                    <div class="card-body">
                        <h2 class="card-title">Total Campaigns</h2>
                        <p>{{ $totalCampaigns }}</p>
                    </div>
                </div>
                <div class="card shadow-md bg-success text-secondary-content">
                    <div class="card-body">
                        <h2 class="card-title">Total Donations</h2>
                        <p>Rp. {{ number_format($totalDonations) }}</p>
                    </div>
                </div>
            </div>

            <!-- Charts -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Pie Chart Campaigns -->
                <div class="card bg-base-100 shadow-md">
                    <div class="card-body">
                        <h2 class="card-title">Campaign Progress</h2>
                        <canvas id="campaignChart"></canvas>
                    </div>
                </div>
                <!-- Donations Table -->
             <div class="card bg-base-100 shadow-md">
                <div class="card-body">
                    <h2 class="card-title">Recent Donations</h2>
                    <div class="overflow-x-auto">
                        <table class="table w-full">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Donatur</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Campaign</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($donations as $donation)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $donation->nama_donatur }}</td>
                                        <td>Rp. {{ number_format($donation->jumlah_donasi) }}</td>
                                        <td>
                                            <span class="badge badge-{{ $donation->status == 'pending' ? 'warning' : ($donation->status == 'success' ? 'success' : 'error') }} text-white">
                                                {{ ucfirst($donation->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $donation->campaign->judul }}</td>
                                        <td>{{ $donation->created_at->format('d M Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No donations found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>

            <!-- Tabel Campaigns -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-lg font-semibold mb-4">Campaigns Data</h2>
                    <div class="overflow-x-auto">
                        <table class="table w-full">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Campaign Title</th>
                                    <th>Target</th>
                                    <th>Collected</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($campaigns as $campaign)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $campaign->judul }}</td>
                                        <td>Rp. {{ number_format($campaign->target_donasi) }}</td>
                                        <td>Rp. {{ number_format($campaign->donasi_terkumpul) }}</td>
                                        <td>{{ $campaign->tanggal_dimulai }}</td>
                                        <td>{{ $campaign->tanggal_berakhir }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-gray-400">No campaigns found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data for Campaign Chart
        const campaignData = {
            labels: @json($campaigns->pluck('judul')),
            datasets: [{
                label: 'Donasi Terkumpul',
                data: @json($campaigns->pluck('donasi_terkumpul')),
                backgroundColor: ['#4CAF50', '#FFC107', '#2196F3', '#F44336', '#9C27B0'],
            }]
        };

        const campaignConfig = {
            type: 'pie',
            data: campaignData,
        };

        // Render Campaign Chart
        new Chart(document.getElementById('campaignChart'), campaignConfig);

    </script>
</x-app-layout>
