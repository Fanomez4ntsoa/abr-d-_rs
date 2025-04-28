<form class="ajaxForm" action="<?php echo e(route('profile.my_info', ['action_type' => 'update'])); ?>" method="post">
  <?php echo csrf_field(); ?>
  <div class="mb-3">
    <label for="input0" class="form-label"><?php echo e(get_phrase('Job')); ?></label>
    <input name="job" value="<?php echo e($user_info->job); ?>" type="text" class="form-control" id="input0">
  </div>
  <div class="mb-3">
    <label for="input1" class="form-label"><?php echo e(get_phrase('Studied')); ?></label>
    <input name="studied_at" value="<?php echo e($user_info->studied_at); ?>" type="text" class="form-control" id="input1">
  </div>
  <div class="mb-3">
    <label for="input2" class="form-label"><?php echo e(get_phrase('Address')); ?></label>
    <input name="address" value="<?php echo e($user_info->address); ?>" type="text" class="form-control" id="input2">
  </div>
  <div class="mb-3">
    <label class="form-label"><?php echo e(get_phrase('Gender')); ?></label><br>
    <input name="gender" value="male" type="radio" class="" <?php if($user_info->gender == 'male')echo 'checked'; ?> id="genderMale">
    <label class="form-label" for="genderMale"><?php echo e(get_phrase('Male')); ?></label>
    <br>
    <input name="gender" value="female" type="radio" class="" <?php if($user_info->gender == 'female')echo 'checked'; ?> id="genderFemale">
    <label class="form-label" for="genderFemale"><?php echo e(get_phrase('Female')); ?></label>
  </div>
  <div class="mb-3">
    
    <button type="submit" class="btn common_btn w-100"><?php echo e(get_phrase('Save')); ?></button>
    
  </div>
</form>

<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\asaRomain\Piscine de Romain Avril\resources\views/frontend/profile/my_info_edit.blade.php ENDPATH**/ ?>