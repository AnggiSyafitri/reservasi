<?php $__env->startSection('main'); ?>
<div class="container pt-4">
    <div class="row">
        <div class="col-12 col-md-12 mb-4 text-center">
            <div class="card">
                <div class="card-body">
                    
                    <i class="fa fa-check-circle text-success" style="font-size: 128px"></i>
                    <h4 class="text-success pt-3 mb-0">Reservation Success</h4>
                    <p class="pt-2">
                        <span class="">
                            Terima Kasih Telah Mempercayai Rumah Sanetti
                        </span>
                        <br>
                        <span>Mohon untuk konfirmasi kembali reservasi anda ke Whatsapp Admin Rumah Sanetti di nomor : 0812-4567-880</span>
                    </p>
                    <a href="/" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        localStorage.removeItem('_state_reservation')
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanettic/public_html/resources/views/client/reservationDone.blade.php ENDPATH**/ ?>