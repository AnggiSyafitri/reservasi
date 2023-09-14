<?php $__env->startSection('main-content'); ?>

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Manage</h4>
            <span>Books</span>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php if(session('error')): ?>
                <div class="alert alert-danger my-3" role="alert">
                    <?php echo e(session('error')); ?>

                  </div>
                <?php endif; ?>
                <?php if(session('success')): ?>
                <div class="alert alert-success my-3" role="alert">
                    <?php echo e(session('success')); ?>

                  </div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table id="datatables" class="display table table-striped" style="min-width: 845px">
                        <thead class="">
                            <tr class="text-white border-bottom-0">
                                <th>Id</th>
                                <th class="">Status</th>
                                <th class="">Name</th>
                                <th class="">Telephone</th>
                                <th class="">Guest Amount</th>
                                <th class="">Sitting Area</th>
                                <th class="">Reservation Date</th>
                                <th class="">Reservation Time</th>
                                <th class="">Allergy Note</th>
                                <th class="">Request Note</th>
                                <th class="">Type</th>
                                <th class="">Proof</th>
                                <th class="">Booked at</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($book->id); ?></td>
                                <td>
                                    <?php if($book->status == 'unverified'): ?>
                                        <span class="badge badge-pill bg-warning"><i class="fa fa-clock"></i> Unverified</span>
                                    <?php endif; ?>
                                    <?php if($book->status == 'verified'): ?>
                                        <span class="badge badge-pill bg-success"><i class="fa fa-check-circle"></i> Verified</span>
                                    <?php endif; ?>
                                    <?php if($book->status == 'rejected'): ?>
                                        <span class="badge badge-pill bg-danger"><i class="fa fa-"></i> Rejected</span>
                                    <?php endif; ?>
                                    <?php if($book->status == 'completed'): ?>
                                        <span class="badge badge-pill bg-secondary"><i class="fa fa-"></i> Completed</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($book->name); ?></td>
                                <td><?php echo e($book->telephone); ?></td>
                                <td class="text-center"><i class="fa fa-users"></i> <?php echo e($book->guest_amount); ?></td>
                                <td class="text-center"><?php echo e($book->sittingArea()->first()->name); ?></td>
                                <td class="text-end"><?php echo e(Carbon\Carbon::parse($book->reservation_date)->format('Y-m-d')); ?></td>
                                <td class="text-end"><?php echo e(Carbon\Carbon::parse($book->reservation_time)->locale('id')->format('h:i A')); ?></td>
                                <td><?php echo e($book->allergy_note); ?></td>
                                <td><?php echo e($book->request_note); ?></td>
                                <td><?php echo e($book->type); ?></td>
                                <td>
                                    <a href="<?php echo e('/uploads/proofs/'.$book->proof); ?>" target="_blank"><?php echo e($book->proof); ?></a>
                                </td>
                                <td class="text-end"><?php echo e($book->created_at); ?></td>
                                <td class="">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="<?php echo e(route('books.show', $book->id)); ?>" class="btn btn-primary d-flex align-items-center"><i class="fa fa-eye"></i></a>
                                        <form action="<?php echo e(route('books.destroy', $book->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger h-100" onclick="return confirm('Are you sure want to delete this data?')"><i class="fa fa-trash"></i></button>
                                        </form>
                                        <a href="<?php echo e(route('books.verify', $book->id)); ?>" class="btn btn-success gap-2"><i class="fa fa-check"></i> Verify</a>
                                        <a href="<?php echo e(route('books.reject', $book->id)); ?>" class="btn btn-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="#FFFFFF" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                                            Reject
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $("#datatables").dataTable()
</script>
<style>
    table.dataTable.no-footer {
        border-bottom: 0 !important;
    }
    .dataTable.no-footer tfoot th,
    .dataTable.no-footer tfoot th,
    .dataTable.no-footer tfoot td {
        border-bottom: none;
    }
    .dataTable.no-footer thead th{
        border-bottom: solid 1px #f0f1f5
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanettic/public_html/resources/views/books/list.blade.php ENDPATH**/ ?>