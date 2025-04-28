<?php $__currentLoopData = $all_videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="single-item-countable single-photo n_video">
            <video onclick="$(location).prop('href', '<?php echo e(route('single.post', $video->post_id)); ?>')" class="w-100 b-4 cursor-pointer" muted src="<?php echo e(get_post_video($video->file_name)); ?>">

        </video>
        <a href="<?php echo e(route('single.post', $video->post_id)); ?>" class="play_v_icon"><i class="fa-solid fa-play"></i></a>
        <a href="javascript:void(0)" onclick="confirmAction('<?php echo route('delete.mediafile', $video->id); ?>', true)" class="del_v_icon"><i class="fa-solid fa-trash"></i></a>
        
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\asaRomain\AbracadamallReseau\resources\views/frontend/profile/video_single.blade.php ENDPATH**/ ?>