

<div class="profile-wrap">
    <?php echo $__env->make('frontend.pages.timeline-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="profile-content mt-3">
        <div class="row gx-3">
            <div class="col-lg-12 col-sm-12">
                
                
                <!-- Profile Nav End -->
                <div class="friends-tab pg_tab_main ct-tab radius-8 bg-white p-3">
                    
                    
                    <div class="photo-list">
                        <h4 class="h6 mb-3"><?php echo e(get_phrase('Your videos')); ?></h4>
                        <div class="flex-wrap" id="allVideos">
                            <?php echo $__env->make('frontend.profile.video_single', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>

                </div> <!-- Friends Tab End -->
                
            </div> <!-- COL END -->
            
        </div>
    </div> <!-- Profile content End -->
</div>


<?php /**PATH C:\Users\USER\Documents\GitHub\abr-d-_rs\resources\views/frontend/pages/video.blade.php ENDPATH**/ ?>