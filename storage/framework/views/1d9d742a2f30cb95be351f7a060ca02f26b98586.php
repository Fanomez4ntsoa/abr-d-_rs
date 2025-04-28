

<style>
    .form-select {
	padding: 10px 20px;
	font-size: 14px;
	color: #444444;
	background-color: #f3f3f3 !important;
	border-color:  #f3f3f3 !important;
	border-radius: 5px;
}
.form-select:focus{
    box-shadow: none;
}
</style>
<div class="page-wrap">
    <div class="d-flex pagetab-head  align-items-center justify-content-between mb-3 p-20 radius-8 bg-white">
        <h3 class="h5 mb-0"><?php echo e(get_phrase('Create New Blog')); ?></h3>
       <a href="<?php echo e(url()->previous()); ?>" class="btn common_btn"><i class="fa-solid fa-left-long"></i><?php echo e(get_phrase('Back')); ?></a>
    </div>
    <div class="card border-none n_blog mt-3 px-3 py-4">
        <div class="create-article">
            <?php if($errors->any()): ?>
                <div class="text-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form action="<?php echo e(route('blog.store')); ?>" class="form_sel" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="#"><?php echo e(get_phrase('Title')); ?></label>
                    <input type="text" name="title" placeholder="Enter your title">
                </div>
                <div class="form-group">
                    <label for="#"><?php echo e(get_phrase('Category')); ?></label>
                    <select name="category" id="category" required class="form-select  bg-secondary">
                        <option value="" selected disabled><?php echo e(get_phrase('Select Category')); ?></option>
                        <?php $__currentLoopData = $blog_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="#" class="mt-12"><?php echo e(get_phrase('Tags')); ?></label>
                    <input type="text" name="tag" class="form-control bg-secondary" placeholder="Enter your tags">
                </div>
                <div class="form-group">
                    <label for="#"><?php echo e(get_phrase('Description')); ?></label>
                    <textarea name="description" id="description" class="content"  placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <label for="#"><?php echo e(get_phrase('Image')); ?></label>
                    <input type="file" name="image" id="image">
                </div>
                
                <div class="inline-btn mt-3">
                    <button type="submit" class="btn common_btn w-100"><?php echo e(get_phrase('Create Post')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php /**PATH C:\Users\USER\Downloads\Compressed\Piscine de Romain Avril\resources\views/frontend/blogs/create_blog.blade.php ENDPATH**/ ?>