@extends('layouts.landing')
@section('main')
<div class="container pt-4">
    <div class="row">
        <div class="col-12 col-md-12 mb-4 text-center">
            <div class="card">
                <div class="card-body">
                    {{-- <img src="{{ asset('images/success.png') }}" class="" alt=""> --}}
                    <i class="fa fa-check-circle text-success" style="font-size: 128px"></i>
                    <h4 class="text-success pt-3 mb-0">Reservation Success</h4>
                    <p class="pt-2">
                        <span class="">
                            Terima Kasih Telah Mempercayai King Kuphi
                        </span>
                        <br>
                        <span>Mohon untuk konfirmasi kembali reservasi anda ke Whatsapp Admin King Kuphi di nomor : 0812-4567-880</span>
                    </p>
                    <a href="/" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        localStorage.removeItem('_state_reservation')
    </script>
@endsection
