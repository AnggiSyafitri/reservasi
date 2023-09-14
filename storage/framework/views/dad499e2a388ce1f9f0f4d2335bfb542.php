<?php $__env->startSection('main'); ?>
<div class="container mt-5">
    <div data-aos="zoom-in-down" class="card text-bg-dark">
        <img src="<?php echo e('/uploads/aditionalOffers/'.$data['image']); ?>" class="card-img" style="border-radius: 50;height:500px;object-fit: contain;" alt="...">
    </div>
    <h1 data-aos="fade-right" class="text-center pt-4"><b><?php echo e($data['title']); ?></b></h1>
    <div class="my-3 text-center">
        
    </div>
    <hr>
    <div  data-aos="fade-right" class="my-4">
        <?php echo $data['detail']; ?>

    </div>

    <div class="my-5">
        <div class="pt-5">
            <h2 data-aos="zoom-in-down" class="text-center"><b>You might also like</b></h2>
            <div class="row justify-content-center">
                <?php $__currentLoopData = $aditionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div data-aos="zoom-in-right" class="col-12 col-md-4 my-4">
                    <div class="card shadow">
                        <img src="<?php echo e('/uploads/aditionalOffers/'.$item['image']); ?>" style="height:300px;object-fit: cover" class="card-img-top img-fluid" alt="...">
                        <div class="card-body bg-batik1">
                            <div class="bg-white p-4">
                                <h5 class="card-title"><b><?php echo e($item['title']); ?></b></h5>
                                <p class="fw-light"><b><?php echo e($item['description']); ?></b></p>
                                <a href="/offers-detail/<?php echo e($item['slug']); ?>" class="btn btn-primary text-center">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanettic/demo.sanetti.co.id/resources/views/client/OffersDetail.blade.php ENDPATH**/ ?>