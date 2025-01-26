@extends('layouts.app-landing-page')

@section('content')


    <div class="container mx-auto p-10">
        <div class="max-w-4xl mx-auto border rounded-sm border-t-2 border-b-2 border-green-400 p-10 shadow-2xl">
            <div class="card card-compact bg-base-100 w-[700px] shadow-xl mx-auto">
                <figure>
                  <img
                    src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                    alt="Shoes" />
                </figure>
                <div class="card-body">
                  <h2 class="card-title">{{ $campaign->judul }}</h2>
                  <p>{{ $campaign->deskripsi }}</p>
                  <form id="donationForm" action="{{ route('donation.store-user') }}" method="POST">
                      @csrf
                      <div class="p-10">
                          <h5 class="card-title">Form Donasi</h5>

                            <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
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

    </div>
    </div>

@endsection


