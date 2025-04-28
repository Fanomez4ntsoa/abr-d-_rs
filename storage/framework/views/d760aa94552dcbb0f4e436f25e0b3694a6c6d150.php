    
   
    <aside class="sidebar page_side">
        <div class="widget intro-widget">
            <h4><?php echo e(get_phrase('Intro')); ?></h4>
    
            <div class="my-about mb-3">
                <?php echo ellipsis($page->description, 500); ?>
            </div>
        </div>
        
        <div class="widget">
            <h4 class="widget-title mb-4"><?php echo e(get_phrase('Info')); ?></h4>
            <ul>
                <?php
                    $likecount = \App\Models\Page_like::where('page_id',$page->id)->count();
                ?>
                <li><i class="fa fa-thumbs-up"></i><span><?php echo e($likecount); ?> People <?php if($likecount>1): ?> s <?php endif; ?>  <?php echo e(get_phrase('like this')); ?></span></li>
                <?php
                    $postcount = \App\Models\Posts::where('publisher','page')->where('publisher_id',$page->id)->count();
                ?>
                <li><i class="fa-solid fa-file-lines"></i><span><?php echo e($postcount); ?> <?php echo e(get_phrase('Posts')); ?></span></li>
    
                <li><i class="fa-solid fa-briefcase"></i><span><?php echo e($page->job); ?></span></li>
                <li><i class="fa-solid fa-location"></i><span><?php echo e($page->location); ?></span>
                </li>
                <li><i class="fa-solid fa-tags"></i><span><?php echo e($page->lifestyle); ?></span></li>
            </ul>
            <?php if(Auth::check() && $page->user_id==auth()->user()->id): ?>
                <button class="btn common_btn w-100 mt-8" onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.pages.edit-page-info','page_id'=>$page->id])); ?>', '<?php echo e(get_phrase('Update Page Info')); ?>');"><?php echo e(get_phrase('Edit Info')); ?></button>
            <?php endif; ?>
        </div>
        <div class="widget">
            <div class="d-flex pagetab-head align-items-center">
                 <span><i class="fa-solid fa-flag"></i></span>
                 <h3 class="widget-title ms-1"><?php echo e(get_phrase('Page you may like')); ?></h3>
            </div>
            
            <?php $__currentLoopData = $suggestedpages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suggestedpage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $likecount = \App\Models\Page_like::where('page_id',$suggestedpage->page_id)->where('user_id',auth()->user()->id)->count();
                    
                ?>
                <?php if($likecount==0): ?>
                <div class="card n_like_image border-0 mt-3">
                    <img class="cov_img" src="<?php echo e(get_page_cover_photo($suggestedpage->coverphoto,'coverphoto')); ?>" alt="">
                    <div class="d-flex align-items-center my-2">
                        <a href="<?php echo e(route('single.page',$suggestedpage->id)); ?>"><img class="circle me-2" src="<?php echo e(get_page_logo($suggestedpage->logo,'logo')); ?>" width="60" alt=""></a>
                        <div class="ava-info">
                            <h3 class="h6 mb-0"><a href="<?php echo e(route('single.page',$suggestedpage->id)); ?>"><?php echo e($suggestedpage->title); ?></a> </h3>
                            <?php
                                $likecount = \App\Models\Page_like::where('page_id',$suggestedpage->id)->count();
                            ?>
                            <span class="mute small"><?php echo e($likecount); ?> <?php echo e(get_phrase('likes')); ?></span>
                        </div>
                    </div>
                    <?php if($likecount>0): ?>
                        <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.dislike',$page->id); ?>')" class="btn btn-primary"><img class="me-1" src="<?php echo e(asset('assets/frontend/images/like-i.png')); ?>" alt=""><?php echo e(get_phrase('Liked')); ?></a>
                    <?php else: ?>
                        <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.like',$page->id); ?>')" class="btn btn-primary"><img class="me-1" src="<?php echo e(asset('assets/frontend/images/like-i.png')); ?>" alt=""><?php echo e(get_phrase('Like')); ?></a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="widget">
            <div class="n_pro_con d-flex align-items-start">
                <h4 class="widget-title"><?php echo e(get_phrase('Photo/Video')); ?></h4>
                <a href="<?php echo e(route('single.page.photos',$page->id)); ?>"><?php echo e(get_phrase('See All')); ?></a>
            </div>
           
            <div class="row row-cols-3 row-cols-md-5 row-cols-lg-2 row-cols-xl-3 g-1 mt-8">
                <?php $__currentLoopData = $all_photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($media_file->file_type == 'video'): ?>
                        <div class="single-item-countable col">
                            <a href="<?php echo e(route('single.post',$media_file->post_id)); ?>">
                                <video muted controlsList="nodownload" class="img-thumbnail w-100 user_info_custom_height">
                                    <source src="<?php echo e(get_post_video($media_file->file_name)); ?>" type="">
                                </video>
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="single-item-countable col">
                            <a href="<?php echo e(route('single.post',$media_file->post_id)); ?>">
                                <img class="img-thumbnail w-100 user_info_custom_height" src="<?php echo e(get_post_image($media_file->file_name, 'optimized')); ?>">
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
        </div><!--  Widget End -->
    </aside><?php /**PATH C:\Users\USER\Documents\GitHub\abr-d-_rs\resources\views/frontend/pages/bio.blade.php ENDPATH**/ ?>