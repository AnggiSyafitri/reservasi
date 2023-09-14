<?php $__env->startSection('main-content'); ?>

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Manage</h4>
            <span>Information</span>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <a href="<?php echo e(route('informations.create')); ?>" class="btn btn-primary">Add Information</a>
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
                                <th class="">Title</th>
                                <th class="">Description</th>
                                <th class="">Image</th>
                                <th class="">File</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $information): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($information->title); ?></td>
                                <td><?php echo e($information->description); ?></td>
                                <td class="p-3">
                                    <img src="<?php echo e('/uploads/informations/'.$information->image); ?>" width="128" class="img-fluid rounded" alt="">
                                </td>
                                <td class="">
                                    <a target="_blank" class="text-underline" href="<?php echo e('/uploads/informations/'.$information->file); ?>"><i class="fa fa-file-pdf"></i> <?php echo e($information->file); ?></a>
                                </td>
                                <td class="">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="<?php echo e(route('informations.edit', $information->id)); ?>" class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></a>
                                        
                                        
                                        <form action="<?php echo e(route('informations.destroy', $information->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure want to delete this data?')"><i class="fa fa-trash"></i></button>
                                        </form>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanettic/public_html/resources/views/informations/list.blade.php ENDPATH**/ ?>