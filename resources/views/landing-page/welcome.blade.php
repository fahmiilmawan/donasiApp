@extends('layouts.app-landing-page')
@section('content')
    <div class="hero bg-base-200 min-h-screen relative"
        style="background-image:url({{ asset('image/hero.jpg') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="hero-content text-center relative">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold text-white">Satu Donasi, Dua Senyuman : Untuk anak dan lansia</h1>
                <p class="py-6 text-white">
                    Setiap donasi yang anda berikan tidak hanya memberikan bantuan materi, tetapi juga memberikan
                    harapan dan senyuman kepada anak-anak yang membutuhkan serta lansia yang mungkin merasa
                    terabaikan.
                </p>
                <a href="{{ route('index.showCampaign') }}" class="btn btn-success text-white">Donasi Sekarang!</a>
            </div>
        </div>
    </div>

    <div class="hero bg-base-200 min-h-screen ">
        <div class="hero-content flex-col lg:flex-row mx-10 border rounded-sm border-t-2 border-b-2 border-green-400 p-10 shadow-2xl">
            <img src="{{ asset('image/about.jpg') }}" alt="hero-image" class="max-w-sm rounded-lg shadow-2xl" width="300"
                height="auto" />
            <div class="p-5">
                <h1 class="text-5xl font-bold mb-3">Tentang Kami</h1>
                <p class="p-2 text-justify">
                    Selamat datang di DonasiApp, platform yang dirancang untuk menghubungkan kebaikan hati Anda
                    dengan kebutuhan mendesak anak-anak dan lansia di sekitar kita. Kami percaya bahwa setiap
                    individu, baik anak maupun orang tua, berhak mendapatkan perhatian, kasih sayang, dan dukungan.

                    Di DonasiApp, kami mengajak Anda untuk menjadi bagian dari perubahan positif. Melalui aplikasi
                    ini, Anda dapat memberikan donasi yang akan langsung digunakan untuk memenuhi kebutuhan dasar,
                    pendidikan, kesehatan, dan kebahagiaan mereka. Setiap donasi Anda membawa harapan baru dan
                    senyuman di wajah yang membutuhkan.

                    Kami berkomitmen untuk menjaga transparansi dan akuntabilitas. Setiap kontribusi akan dilaporkan
                    secara jelas, sehingga Anda bisa melihat dampak nyata dari donasi yang Anda berikan.
                    Bergabunglah dengan kami dan jadilah bagian dari komunitas yang peduli. Bersama, kita bisa
                    menciptakan dunia yang lebih baik untuk anak-anak dan lansia yang membutuhkan.
                </p>
                <button class="btn btn-success" style="color: white">Lihat Selengkapnya</button>
            </div>
        </div>
    </div>

    <div class="container my-10">
        <div class="text-center underline my-5" style="font-size: 50px;">
            <h5>Apa yang bisa kita bantu?</h5>
        </div>
        <div class="grid grid-cols-3 gap-4 mx-10">
            <div>
                <div class="card bg-base-100 w-96 shadow-xl">
                    <figure>
                        <img src="{{ asset('image/save-1.jpg') }}" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">Pendidikan</h2>
                        <p>If a dog chews shoes whose shoes does he choose?</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-success text-white">Baca Selengkapnya</button>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="card bg-base-100 w-96 shadow-xl">
                    <figure>
                        <img src="{{ asset('image/save-2.jpg') }}" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">Family-Like Care</h2>
                        <p>If a dog chews shoes whose shoes does he choose?</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-success text-white">Baca Selengkapnya</button>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="card bg-base-100 w-96 shadow-xl">
                    <figure>
                        <img src="{{ asset('image/save-3.jpg') }}" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">Kesehatan</h2>
                        <p>If a dog chews shoes whose shoes does he choose?</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-success text-white">Baca Selengkapnya</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-10">
        <div class="text-center underline my-5" style="font-size: 50px;">
            <h5>Campaigns</h5>
        </div>
        <div class="grid grid-cols-3 gap-4 mx-10 mt-5">
            @foreach ($campaigns as $campaign )
            <div>
                <div class="card bg-base-100 image-full w-96 shadow-xl">
                    <figure>
                        <img src="{{ asset('image/about.jpg') }}" alt="Shoes" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">{{ $campaign->judul }}</h2>
                        <p>{{ $campaign->deskripsi }}</p>
                        <div class="card-actions justify-end">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-10 w-full">
            <a href="{{ route('index.showCampaign') }}" class="btn btn-lg btn-success text-white">Lihat Selengkapnya</a>
        </div>
    </div>


@endsection

