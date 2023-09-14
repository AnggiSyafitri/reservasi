<!--**********************************
            Sidebar start
        ***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="<?php echo e(route('dashboard.index')); ?>" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <?php if(Auth::user()->role == 'admin'): ?>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-database"></i>
                    <span class="nav-text">Catalogue data</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo e(route('menus.index')); ?>">Menus</a></li>
                    <li><a href="<?php echo e(route('informations.index')); ?>">Information</a></li>
                    <li><a href="<?php echo e(route('aditionalOffers.index')); ?>">Aditional Offers</a></li>
                    <li><a href="<?php echo e(route('sittingAreas.index')); ?>">Sitting Areas</a></li>
                    <li><a href="<?php echo e(route('questions.index')); ?>">Questions</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <li>
                <a href="<?php echo e(route('books.index')); ?>" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-calendar"></i>
                    <span class="nav-text">Reservations</span>
                </a>
            </li>
            <?php if(Auth::user()->role == 'admin'): ?>
            <li>
                <a href="<?php echo e(route('users.index')); ?>" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-users"></i>
                    <span class="nav-text">Users</span>
                </a>
            </li>
            <?php endif; ?>
            <li>
                <a href="<?php echo e(route('dashboard.profile')); ?>" class="ai-icon" aria-expanded="false">
                    <i class="fa fa-user"></i>
                    <span class="nav-text">Profile</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->
<?php /**PATH C:\Web\app\resources\views/partials/sidebar.blade.php ENDPATH**/ ?>