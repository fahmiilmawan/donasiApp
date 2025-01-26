@extends('layouts.app-landing-page')

@section('content')


    <div class="container mx-auto p-10">
        <div class="max-w-3xl mx-auto border rounded-sm border-t-2 border-b-2 border-green-400 p-10 shadow-2xl">


        <h1 class="text-2xl font-bold mb-4">Donation Form</h1>
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-bold mb-4">Form Donasi</h1>
            <form id="donationForm" action="{{ route('donation.store-user') }}" method="POST">
                @csrf
                <div class="form-control mb-4">
                    <label for="nama_donatur" class="label">
                        <span class="label-text">Nama Donatur</span>
                    </label>
                    <input type="text" id="nama_donatur" name="nama_donatur" class="input input-bordered" required>
                </div>

                <div class="form-control mb-4">
                    <label for="email_donatur" class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" id="email_donatur" name="email_donatur" class="input input-bordered" required>
                </div>

                <div class="form-control mb-4">
                    <label for="no_hp_donatur" class="label">
                        <span class="label-text">No. HP</span>
                    </label>
                    <input type="text" id="no_hp_donatur" name="no_hp_donatur" class="input input-bordered" required>
                </div>

                <div class="form-control mb-4">
                    <label for="campaign_id" class="label">
                        <span class="label-text">Campaign</span>
                    </label>
                    <select id="campaign_id" name="campaign_id" class="select select-bordered" required>
                        <option disable selected>Pilih Campaign</option>
                        @foreach ($campaigns as $campaign)
                            <option value="{{ $campaign->id }}">{{ $campaign->judul }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-control mb-4">
                    <label for="jumlah_donasi" class="label">
                        <span class="label-text">Jumlah Donasi</span>
                    </label>
                    <input type="number" id="jumlah_donasi" name="jumlah_donasi" min="1000" class="input input-bordered" required>
                </div>

                <div class="form-control mb-4">
                    <label for="pesan" class="label">
                        <span class="label-text">Pesan</span>
                    </label>
                    <textarea id="pesan" name="pesan" class="textarea textarea-bordered" rows="4"></textarea>
                </div>

                <button type="submit" id="donateButton" class="btn btn-primary">Donate</button>
            </form>
        </div>

    </div>
    </div>

@endsection


