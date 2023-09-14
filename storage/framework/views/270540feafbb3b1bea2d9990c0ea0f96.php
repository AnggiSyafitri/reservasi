<?php $__env->startSection('main-content'); ?>
<div class="row page-titles">
    <ol class="breadcrumb">
        
        <li class="breadcrumb-item"><a href="javascript:void(0)">King Kuphi / Admin / Profile</a></li>
    </ol>
</div>
<!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="profile card card-body px-3 pt-3 pb-0">
            <div class="profile-head">
                <div class="photo-content">
                    <div class="cover-photo rounded"></div>
                </div>
                <div class="profile-info">
                    <div class="profile-photo">
                        <img src="/images/profile/<?php echo e(Auth::user()->profile); ?>"
                            class="img-fluid border border-primary rounded-circle" alt="">
                    </div>
                    <div class="profile-details">
                        <div class="profile-name px-3 pt-2">
                            <h4 class="text-primary mb-0"><?php echo e(Auth::user()->username); ?></h4>
                            <p><?php echo e(Auth::user()->name); ?></p>
                        </div>
                    </div>
                </div>
                <?php if(session('success2')): ?>
                <div class="alert alert-success my-3" role="alert">
                    <?php echo e(session('success2')); ?>

                  </div>
                <?php endif; ?>
                <?php if(session('error')): ?>
                <div class="alert alert-danger  my-3">
                    <?php echo e(session('error')); ?>

                </div>
                <?php endif; ?>
                <?php if(session('success')): ?>
                <div class="alert alert-success my-3" role="alert">
                    <?php echo e(session('success')); ?>

                  </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#profile" data-bs-toggle="tab"
                                                    class="nav-link active show">Profile</a>
                                            </li>
                                            <li class="nav-item"><a href="#password" data-bs-toggle="tab"
                                                    class="nav-link">Password</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="profile" class="tab-pane fade active show">
                                                <div class="my-post-content pt-3">
                                                    <div class="my-4">
                                                        <h3 class="text-primary"><b>Edit Profile</b></h3>
                                                        <form action="<?php echo e(route('editProfile')); ?>" class="mt-3" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <div class="mb-3">
                                                                <label for="username">Username :</label>
                                                                <input type="text"
                                                                    class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                    name="username" id="username" placeholder="Username"
                                                                    value="<?php echo e(Auth::user()->username); ?>">
                                                                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div id="username" class="invalid-feedback">
                                                                        <?php echo e($message); ?>

                                                                    </div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="name">Name :</label>
                                                                <input type="text"
                                                                    class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                    name="name" id="name" placeholder="Name"
                                                                    value="<?php echo e(Auth::user()->name); ?>">
                                                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div id="name" class="invalid-feedback">
                                                                        <?php echo e($message); ?>

                                                                    </div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                            <div class="mb-3">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Edit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="password" class="tab-pane fade">
                                                <div class="my-4">
                                                    <h3 class="text-primary"><b>Ganti Password</b></h3>
                                                    <form action="<?php echo e(route('editProfile')); ?>" class="mt-3" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="mb-3">
                                                            <label for="current_password">Current Password :</label>
                                                            <input type="password" class="form-control <?php $__errorArgs = ['current_pasword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                name="current_password" id="current_password"
                                                                placeholder="Current Password">
                                                                <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <div id="current_password" class="invalid-feedback">
                                                                    <?php echo e($message); ?>

                                                                </div>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="new_password">New Password :</label>
                                                            <input type="password" class="form-control <?php $__errorArgs = ['new_pasword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                name="new_password" id="new_password"
                                                                placeholder="New Password">
                                                                <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <div id="new_password" class="invalid-feedback">
                                                                    <?php echo e($message); ?>

                                                                </div>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        
                                                        <div class="mb-3">
                                                            <button type="submit" class="btn btn-primary">Edit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\App\app\resources\views/admin/profile.blade.php ENDPATH**/ ?>