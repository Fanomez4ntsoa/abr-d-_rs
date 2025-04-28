<?php
    $friends = \App\Models\Friendships::where(function ($query) {
            $query->where('accepter', auth()->user()->id)
            ->orWhere('requester', auth()->user()->id);
        })
        ->where('is_accepted', 1)
        ->orderBy('friendships.importance', 'desc')->get();
?>

<?php $__currentLoopData = $friends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $friend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php if($friend->requester == auth()->user()->id): ?>
        <?php $friends_user_data = DB::table('users')->where('id', $friend->accepter)->first(); ?>
    <?php else: ?>
        <?php $friends_user_data = DB::table('users')->where('id', $friend->requester)->first(); ?>
    <?php endif; ?>
<div class="d-flex justify-content-between align-items-center e_friend">
    <div class="user-information d-flex">
        <img src="<?php echo e(get_user_image($friends_user_data->photo, 'optimized')); ?>" class="rounded-circle user_image_show_on_modal" alt="">
        <h6 class="align-self-center mx-3"><?php echo e($friends_user_data->name); ?></h6>
    </div>
    <form class="ajaxForm" id="chatMessageFieldForm" action="<?php echo e(route('chat.save')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="reciver_id" value="<?php echo e($friends_user_data->id); ?>" id="">
        <input type="hidden" name="thumbsup" value="0" id="">
        <?php if(isset($post_id)&&!empty($post_id)): ?>
            <input type="hidden" name="message" value="<?php echo e(route('single.post',$post_id)); ?>">
            <input type="hidden" name="shared_post_id" value="<?php echo e($post_id); ?>">
        <?php endif; ?>
        <?php if(isset($product_id)&&!empty($product_id)): ?>
                    <input type="hidden" name="productUrl" value="<?php echo e(route('single.product',$product_id)); ?>">
                    <input type="hidden" name="shared_product_id" value="<?php echo e($product_id); ?>">
                <?php endif; ?>
        <div class="message-send-area">
            <button type="submit" class="btn common_btn send"> <?php echo e(get_phrase('Send')); ?> </button>
        </div>
    </form>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\Users\USER\Documents\GitHub\abr-d-_rs\resources\views/frontend/main_content/my_friend_list.blade.php ENDPATH**/ ?>