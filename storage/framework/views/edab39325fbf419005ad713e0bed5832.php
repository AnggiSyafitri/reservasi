<?php $__env->startSection('main'); ?>
<div class="authincation mt-5 h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-5">
                <div class="form-input-content text-center error-page">
                    <h1 class="error-text font-weight-bold">500</h1>
                    <h4><i class="fa fa-times-circle text-danger"></i> Internal Server Error</h4>
                    <p>You do not have permission to view this resource</p> 
                    <div>
                        <a class="btn btn-primary" href="/">Back to Home</a>
                    </div>	
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanettic/public_html/resources/views/errors/500.blade.php ENDPATH**/ ?>