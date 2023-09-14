<?php $__env->startSection('main-content'); ?>

<div class="row mt-3">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 order-lg-2 mb-4">
                        <h4
                            class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Reservation Detail</span>
                        </h4>
                        
                        <ul id="cart_container_step4" class="list-group mb-3 table-responsive" style="max-height: 200px">

                        </ul>
                        <div class="p-3 border rounded-lg d-flex flex-column justify-content-center">
                            <div class="d-flex justify-content-between">
                                <h3 class="fw-bold">Total: </h3>
                                <span id="total_price_step4">

                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 order-lg-1">
                        <h4 class="mb-3">Reservation</h4>
                        <form method="POST" accept="<?php echo e(route('reservation.create')); ?>" id="form_step4" class="needs-validation" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
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

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="mdate" class="form-label">Tanggal Reservasi</label>
                                    <input type="text" class="form-control"
                                        name="reservation_date" id="mdate">
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="teleptimepicker"
                                        class="form-label">Jam Reservasi</label>
                                    <input class="form-control" id="timepicker"
                                        name="reservation_time"
                                        placeholder="Check time">
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
                                <label for="proof " class="form-label">Bukti pembayaran booking fee</label>
                                <div class="mt-3 p-3">
                                    <img src="<?php echo e('/uploads/proofs/'.$data->proof); ?>" width="128" class="img-fluid rounded" alt="">
                                </div>
                                <div class="p-3">
                                    <a href="<?php echo e('/uploads/proofs/'.$data->proof); ?>" target="_blank">See detail</a>
                                </div>
                            </div>
                            
                            <div class="d-none" id="menus_input">
                            </div>
                            <div class="d-flex gap-2">
                                <a class="btn btn-primary" href="<?php echo e(route('books.index')); ?>">Back</a>
                                <a href="<?php echo e(route('books.verify', $data->id)); ?>" class="btn btn-success gap-2"><i class="fa fa-check"></i> Verify</a>
                                <a href="<?php echo e(route('books.reject', $data->id)); ?>" class="btn btn-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#FFFFFF" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                                    Reject
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>

        var data = JSON.parse(`<?php echo json_encode($data); ?>`)
        console.log(data);
        var cart = data.menus

        _input = data
        $("#total_price_step4").html(rupiah(caculateTax(18.5, parseInt("<?php echo e($data->menus()->sum('total_price')); ?>"))))
        Object.keys(_input).forEach((inp, index) => {
            $(`*[name='${inp}']`).val(_input[inp]).change();
        });
        renderCartElement('#cart_container_step4', true)

        $("select[name='sitting_area']").val(parseInt(_input['sitting_area'])).change()

    function rupiah(num) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
        }).format(num);
    }

    function caculateTax(tax, num) {
        return (num * (tax / 100)) + num
    }

    function renderCartElement(id='#cart_container', noDelete=false) {
        $(id).html('')
        cart.forEach((menu, index) => {
            $(id).append(
            `<li id="cart_menu_${menu.id}" data-id-menu="${menu.id}" class="list-group-item d-flex justify-content-between align-items-center lh-condensed p-0">
                <div class="col-12">
                    <div class="p-3 d-flex justify-content-between">
                        <div>
                            ${menu.detail.name}
                            <br>
                            ${rupiah(parseInt(menu.detail.price))}
                        </div>
                        <span class="d-flex align-items-center">x ${menu.amount}</span>
                        </div>
                        ${!noDelete ? `
                            <div class="card-footer border-0 rounded-0 row m-0">
                                <button onclick="removeMenu(${index})" class="btn btn-sm col-12 btn-secondary"><i class="fa fa-trash"></i></button>
                            </div>
                        ` : ``}
                </div>
            </li>`)
        })
    }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanettic/public_html/resources/views/books/detail.blade.php ENDPATH**/ ?>