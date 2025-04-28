<link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/nice-select.css')); ?>">
<form class="ajaxForm market_form" action="<?php echo e(route('product.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Title')); ?></label>
        <input type="text" name="title" class="border-0 bg-secondary" placeholder="Your Product Title">
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Price')); ?></label>
        <input type="number" name="price" class="border-0 bg-secondary" placeholder="Your Price">
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Currency')); ?></label>
        <select name="currency" id="currency" required class="form-select border-0 bg-secondary">
            <option value=""><?php echo e(get_phrase('Select Currency')); ?></option>
            <?php $__currentLoopData = \App\Models\Currency::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($currency->id); ?>"><?php echo e($currency->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Location')); ?></label>
        <input type="text" name="location" class="border-0 bg-secondary" placeholder="Your Location">
    </div>
    
     <div class="form-group row">
        <div class="col-md-12">
            <label for="Construction"><?php echo e(get_phrase('Construction')); ?></label>
            <select name="Construction" required class="form-select border-0 bg-secondary">
                <option value="" disabled selected><?php echo e(get_phrase('Select Construction')); ?></option>
                <option value="Entretien" ><?php echo e(get_phrase('Entretien')); ?></option>
                <option value="SAV" ><?php echo e(get_phrase('SAV')); ?></option>
            </select>
        </div>
     </div>

     <div class="form-group row">
        <div class="col-md-12">
            <label for="status"><?php echo e(get_phrase('Status')); ?></label>
            <select name="status" required class="form-select border-0 bg-secondary">
                <option value="" disabled selected><?php echo e(get_phrase('Select Status')); ?></option>
                <option value="1" ><?php echo e(get_phrase('In Stock')); ?></option>
                <option value="0" ><?php echo e(get_phrase('Out Of Stock')); ?></option>
            </select>
        </div>
     </div>

     

     
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Description')); ?></label>
        <textarea type="text" name="description" class="border-0 bg-secondary content" id="description" rows="10" placeholder="Your Description"></textarea>
    </div>
    <div id="frames"></div>
    <div class="form-group">
        <label for="#"><?php echo e(get_phrase('Product Image')); ?></label>
        <input type="file" multiple id="image" class="border-0 bg-secondary" name="multiple_files[]">
    </div>
   
    <input type="submit" class="btn common_btn"  value="Submit">
</form>


<?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('assets/frontend/js/jquery.nice-select.min.js')); ?>"></script>
<script>
    $('document').ready(function(){
        $(".select").niceSelect();
    });
</script><?php /**PATH D:\asaRomain\Piscine de Romain Avril\resources\views/frontend/marketplace/create_product.blade.php ENDPATH**/ ?>