@extends('layouts.app-landing-page')

@section('content')
    <div class="container">
        <div class="text-center underline my-5" style="font-size: 50px;">
            <h5>Daftar Campaigns</h5>
        </div>
        <div class="grid grid-cols-2 gap-4 m-10">
            @foreach ($campaigns as $campaign )

            <div>
                <div class="card card-side bg-base-100 shadow-xl">
                    <figure>
                        <img
                        src="https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.webp"
                        alt="Movie" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">{{ $campaign->judul }}</h2>
                        <p>{{ $campaign->deskripsi }}</p>
                        <div class="card-actions justify-end">
                           <a href="{{ route('index.createDonasiUser', $campaign->id) }}" class="btn btn-success text-white">Donasi</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
