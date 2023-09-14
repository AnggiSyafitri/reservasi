@extends('layouts.landing')
@section('main')
<div class="container mt-5">
    <h2 class='text-center pt-5'><b>MOST FREQUENTLY ASKED QUESTIONS ABOUT King Kuphi</b></h2>
    <div class="my-4">
        <div class="card">
            <div class="card-body">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @foreach ($questions as $question)
                    <div data-aos="fade-up"
                    data-aos-anchor-placement="top-bottom" class="accordion-item border border-primary rounded rounded-5">
                        <h2 class="accordion-header p-3" id="flush-headingOne">
                            <a class="accordion-button p-0 py-3 fs-4 collapsed bg-transparent text-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-{{ $question->id }}" aria-expanded="false" aria-controls="flush-collapseOne">
                                {{ $question->question }}
                            </a>
                        </h2>
                        <div id="flush-{{ $question->id }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body p-3 bg-white">
                                {!! $question->answer !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
