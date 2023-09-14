@extends('layouts.landing')
@section('main')
<div class="container mt-5">
    <div data-aos="zoom-in-down" class="card text-bg-dark">
        <img src="{{ '/uploads/aditionalOffers/'.$data['image'] }}" class="card-img" style="border-radius: 50;height:500px;object-fit: contain;" alt="...">
    </div>
    <h1 data-aos="fade-right" class="text-center pt-4"><b>{{$data['title']}}</b></h1>
    <div class="my-3 text-center">
        {{-- <a href="" class="btn btn-primary mt-2">BOOK</a> --}}
    </div>
    <hr>
    <div  data-aos="fade-right" class="my-4">
        {!! $data['detail'] !!}
    </div>

    <div class="my-5">
        <div class="pt-5">
            <h2 data-aos="zoom-in-down" class="text-center"><b>You might also like</b></h2>
            <div class="row justify-content-center">
                @foreach ($aditionals as $item)
                <div data-aos="zoom-in-right" class="col-12 col-md-4 my-4">
                    <div class="card shadow">
                        <img src="{{ '/uploads/aditionalOffers/'.$item['image'] }}" style="height:300px;object-fit: cover" class="card-img-top img-fluid" alt="...">
                        <div class="card-body bg-batik1">
                            <div class="bg-white p-4">
                                <h5 class="card-title"><b>{{$item['title']}}</b></h5>
                                <p class="fw-light"><b>{{ $item['description']}}</b></p>
                                <a href="/offers-detail/{{$item['slug']}}" class="btn btn-primary text-center">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection
