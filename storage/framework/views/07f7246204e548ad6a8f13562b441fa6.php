<div id="step1" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
    <div class="row mt-3 ">
        <div class="col-md-6 mb-3">
            <label for="mdate" class="form-label">Tanggal Reservasi</label>
            <input placeholder="pilih tanggal" type="text" class="form-control" name="reservation_date" id="mdate">
            <?php $__errorArgs = ['reservation_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback">

                </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="col-md-6 mb-3">
            <label for="teleptimepicker" class="form-label">Waktu Reservasi</label>
            <input class="form-control" id="timepicker" name="reservation_time"
                placeholder="pilih waktu">
            <?php $__errorArgs = ['reservation_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback">

                </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
            <?php $__currentLoopData = $sitting_areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($s->id); ?>"><?php echo e($s->name); ?> - <?php echo e($s->capacity); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php $__errorArgs = ['sitting_area'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback">
                <?php echo e($message); ?>

            </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="mb-3">
        <div id="reservation_check_message" class="mt-3">
        </div>
        <button id="cekKetersediaan" onclick="cekKetersediaan()" class="btn btn-primary loading d-flex">
            <div id="spinner-container"></div>
            
            Cek Ketersediaan
        </button>
    </div>
    <div class="float-end">
        <button class="btn btn-primary" id="nextStep1" disabled onclick="onStep1()">Next</button>
    </div>
</div>
<?php /**PATH /home/sanettic/public_html/resources/views/client/stepper/step1.blade.php ENDPATH**/ ?>