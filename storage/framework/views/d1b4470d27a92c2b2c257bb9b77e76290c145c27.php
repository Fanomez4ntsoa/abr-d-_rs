<div class="profile-cover  np_profile_cover bg-white">
    <div class="profile-header" style="background-image: url('<?php echo e(get_page_cover_photo($page->coverphoto,"coverphoto")); ?>')">
       <div class="cover-btn-group">
            <?php if(auth()->guard()->check()): ?>
                <?php if($page->user_id==auth()->user()->id): ?>
                    <button  onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.pages.edit-modal', 'page_id' => $page->id])); ?>', '<?php echo e(get_phrase('Edit Page')); ?>');" class="edit-cover btn" data-bs-toggle="modal"
                        data-bs-target="#edit-profile"><i class="fa fa-pen"></i><?php echo e(get_phrase('Edit Profile')); ?></button>
                <?php endif; ?>
                <?php if($page->user_id==auth()->user()->id): ?>
                    <button onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.pages.edit-cover-photo','page_id'=>$page->id])); ?>', '<?php echo e(get_phrase('Update your cover photo')); ?>');" class="edit-cover btn n_edit"><i class="fa fa-camera"></i><?php echo e(get_phrase('Edit Cover Photo')); ?></button>
                <?php endif; ?>
            <?php endif; ?>
       </div>
    </div>
        <div class="n_profile_tab np_page_tab">
            <div class="n_main_tab">
                <div class="profile-avatar d-flex align-items-center">
                    <div class="avatar avatar-xl"><img src="<?php echo e(get_page_logo($page->logo, 'logo')); ?>" class="rounded-circle" alt=""></div>
                    <div class="avatar-details">
                        <h3 class="mb-1 n_font"><?php echo e($page->title); ?></h3>
                        <span class="mute d-block text-white"><?php echo e($page->getCategory->name); ?></span>
                    </div>
                </div>
                <div class="n_tab_right d-flex">
                    <div class="inline-btn">
                        <?php
                            if(Auth::check() ? $likecount = \App\Models\Page_like::where('page_id',$page->id)->where('user_id',auth()->user()->id)->count() : $likecount = 0);
                        ?>
                        
                        <?php if($likecount>0): ?>
            
                            <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.dislike',$page->id); ?>')"  class="btn common_btn_3" ><img class="mb-1 me-1" src="<?php echo e(asset('assets/frontend/images/like-i.png')); ?>" alt=""><span class="d-sm-inline-block  d-xl-inline-block"><?php echo e(get_phrase('Liked')); ?></a>
                            
                        <?php else: ?>
                            <?php if(Auth::check()): ?> 
                                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.like',$page->id); ?>')" class="btn common_btn">
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" class="btn common_btn">
                            <?php endif; ?>
                            <i class="me-1 fa-regular fa-thumbs-up"></i><span class="d-sm-inline-block  d-xl-inline-block"><?php echo e(get_phrase('Like')); ?></a>
                        <?php endif; ?>
                        <a class="btn common_btn" href="<?php echo e(route('pages')); ?>"><img src="<?php echo e(asset('assets/frontend/images/page.svg')); ?>" class="w-20 height-20-css" alt=""> <span class="d-sm-inline-block  d-xl-inline-block"><?php echo e(get_phrase('Pages')); ?></a>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('frontend.pages.inner-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
</div><?php /**PATH C:\Users\USER\Documents\GitHub\abr-d-_rs\resources\views/frontend/pages/timeline-header.blade.php ENDPATH**/ ?>