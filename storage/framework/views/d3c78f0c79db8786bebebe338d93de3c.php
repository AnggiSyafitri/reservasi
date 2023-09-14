<?php $__env->startSection('main'); ?>
<div class="container mt-5">
    <h2 class='text-center pt-5'><b>MOST FREQUENTLY ASKED QUESTIONS ABOUT SANETTI</b></h2>
    <div class="my-4">
        <div class="card">
            <div class="card-body">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div data-aos="fade-up"
                    data-aos-anchor-placement="top-bottom" class="accordion-item border border-primary rounded rounded-5">
                        <h2 class="accordion-header p-3" id="flush-headingOne">
                            <a class="accordion-button p-0 py-3 fs-4 collapsed bg-transparent text-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-<?php echo e($question->id); ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                                <?php echo e($question->question); ?>

                            </a>
                        </h2>
                        <div id="flush-<?php echo e($question->id); ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body p-3 bg-white">
                                <?php echo $question->answer; ?>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Web\app\resources\views/client/question.blade.php ENDPATH**/ ?>