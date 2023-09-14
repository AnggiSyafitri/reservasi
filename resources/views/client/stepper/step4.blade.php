<div id="confirm" class="content" role="tabpanel " aria-labelledby="confirm-part-trigger">
    <div class="row mt-3">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 order-lg-2 mb-4">
                            <h4
                                class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Your cart</span>
                            </h4>
                            {{-- cart --}}
                            <ul id="cart_container_step4" class="list-group mb-3 table-responsive" style="max-height: 200px">

                            </ul>
                            <div class="p-3 border rounded-lg d-flex flex-column justify-content-center">
                                <div class="d-flex justify-content-between">
                                    <h3 class="fw-bold">Total: </h3>
                                    <span id="total_price_step4">Rp -</span>
                                </div>
                                <div class="">
                                    <small>
                                        Saat pembayaran diakhir akan dikenakan charge tax and services sebesar 18,5%
                                    </small>
                                </div>
                            </div>
                            <ul class="list-group mt-3">
                                <li class="list-group-item"><h3 class="fw-bold">Tata Cara Pembayaran: </h3></li>
                                <li class="list-group-item"><small>Silahkan transfer ke rekening berikut <br> (BCA) 8693181745 (Thelapan Abadi Jaya PT)</small></li>
                                <li class="list-group-item"><small>Nominal yang dikirim sebesar Rp 150.000, sebagai booking fee. Biaya tersebut akan digunakan saat pembayaran akhir di kasir</small></li>
                                <li class="list-group-item"><small>Upload bukti, untuk pembayaran menu akan dilakukan di kasir, dan jangan lupa untuk memberitahu kasir atas biaya booking fee yang telah dilakukan saat melakukan pembayaran akhir</small></li>
                            </ul>
                        </div>
                        <div class="col-lg-8 order-lg-1">
                            <h4 class="mb-3">Reservation</h4>
                            <form method="POST" accept="{{ route('reservation.create') }}" id="form_step4" class="needs-validation" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="name"
                                            id="name" placeholder="Your Name" required>
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="telephone" class="form-label">Nomor Telephone</label>
                                        <input type="tel" class="form-control"
                                            name="telephone" id="telephone"
                                            placeholder="Your Telephone Number" required>
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        id="name" placeholder="" required>
                                    <div class="invalid-feedback">

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="mdate" class="form-label">Tanggal Reservasi</label>
                                        <input required type="text" class="form-control"
                                            name="reservation_date" id="mdate">
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="teleptimepicker"
                                            class="form-label">Jam Reservasi</label>
                                        <input required class="form-control" id="timepicker"
                                            name="reservation_time"
                                            placeholder="Check time">
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="allergy_note" class="form-label">Catatan Alergi</label>
                                    <textarea name="allergy_note" id="allergy_note"
                                        class="form-control" cols="30" rows="10"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="request_note"
                                        class="form-label">Catatan</label>
                                    <textarea name="request_note" id="request_note"
                                        class="form-control" cols="30" rows="10"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="guest_amount" class="form-label">Jumlah Tamu</label>
                                    <div class="input-group">
                                        <span class="input-group-text">@</span>
                                        <input type="number" min="1" value="1"
                                            class="form-control" name="guest_amount"
                                            id="guest_amount" required>
                                        <div class="invalid-feedback" style="width: 100%;">

                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="sitting_area" class="form-label">Ruangan</label>
                                    <select name="sitting_area" id="sitting_area" class="form-control">
                                        @foreach ($sitting_areas as $s)
                                            <option value="{{ $s->id }}">{{ $s->name }} - {{ $s->capacity }}</option>
                                        @endforeach
                                    </select>
                                    @error('sitting_area')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="type" class="form-label">Jenis Reservasi</label>
                                    <select name="type" id="sitting_area" class="form-control">
                                        <option value="order_now">Order Now at Website</option>
                                        <option value="order_later">Order later at Restaurant</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="proof " class="form-label">Bukti pembayaran booking fee</label>
                                    <input required type="file" name="proof" id="proof" class="form-control">
                                    <small>File berupa jpg, jpeg, png dan ukuran file max 5mb</small>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="setuju_semua_benar">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Menyetujui semua isi benar
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="setuju_dengan_syarat">
                                        <label class="form-check-label" for="flexCheckChecked">
                                          Menyetujui <a href="{{ route('question') }}" style="color: blue;text-decoration: underline">syarat dan ketentuan</a> yang berlaku
                                        </label>
                                      </div>
                                </div>
                                {{-- input menus --}}
                                <div class="d-none" id="menus_input">
                                </div>
                                <button id="booking_button" disabled class="btn btn-primary btn-lg btn-block"
                                    type="submit">Booking</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="float-end">
    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
    </div>
</div>
