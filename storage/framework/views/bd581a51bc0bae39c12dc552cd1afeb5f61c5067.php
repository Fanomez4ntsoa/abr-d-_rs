<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-6 col-sm-6 col-md-4 col-lg-6 col-xl-4 mb-3 <?php if(str_contains(url()->current(), '/products')): ?> single-item-countable <?php endif; ?>">
        <div class="card product m_product">
            <a href="<?php echo e(route('single.product',$product->id)); ?>" class="thumbnail-196-196" style="background-image: url('<?php echo e(get_product_image($product->image,"thumbnail")); ?>');"></a>
            <div class="p-8">
                <h3 class="h6"><a href="<?php echo e(route('single.product',$product->id)); ?>"><?php echo e(ellipsis($product->title, 18)); ?></a></h3>
                <span class="location"><?php echo e($product->location); ?></span>
                <a href="<?php echo e(route('single.product',$product->id)); ?>" class="btn common_btn d-block"><?php echo e($product->getCurrency->symbol); ?><?php echo e($product->price); ?></a>
            </div>
        </div>
    </div>
    <?php if(isset($search)&&!empty($search)): ?>
            <?php if($key==2): ?>
                <?php break; ?>
            <?php endif; ?>
        <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\Users\USER\Documents\GitHub\abr-d-_rs\resources\views/frontend/marketplace/product-single.blade.php ENDPATH**/ ?>