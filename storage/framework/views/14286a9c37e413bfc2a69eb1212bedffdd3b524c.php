<?php if($identifire == 'albums'): ?>
    <div class="profile-cover group-cover ng_profile  bg-white mb-3">
        <?php echo $__env->make('frontend.groups.cover-photo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend.groups.iner-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php elseif($identifire == 'page'): ?>
    <div class="profile-cover group-cover ng_profile  bg-white mb-3">
        <?php echo $__env->make('frontend.pages.timeline-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php endif; ?>

<?php
    $album_data = \App\Models\Albums::where('id', $album_id)->first();
    $images = \App\Models\Album_image::where('album_id', $album_id)->get();
?>

<!-- Profile Nav End -->
<div class="friends-tab ct-tab bg-white radius-8 p-3">
    <div class="row">
        <div class="al_head d-flex justify-content-between">
            <div class="search_left"> 
                <h3><?php echo e($album_data->title); ?></h3>
                <p><?php echo e(count($images)); ?> <?php echo e(get_phrase('Items')); ?></p>
            </div>
            <a href="<?php echo e(url()->previous()); ?>" class="btn back_btns common_btn">
                <i class="fa-solid fa-left-long me-2"></i><?php echo e(get_phrase('Back')); ?>

            </a>
        </div>
        
        
         <?php if(isset($images)): ?> 
            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $image_name = \App\Models\Media_files::where('album_image_id', $image->id)->first();
                    if ($image_name !== null) {
                        $image_post =  \App\Models\Posts::where('post_id', $image_name->post_id)->first();
                    }
                ?>

                <?php if(isset($image_post)): ?>
                    <div class="col-lg-3 col-md-4 col-6 mb-2">
                        <div class="card sugg-card p-0 box_shadow border-none al_details  suggest_p radius-8">
                            <div>
                                
                            
                                <a href=" <?php echo e(route('album.details.page_show', ['id' => $image_post->post_id])); ?>"><img class="thumbnail-110-106 w-100"  src="<?php echo e(asset('storage/album/images/'.$image->image)); ?>" alt=""></a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>


    </div>
    <!-- Tab Content End -->
</div>
<!-- Friends Tab End -->


<?php /**PATH C:\Users\USER\Documents\GitHub\abr-d-_rs\resources\views/frontend/profile/single_album_list_details.blade.php ENDPATH**/ ?>