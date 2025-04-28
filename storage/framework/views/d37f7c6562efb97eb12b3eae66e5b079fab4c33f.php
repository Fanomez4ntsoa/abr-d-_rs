<form class="ajaxForm" action="<?php echo e(route('profile.album', ['action_type' => 'store'])); ?>" method="post" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
  <input type="hidden" value="public" name="privacy" id="album_privacy">
  <?php if(isset($page_id)&&!empty($page_id)): ?>
    <input type="hidden" name="page_id" value="<?php echo e($page_id); ?>" id="page_id">
  <?php endif; ?>

  <?php if(isset($group_id)&&!empty($group_id)): ?>
  <input type="hidden" name="group_id" value="<?php echo e($group_id); ?>" id="group_id">
  <?php endif; ?>

<div class="mb-3 w-100 d-flex">
  <?php if(isset($page_id)&&!empty($page_id)): ?>
  <?php
    $page = \App\Models\Page::find($page_id);
  ?>
    <a href="<?php echo e(route('single.page',$page_id)); ?>" class="author-thumb d-flex align-items-center">
      <img src="<?php echo e(get_page_logo($page->logo, 'logo')); ?>" class="rounded-circle user_image_show_on_modal" alt="">
      <h6 class="ms-2"><?php echo e($page->title); ?></h6>
    </a>
  <?php elseif(isset($group_id)&&!empty($group_id)): ?>
    <?php
      $group = \App\Models\Group::find($group_id);
    ?>
      <a href="<?php echo e(route('single.group',$group_id)); ?>" class="author-thumb d-flex align-items-center">
        <img src="<?php echo e(get_group_logo($group->logo, 'logo')); ?>" class="rounded-circle user_image_show_on_modal" alt="">
        <h6 class="ms-2"><?php echo e($group->title); ?></h6>
      </a>
  <?php else: ?>
    <a href="<?php echo e(route('profile')); ?>" class="author-thumb d-flex align-items-center">
      <img src="<?php echo e(get_user_image('', 'optimized')); ?>" class="rounded-circle user_image_show_on_modal" alt="">
      <h6 class="ms-2"><?php echo e(auth()->user()->name); ?></h6>
    </a>
  <?php endif; ?>
  <div class="dropdown ms-auto">
      <button class="btn btn-gray dropdown-toggle" type="button" id="albumPrivacyDroupdownBtn" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-earth-americas"></i> <?php echo e(get_phrase('Public')); ?>

      </button>
      <ul class="dropdown-menu" aria-labelledby="postPrivacyDroupdownBtn">
          <li><a class="dropdown-item" href="javascript:void(0)" onclick="album_privacy('private', this)"><i class="fa-solid fa-user"></i> <?php echo e(get_phrase('Only Me')); ?></a>
          </li>
          <li><a class="dropdown-item" href="javascript:void(0)" onclick="album_privacy('friends', this)"><i class="fa-solid fa-users"></i> <?php echo e(get_phrase('Friends')); ?></a>
          </li>
          <li><a class="dropdown-item" href="javascript:void(0)" onclick="album_privacy('public', this)"><i class="fa-solid fa-user-group"></i> <?php echo e(get_phrase('Public')); ?></a></li>
      </ul>
  </div>
</div>

  <div class="mb-3">
    <label for="input0" class="form-label"><?php echo e(get_phrase('Album title')); ?></label>
    <input name="title" type="text" class="form-control" id="input0">
  </div>
  <div class="mb-3">
    <label for="input1" class="form-label"><?php echo e(get_phrase('Album subtitle')); ?></label>
    <input name="sub_title" type="text" class="form-control" id="input1">
  </div>
  <div class="mb-3">
    <label for="input2" class="form-label"><?php echo e(get_phrase('Thumbnail')); ?></label>
    <input name="thumbnail" type="file" class="form-control" id="input2">
  </div>
  
  <div class="mb-3">
    <button type="submit" class="btn common_btn w-100"><?php echo e(get_phrase('Create')); ?></button>
  </div>
</form>

<script type="text/javascript">
  "use strict";
  function album_privacy(privacy, e){
    $('#album_privacy').val(privacy);
    $('#albumPrivacyDroupdownBtn').html($(e).html());
  }
</script>

<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Documents\GitHub\abr-d-_rs\resources\views/frontend/profile/album_create_form.blade.php ENDPATH**/ ?>