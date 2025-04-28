<!-- Profile Nav End -->
<div class="friends-tab v_video_tabs ct-tab radius-8 bg-white p-3">
    <h3><?php echo e(get_phrase('Video')); ?></h3>
    <div class="photo-list video_list mt-3">
        <h4 class="h6 mb-3"><?php echo e(get_phrase('Your videos')); ?></h4>
        <div class="flex-wrap" id="allVideos">
            <?php echo $__env->make('frontend.profile.video_single', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

</div> <!-- Friends Tab End --><?php /**PATH D:\asaRomain\AbracadamallReseau\resources\views/frontend/profile/videos.blade.php ENDPATH**/ ?>