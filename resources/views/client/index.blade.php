@extends('layouts.landing')
@section('main')
<div class="container pt-4">
    <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" class="text-center">
        <h2>King Kuphi</h2>
        <p class="text-justify" style="text-indent: 50px">Selamat datang di King Kuphi! Kami adalah Rumah Makan minimalis
            dan sederhana. Di sini, kami menggabungkan cita rasa lezat dengan suasana yang hangat dan penuh
            keramahan.
        </p>
        <p class="text-justify" style="text-indent: 50px;">
            Kami juga menghadirkan atmosfer yang menyenangkan dengan Live Music yang akan menghibur anda saat
            menikmati hidangan dari King Kuphi. Kami selalu berusaha memberikan tempat yang nyaman bagi pelanggan
            kami untuk berkumpul, bersantai, dan menikmati hidangan dengan kerabat dan teman-teman terdekat.

            King Kuphi buka mulai pukul 08:00 hingga 22:00, sehingga anda dapat menikmati hidangan kami sepanjang
            hari. Kami berkomitmen untuk memberikan pelayanan terbaik kepada para pelanggan, karena kepuasan pelanggan
            adalah prioritas kami.
            Jadi, tunggu apa lagi? Kunjungi King Kuphi sekarang dan temukan pengalaman kuliner yang menggugah selera
            di tempat yang penuh kehangatan dan keceriaan. Nikmati makanan lezat, hiburan live music, dan suasana yang
            menyenangkan bersama kami. Ayo, jadikan King Kuphi sebagai tempat berkumpul dan menciptakan momen tak
            terlupakan bersama orang terkasih.
        </p>
    </div>
    <div class="text-center mt-5">
        <h2 class="pt-4">Information</h2>
        <div class="row my-4 justify-content-center">
            @foreach($information as $data)
                <div data-aos="zoom-in-up" class="col-12 col-md-6 mb-3">
                    <div class="card shadow ">
                        <img src="{{ '/uploads/informations/'.$data['image'] }}"
                            class="card-img-top rounded-5 img-fluid" style="height: 300px; object-fit:cover; " alt="...">
                        <div class="card-body bg-batik1">
                            <div class="bg-white p-4">
                                <h5 class="card-title"><b>{{$data['title']}}</b></h5>
                                <p class="fw-light"><b>{{$data['description']}}</b></p>
                                <a target="_blank" class="btn btn-primary text-center"
                                    href="{{ '/uploads/informations/'.$data['file'] }}">Discover</a>
                            </div>
                            {{-- <a href="#" class="btn btn-primary text-center">Go somewhere</a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="text-center mt-5">
        <h2 class="pt-4">Additional Offers</h2>
        <div class="row my-4 justify-content-center">
            @foreach($aditionals as $item)
                <div data-aos="zoom-in-right" class="col-12 col-md-4 mb-3">
                    <div class="card shadow">
                        <img src="{{ '/uploads/aditionalOffers/'.$item['image'] }}"
                            style="height:300px;object-fit: cover" class="card-img-top img-fluid" alt="...">
                        <div class="card-body bg-batik1">
                            <div class="bg-white p-4">
                                <h5 class="card-title"><b>{{ $item['title'] }}</b></h5>
                                <p class="fw-light"><b>{{ $item['description'] }}</b></p>
                                <a href="/offers-detail/{{ $item['slug'] }}"
                                    class="btn btn-primary text-center">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
