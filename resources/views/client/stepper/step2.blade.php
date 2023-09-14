<div id="nama" class="content " role="tabpanel" aria-labelledby="nama-part-trigger">
    <div class="row my-3">
        <div class="col-md-6 mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="name" id="nama"
                placeholder="" required>
            <small class="form-text text-muted">Contoh: Jhon Doe</small>
            <div class="invalid-feedback">

            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="telephone" class="form-label">Nomer Telephone</label>
            <input type="number" class="form-control" name="telephone" id="telephone"
                placeholder="" required>
            <small class="form-text text-muted">Contoh: 08124567880</small>
            <div class="invalid-feedback">

            </div>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email"
                placeholder="" required>
            <small class="form-text text-muted">Contoh: JohnDoe@gmail.com</small>
            <div class="invalid-feedback">

            </div>
        </div>
        <div class="mb-3">
            <label for="allergy_note" class="form-label">Catatan Alergi</label>
            <textarea name="allergy_note" id="allergy_note" class="form-control" cols="30" rows="10">-</textarea>
        </div>
        <div class="mb-3">
            <label for="request_note" class="form-label">Catatan Tambahan</label>
            <textarea name="request_note" id="request_note" class="form-control" cols="30" rows="10">-</textarea>
        </div>
        <div class="mb-3">
            <label for="sitting_area" class="form-label">Tipe Reservasi</label>
            <select name="type" id="type" class="form-control">
                <option value="order_now">Order Now at Website</option>
                <option value="order_later">Order later at Restaurant</option>
            </select>
        </div>
    </div>
    <div class="float-end">
    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
    <button class="btn btn-primary" onclick="onStep2()">Next</button>
    </div>
</div>
