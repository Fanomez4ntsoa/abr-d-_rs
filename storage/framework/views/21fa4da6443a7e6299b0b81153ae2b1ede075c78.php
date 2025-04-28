

<div class="album_details_show">
    <a href="<?php echo e(url()->previous()); ?>" class="x_mark"><i class="fa-solid fa-xmark"></i></a>
    <div class="row">
        <div class="col-lg-7">
            <div class="post-image-wrap position-sticky top-30px">
                <div class="piv-gallerys">
                    
                    <?php 
                     $post_image_id = DB::table('album_images')->where('id', $post_album->album_image_id)->first();
                     $post_album_id = DB::table('albums')->where('id', $post_image_id->album_id)->first();
                     $count_album_id = DB::table('album_images')->where('album_id', $post_image_id->album_id)->get();
                     $album_ids = DB::table('album_images')
                        ->where('album_id', $post_image_id->album_id)
                        ->get()
                        ->toArray();
                    $album_ids_array = array_column($album_ids, 'id');
                    $active_index = array_search($post_image_id->id, $album_ids_array);
                    if($active_index <= count($album_ids_array)){
                        $keys = array_keys($album_ids_array);
                        $last_index = end($keys);

                        if ($active_index == $last_index) {
                            $next_index = $last_index;
                        } else {
                            $next_index = $active_index + 1;
                        }

                        $next_id = $album_ids_array[$next_index];

                    }
                    if($active_index <= count($album_ids_array)){
                        if($active_index == 0){
                            $previous_index = 0;
                        }else{
                            $previous_index = $active_index - 1;
                        }
                        $previous_id = $album_ids_array[$previous_index];
                    }
                    $previous_post_id = DB::table('posts')->where('album_image_id', $previous_id)->first()->post_id;
                    $next_post_id = DB::table('posts')->where('album_image_id', $next_id)->first()->post_id;
                  
                    ?>
                   
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($previous_index != $active_index): ?>
                         <a href="<?php echo e(route('album.details.page_show', ['id' => $previous_post_id])); ?>" class="left common_arrow"><i class="fas fa-chevron-left"></i></a>
                        <?php endif; ?>
                        <?php if($next_index != $active_index): ?>
                        <a href="<?php echo e(route('album.details.page_show', ['id' => $next_post_id])); ?>" class="right common_arrow"><i class="fas fa-chevron-right"></i></a>
                        <?php endif; ?>

                         <?php
                         $media_files = DB::table('media_files')->where('post_id', $post->post_id)->get();
                         ?>         
                        <?php $__currentLoopData = $media_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="piv-item video-player">
                                <img class="ms-auto me-auto img-fluid rounded" src="<?php echo e(get_post_image($media_file->file_name)); ?>" alt="">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="single-entry" id="postPreviewSection">
                <?php echo $__env->make('frontend.main_content.posts',['type'=>'user_post' , 'post_albums' =>'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\Users\USER\Documents\GitHub\abr-d-_rs\resources\views/frontend/album_details/album_details.blade.php ENDPATH**/ ?>