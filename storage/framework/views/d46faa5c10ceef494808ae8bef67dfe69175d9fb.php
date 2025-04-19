<div class="main_content">
  <!-- Main section header and breadcrumb -->
  <div class="mainSection-title">
      <div class="row">
          <div class="col-12">
              <div class="d-flex justify-content-between align-items-center flex-wrap gr-15">
                  <div class="d-flex flex-column">
                      <h4><?php echo e(get_phrase('Edit Video')); ?></h4>
                  </div>
                  <div class="export-btn-area">
                      <a href="<?php echo e(route('admin.video')); ?>" class="export_btn"><i class="fas fa-arrow-left me-2"></i> <?php echo e(get_phrase('Back to Videos')); ?></a>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Start Admin area -->
  <div class="row">
      <div class="col-md-7">
          <div class="eSection-wrap-2">
              <div class="eForm-layouts">
                  <?php if($errors->any()): ?>
                      <div class="alert alert-danger">
                          <ul>
                              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <li><?php echo e($error); ?></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                      </div>
                  <?php endif; ?>
                  <form method="POST" action="<?php echo e(route('admin.video.edit', $video_details->id)); ?>" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('PUT'); ?>
                      <div class="mb-3">
                          <label for="title" class="form-label eForm-label"><?php echo e(get_phrase('Video title')); ?></label>
                          <input type="text" class="form-control eForm-control" value="<?php echo e(old('title', $video_details->title)); ?>" id="title" name="title" placeholder="<?php echo e(get_phrase('Video title')); ?>" required>
                      </div>

                      <div class="mb-3">
                          <label for="video_category_id" class="form-label eForm-label"><?php echo e(get_phrase('Select a category')); ?></label>
                          <select name="video_category_id" class="form-select eForm-control select1" required>
                              <option value=""><?php echo e(get_phrase('Select a category')); ?></option>
                              <?php $__currentLoopData = \App\Models\VideoCategory::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($category->id); ?>" <?php echo e(old('video_category_id', $video_details->video_category_id) == $category->id ? 'selected' : ''); ?>>
                                      <?php echo e($category->type); ?>

                                  </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="category"><?php echo e(get_phrase('Category')); ?></label>
                          <select name="category" id="category" class="form-select eForm-control select1 mb-3" required>
                              <option value="video" <?php echo e(old('category', $video_details->category) == 'video' ? 'selected' : ''); ?>><?php echo e(get_phrase('Video')); ?></option>
                              <option value="shorts" <?php echo e(old('category', $video_details->category) == 'shorts' ? 'selected' : ''); ?>><?php echo e(get_phrase('Shorts')); ?></option>
                          </select>
                      </div>

                      <div class="post-controls dropdown">
                          <label for="privacy"><?php echo e(get_phrase('Privacy')); ?></label>
                          <select name="privacy" id="privacy" class="form-select eForm-control select1 mb-3" required>
                              <option value="public" <?php echo e(old('privacy', $video_details->privacy) == 'public' ? 'selected' : ''); ?>><?php echo e(get_phrase('Public')); ?></option>
                              <option value="private" <?php echo e(old('privacy', $video_details->privacy) == 'private' ? 'selected' : ''); ?>><?php echo e(get_phrase('Private')); ?></option>
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="video"><?php echo e(get_phrase('Video/Shorts')); ?></label>
                          <input type="file" name="video" id="video" class="form-control bg-secondary border-0" accept="video/mp4,video/mov,video/wmv,video/mkv,video/webm,video/avi,video/m4v">
                          <?php if($video_details->file): ?>
                              <p class="mt-2 small"><?php echo e(get_phrase('Current Video')); ?>: <a href="<?php echo e(asset($video_details->file)); ?>" target="_blank"><?php echo e(get_phrase('View Video')); ?></a></p>
                          <?php endif; ?>
                      </div>

                      <div class="mb-3">
                          <label for="description" class="form-label eForm-label"><?php echo e(get_phrase('Video details')); ?></label>
                          <textarea id="description" name="description" class="content"><?php echo e(old('description', $video_details->description)); ?></textarea>
                      </div>

                      <div class="mb-3">
                          <label for="mobile_app_image" class="form-label eForm-label"><?php echo e(get_phrase('mobile_app_image')); ?></label>
                          <input id="mobile_app_image" class="form-control eForm-control-file" type="file" name="mobile_app_image" accept="image/*">
                          <?php if($video_details->mobile_app_image): ?>
                              <p class="mt-2 small"><?php echo e(get_phrase('Current Mobile App Image')); ?>: <a href="<?php echo e(asset($video_details->mobile_app_image)); ?>" target="_blank"><?php echo e(get_phrase('View Image')); ?></a></p>
                          <?php endif; ?>
                      </div>

                      <button type="submit" class="btn btn-primary"><?php echo e(get_phrase('Update Video')); ?></button>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <!-- Start Footer -->
  <?php echo $__env->make('backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- End Footer -->
</div><?php /**PATH C:\Users\USER\Documents\GitHub\abr-d-_rs\resources\views/backend/admin/video/edit.blade.php ENDPATH**/ ?>