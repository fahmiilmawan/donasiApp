@extends('layouts.app-landing-page')

@section('content')
<div class="min-h-screen flex flex-col justify-center items-center bg-gray-100">
    <div class="card w-[500px] bg-white shadow-xl rounded-lg my-10">
        <div class="card-body text-center">
            <div class="flex justify-center">
                <div class="avatar w-64">
                        <img src="{{ asset('image/thank-you.jpg') }}" alt="Thank You Image">

                </div>
            </div>
            <h1 class="text-2xl font-bold text-success mt-4">Terima Kasih!</h1>
            <p class="text-gray-600 mt-2">
                Anda adalah bagian dari perubahan besar. Terima kasih atas kebaikan hati Anda dalam berdonasi.
                Panjang umur orang baik!
            </p>
            <div class="mt-4">
                <a href="{{ route('index.showCampaign') }}" class="btn btn-success btn-sm text-white">Lihat Campaign Lainnya</a>
            </div>
        </div>
    </div>
</div>
@endsection
