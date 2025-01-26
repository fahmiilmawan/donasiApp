@extends('layouts.app-landing-page')
@section('content')
<div class="container mx-auto p-6">
    <div class="card shadow-lg bg-base-100">
        <div class="card-body">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="card-title text-xl font-bold">Detail Donasi</h2>
                </div>
                <div>
                    <button id="pay-button" class="btn btn-success text-white">Pay!</button>
                </div>
            </div>

            <div class="divider"></div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Nama Donatur</span>
                    </label>
                    <input type="text" value="{{ $donation->nama_donatur }}" class="input input-bordered" disabled>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="text" value="{{ $donation->email_donatur }}" class="input input-bordered" disabled>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">No. HP</span>
                    </label>
                    <input type="text" value="{{ $donation->no_hp_donatur }}" class="input input-bordered" disabled>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Campaign</span>
                    </label>
                    <input type="text" value="{{ $donation->campaign->judul }}" class="input input-bordered" disabled>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Jumlah Donasi</span>
                    </label>
                    <input type="text" value="Rp {{ number_format($donation->jumlah_donasi, 0, ',', '.') }}" class="input input-bordered" disabled>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Status</span>
                    </label>
                    <input type="text" value="{{ ucfirst($donation->status) }}" class="input input-bordered" disabled>
                </div>
            </div>

            <div class="form-control mt-4">
                <label class="label">
                    <span class="label-text">Pesan</span>
                </label>
                <textarea class="textarea textarea-bordered" rows="4" disabled>{{ $donation->pesan ?? 'Tidak ada pesan' }}</textarea>
            </div>

            <div class="card-actions justify-end mt-4">
                <a href="#" class="btn btn-success text-white">Kembali</a>
            </div>
            <div id="result-json">

            </div>
        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('{{ $donation->snap_token }}', {
          // Optional
          onSuccess: function(result){
            /* You may add your own js here, this is just example */
             document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
             window.location.href = "{{ route('donation.after-payment') }}" + '?order_id=' + result.order_id + '&transaction_status=' + result.transaction_status + '&status_code=' + result.status_code;

            },
            // Optional
            onPending: function(result){
                /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result);
            },
            // Optional
            onError: function(result){
                /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result);
          }
        });
      };
    </script>

@endsection
