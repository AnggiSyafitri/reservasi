<div id="step1" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
    <div class="row mt-3 ">
        <div class="col-md-6 mb-3">
            <label for="mdate" class="form-label">Tanggal Reservasi</label>
            <input placeholder="pilih tanggal" type="text" class="form-control" name="reservation_date" id="mdate">
            @error('reservation_date')
                <div class="invalid-feedback">

                </div>
            @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label for="teleptimepicker" class="form-label">Waktu Reservasi</label>
            <input class="form-control" id="timepicker" name="reservation_time"
                placeholder="pilih waktu">
            @error('reservation_time')
                <div class="invalid-feedback">

                </div>
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <label for="guest_amount" class="form-label">Jumlah Orang</label>
        <div class="input-group">
            <span class="input-group-text">@</span>
            <input type="number" min="1" value="1" class="form-control" name="guest_amount"
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
        <div id="reservation_check_message" class="mt-3">
        </div>
        <button id="cekKetersediaan" onclick="cekKetersediaan()" class="btn btn-primary loading d-flex">
            <div id="spinner-container"></div>
            {{-- <span class="spinner-border text-white" style="width: 20px; height: 20px;"></span> --}}
            Cek Ketersediaan
        </button>
    </div>
    <div class="float-end">
        <button class="btn btn-primary" id="nextStep1" disabled onclick="onStep1()">Next</button>
    </div>
</div>
