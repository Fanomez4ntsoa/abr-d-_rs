

    <?php $__currentLoopData = $all_photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
        <div class="single-item-countable single-photo cursor-pointer n_video"  >
            <img  src="<?php echo e(get_post_image($photo->file_name)); ?>" onclick="$(location).prop('href', '<?php echo e(route('single.post', $photo->post_id)); ?>')" alt="">
            
            <a class=" del_v_icon" href="javascript:void(0)" onclick="confirmAction('<?php echo route('delete.mediafile', $photo->id); ?>', true)"><i class="fas fa-trash"></i></a>
        </div>
    
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




<?php /**PATH D:\asaRomain\Piscine de Romain Avril\resources\views/frontend/profile/photo_single.blade.php ENDPATH**/ ?>