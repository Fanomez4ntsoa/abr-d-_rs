<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="single-suggest d-flex justify-content-between align-items-center" onclick="inviteEventPeople('<?php echo e($user->id); ?>', '<?php echo e($user->name); ?>')">
            <div class="suggest-avatar d-flex justify-content-between align-items-center">
                <img src="<?php echo e(get_user_image($user->photo, 'optimized')); ?>" class="img-fluid user-round"
                                                                                width="45" alt="Avatar">
                    <h3 class="h6 ms-2"><a href=""><?php echo e($user->name); ?></a> </h3>
            </div>
                <button class="btn btn-secondary" type="button"><i class="fa fa-plus"></i></button>
        </div>

 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php /**PATH C:\Users\USER\Downloads\Compressed\Piscine de Romain Avril\resources\views/frontend/events/invite.blade.php ENDPATH**/ ?>