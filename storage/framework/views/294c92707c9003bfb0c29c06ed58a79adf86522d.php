<div class="profile-wrap">
    <?php echo $__env->make('frontend.pages.timeline-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="profile-content mt-3">
        <div class="row gx-3 np_timeline">
            <div class="col-lg-12 col-sm-12">
                
                <?php if(Auth::check() && $page->user_id==auth()->user()->id): ?>
                    <?php echo $__env->make('frontend.main_content.create_post',['page_id'=>$page->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php
                    $comments = DB::table('comments')->join('users', 'comments.user_id', '=', 'users.id')->where('comments.is_type', 'page')->where('comments.id_of_type', $page->id)->where('comments.parent_id', 0)->select('comments.*', 'users.name', 'users.photo')->orderBy('comment_id', 'DESC')->take(1)->get();                                                                
                    $total_comments = DB::table('comments')->where('comments.is_type', 'blog')->where('comments.id_of_type', $page->id)->where('comments.parent_id', 0)->get()->count();
                ?>

                <?php echo $__env->make('frontend.main_content.comments',['comments'=>$comments,'post_id'=>$page->id,'type'=>"page"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                <?php echo $__env->make('frontend.main_content.posts',['type'=>"page"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            
        </div>
    </div> 
</div>

<?php echo $__env->make('frontend.main_content.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    
        <?php /**PATH C:\Users\USER\Documents\GitHub\abr-d-_rs\resources\views/frontend/pages/page-timeline.blade.php ENDPATH**/ ?>