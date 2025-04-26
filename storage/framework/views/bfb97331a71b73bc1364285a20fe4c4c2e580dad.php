<?php
    $comments = DB::table('comments')->join('users', 'comments.user_id', '=', 'users.id')->where('comments.is_type', 'blog')->where('comments.id_of_type', $blog->id)->where('comments.parent_id', 0)->select('comments.*', 'users.name', 'users.photo')->orderBy('comment_id', 'DESC')->take(1)->get();                                                                
    $total_comments = DB::table('comments')->where('comments.is_type', 'blog')->where('comments.id_of_type', $blog->id)->where('comments.parent_id', 0)->get()->count();
?>

<div class="single-wrap">
    <div class="sblog_feature bg-white radius-8">
        <div class="blog-feature " style="min-height: 0px; background-image: url('<?php echo e(get_blog_image($blog->thumbnail,'coverphoto')); ?>')">
            <div class="blog-head">
                <div class="d-flex align-items-center">
                    <img src="<?php echo e(get_user_image($blog->user_id,'optimized')); ?>" class="user-round user_image_show_on_modal" alt="">
                    <div class="ava-info ms-2">
                        <h6 class="mb-0"><a href="<?php echo e(route('user.profile.view',$blog->getUser->id)); ?>"><?php echo e($blog->getUser->name); ?></a></h6>
                        <small><?php echo e($blog->created_at->diffForHumans()); ?></small>
                    </div>
                </div>
               
            </div>
        </div><!--  Blog Cover End -->
        <div class="sm_bottom">
             <div>
                <a href="#"> <?php echo e($blog->created_at->format("d-M-Y")); ?> </a>
               <h1><?php echo e($blog->title); ?></h1>
             </div>
            <div class="bhead-meta">
                <span><?php echo e($total_comments); ?> <?php echo e(get_phrase('Comments')); ?></span>
                <span><?php echo e(count(json_decode($blog->view))); ?> <?php echo e(get_phrase('Views')); ?></span>
            </div>
        </div>
    </div>
    <div class="row mt-12 ">
        <div class="col-lg-12">
            <div class="card border-none p-3 radius-8 nblog_details blog-details">
                <?php echo script_checker($blog->description, false); ?>
                <div class="blog-footer">
                    <div class="post-share justify-content-between align-items-center border-bottom pb-3">
                        <div class="post-meta ">
                            <h4 class="h3"><?php echo e(get_phrase('tags:')); ?></h4>
                            <?php
                                $tags = json_decode($blog->tag, true);
                            ?>
                            
                            <?php if(is_array($tags)): ?>
                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="#"><span class="badge common_btn_3 mt-1">#<?php echo e($tag); ?></span></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="p-share d-flex align-items-center mt-20">
                            <h3 class="h6"><?php echo e(get_phrase('Share')); ?>: </h3>
                            <div class="social-share ms-2">
                                <ul>
                                    <?php $__currentLoopData = $socailshare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e($value); ?>" target="_blank"><i class="fa-brands fa-<?php echo e($key); ?>"></i></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Comment Start -->
                        <div class="user-comments  bg-white" id="user-comments-<?php echo e($blog->id); ?>">
                            <div class="comment-form nBlog_user d-flex p-3 bg-secondary">
                                <img src="<?php echo e(get_user_image(Auth()->user()->photo, 'optimized')); ?>" alt="" class="rounded-circle h-39 img-fluid " width="40px">
                                <form action="javascript:void(0)" class="w-100 ms-2" method="post">
                                    <input class="form-control py-3" onkeypress="postComment(this, 0, <?php echo e($blog->id); ?>, 0,'blog');" rows="1" placeholder="Écrire des commentaires">
                                </form>
                            </div>
                            <ul class="comment-wrap pt-3 pb-0 list-unstyled" id="comments<?php echo e($blog->id); ?>">
                                <?php echo $__env->make('frontend.main_content.comments',['comments'=>$comments,'post_id'=>$blog->id,'type'=>"blog"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </ul>
                            <?php if($comments->count() < $total_comments): ?> 
                                <a class="btn p-3 pt-0" onclick="loadMoreComments(this, <?php echo e($blog->id); ?>, 0, <?php echo e($total_comments); ?>,'blog')"><?php echo e(get_phrase('View Comment')); ?></a>
                            <?php endif; ?>
                        </div>
                    
                </div><!--  Blog Details Footer End -->
            </div>
        </div>
        
    </div>
</div><!-- Single Page Wrap End -->
<?php echo $__env->make('frontend.main_content.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php /**PATH C:\Users\DELL\Desktop\Voary\Piscine de Romain\AbracadamallReseau\AbracadamallReseau\resources\views/frontend/blogs/single_blog.blade.php ENDPATH**/ ?>