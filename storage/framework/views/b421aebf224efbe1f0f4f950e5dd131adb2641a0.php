<?php
    $groups = \App\Models\Group_member::where('user_id',auth()->user()->id)->where('is_accepted','1')->get();
?>
<?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<form class="ajaxForm" action="<?php echo e(route('share.group.post')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="d-flex justify-content-between align-items-center">
        <div class="user-information d-flex">
            <img src="<?php echo e(get_group_logo($group->getGroup->logo,'logo')); ?>" class="rounded-circle user_image_show_on_modal" alt="">
            <h6 class="align-self-center mx-3"><?php echo e($group->getGroup->title); ?></h6>
        </div>
        <input type="hidden" name="group_id" id="group_id" value="<?php echo e($group->getGroup->id); ?>">
        <?php if(isset($post_id)&&!empty($post_id)): ?>
            <input type="hidden" name="message" value="<?php echo e(route('single.post',$post_id)); ?>">
            <input type="hidden" name="shared_post_id" value="<?php echo e($post_id); ?>">
        <?php endif; ?>
        <?php if(isset($product_id)&&!empty($product_id)): ?>
            <input type="hidden" name="productUrl" value="<?php echo e(route('single.product',$product_id)); ?>">
            <input type="hidden" name="shared_product_id" value="<?php echo e($product_id); ?>">
        <?php endif; ?>
        <div class="message-send-area">
            <button type="submit" class="btn common_btn send"> <?php echo e(get_phrase('Share On Group')); ?> </button>
        </div>
    </div>
</form>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\Users\USER\Documents\GitHub\abr-d-_rs\resources\views/frontend/main_content/my_group_list.blade.php ENDPATH**/ ?>