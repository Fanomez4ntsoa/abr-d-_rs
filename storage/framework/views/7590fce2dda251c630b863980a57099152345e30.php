<div class="product-details-wrap  p-3 radius-8 bg-white">
    <div class="product-header eProduct row">
        <div class="col-lg-12">
            <div id="carouselExampleIndicators" class="carousel np_carousel slide product-slider"
                data-bs-ride="false">
                
                 
                         
                    
                <div class="carousel-inner">
                    <?php $__currentLoopData = $product_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="cursor_pointer carousel-item <?php echo e($loop->index=='0'? "active":""); ?>"  onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.marketplace.load_image', 'image' => $image->file_name])); ?>', '');">
                            <img class="rounded w-100" src="<?php echo e(get_product_image($image->file_name,"coverphoto")); ?>" alt=""> 
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <button class="carousel-control-prev" type="button"
                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"><?php echo e(get_phrase('Previous')); ?></span>
                </button>
                <button class="carousel-control-next" type="button"
                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"><?php echo e(get_phrase('Next')); ?></span>
                </button>
            </div>
             
            <div class="row">
                <div class="col-lg-12">
                    <div class="eProduct_details">
                        <div class="product-info  np_info_pro">
                            <h1 class="product-title h4 fw-7"><?php echo e($product->title); ?></h1>
                            <span class="pt-price  sub-title"><?php echo e($product->getCurrency->symbol); ?> <?php echo e($product->price); ?></span>
                            <p class="list_text"><?php echo e(get_phrase('Listed')); ?> <?php echo e($product->created_at->timezone(Auth::user()->timezone)->format("d-m-Y")); ?>  . <strong><?php echo e($product->location); ?></strong></p>

                            <div class="pt-publisher <?php if(isset($_GET['shared'])): ?> hidden-on-shared-view <?php else: ?> d-flex <?php endif; ?> align-items-center justify-content-between">
                                <div class="pb-author d-flex align-items-center">
                                    <a href="<?php echo e(route('user.profile.view', $product['user_id'])); ?>"><img class="user_image_proifle_height" src="<?php echo e(get_user_image($product->getUser->photo, 'optimized')); ?>" alt=""></a>
                                    <div class="pb-info ms-2">
                                        <p class="mb-0"><?php echo e(get_phrase('Listed by')); ?></p>
                                        <a href="<?php echo e(route('user.profile.view', $product['user_id'])); ?>" class="h6"><?php echo e($product->getUser->name); ?></a>
                                    </div>
                                </div>
                                <div class="pb-share e_market d-flex justify-content-between">
                                    <?php if($product->user_id != auth()->user()->id): ?>
                                     
                                      <a href="<?php echo e(route('chat',['reciver'=>$product->user_id,'product'=>$product->id])); ?>" class="btn sold_btn common_btn"> <?php echo e(get_phrase('Message')); ?> </a>
                                    <?php else: ?>
                                    <a href="javascript:void(0)" class="btn sold_btn common_btn"> <?php echo e(get_phrase('Sold')); ?> </a>
                                    <?php endif; ?>
                                    <span>
                                        
                                        <?php
                                            $saved = \App\Models\SavedProduct::where('product_id',$product->id)->where('user_id',auth()->user()->id)->count();
                                        ?>
                                        <?php if($saved>0): ?>
                                        <a href="javascript:void(0)" class="common_btn_2" onclick="ajaxAction('<?php echo route('unsave.product.later',$product->id); ?>')"> <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.16693 18.1249C3.94178 18.1241 3.71968 18.0728 3.51693 17.9749C3.26839 17.8581 3.05813 17.6732 2.9106 17.4416C2.76307 17.21 2.68435 16.9412 2.68359 16.6666V2.49993C2.68468 2.30662 2.72397 2.11543 2.79921 1.93735C2.87445 1.75928 2.98415 1.59783 3.122 1.4623C3.25985 1.32678 3.42314 1.21984 3.60246 1.14764C3.78179 1.07544 3.97362 1.0394 4.16693 1.0416H15.8336C16.2197 1.04379 16.5894 1.19813 16.8624 1.47115C17.1354 1.74417 17.2897 2.11383 17.2919 2.49993V16.6666C17.2865 16.9305 17.2096 17.188 17.0693 17.4116C16.9291 17.6352 16.7307 17.8166 16.4955 17.9363C16.2603 18.0561 15.997 18.1097 15.7336 18.0916C15.4703 18.0734 15.2168 17.9842 15.0003 17.8333L10.1669 14.2083C10.1315 14.1799 10.0874 14.1644 10.0419 14.1644C9.99648 14.1644 9.9524 14.1799 9.91693 14.2083L5.04193 17.8333C4.78894 18.0215 4.48227 18.1237 4.16693 18.1249ZM4.16693 2.2916C4.11167 2.2916 4.05868 2.31355 4.01961 2.35262C3.98054 2.39169 3.95859 2.44468 3.95859 2.49993V16.6666C3.9583 16.7052 3.96916 16.743 3.98986 16.7755C4.01055 16.808 4.04021 16.8339 4.07526 16.8499C4.10716 16.8718 4.14492 16.8835 4.18359 16.8835C4.22226 16.8835 4.26003 16.8718 4.29193 16.8499L9.16693 13.2083C9.42042 13.0215 9.72704 12.9207 10.0419 12.9207C10.3568 12.9207 10.6634 13.0215 10.9169 13.2083L15.7503 16.8333C15.7822 16.8551 15.8199 16.8668 15.8586 16.8668C15.8973 16.8668 15.935 16.8551 15.9669 16.8333C16.002 16.8172 16.0316 16.7914 16.0523 16.7588C16.073 16.7263 16.0839 16.6885 16.0836 16.6499V2.49993C16.0842 2.46869 16.0778 2.4377 16.0648 2.40926C16.0519 2.38083 16.0327 2.35568 16.0087 2.33567C15.9847 2.31566 15.9565 2.30131 15.9262 2.29368C15.8958 2.28605 15.8642 2.28534 15.8336 2.2916H4.16693Z" fill="#0D3475"/>
                                            </svg> </a>
                                        <?php else: ?>
                                        <a href="javascript:void(0)" class="common_btn" onclick="ajaxAction('<?php echo route('save.product.later',$product->id); ?>')"> 
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.16693 18.1249C3.94178 18.1241 3.71968 18.0728 3.51693 17.9749C3.26839 17.8581 3.05813 17.6732 2.9106 17.4416C2.76307 17.21 2.68435 16.9412 2.68359 16.6666V2.49993C2.68468 2.30662 2.72397 2.11543 2.79921 1.93735C2.87445 1.75928 2.98415 1.59783 3.122 1.4623C3.25985 1.32678 3.42314 1.21984 3.60246 1.14764C3.78179 1.07544 3.97362 1.0394 4.16693 1.0416H15.8336C16.2197 1.04379 16.5894 1.19813 16.8624 1.47115C17.1354 1.74417 17.2897 2.11383 17.2919 2.49993V16.6666C17.2865 16.9305 17.2096 17.188 17.0693 17.4116C16.9291 17.6352 16.7307 17.8166 16.4955 17.9363C16.2603 18.0561 15.997 18.1097 15.7336 18.0916C15.4703 18.0734 15.2168 17.9842 15.0003 17.8333L10.1669 14.2083C10.1315 14.1799 10.0874 14.1644 10.0419 14.1644C9.99648 14.1644 9.9524 14.1799 9.91693 14.2083L5.04193 17.8333C4.78894 18.0215 4.48227 18.1237 4.16693 18.1249ZM4.16693 2.2916C4.11167 2.2916 4.05868 2.31355 4.01961 2.35262C3.98054 2.39169 3.95859 2.44468 3.95859 2.49993V16.6666C3.9583 16.7052 3.96916 16.743 3.98986 16.7755C4.01055 16.808 4.04021 16.8339 4.07526 16.8499C4.10716 16.8718 4.14492 16.8835 4.18359 16.8835C4.22226 16.8835 4.26003 16.8718 4.29193 16.8499L9.16693 13.2083C9.42042 13.0215 9.72704 12.9207 10.0419 12.9207C10.3568 12.9207 10.6634 13.0215 10.9169 13.2083L15.7503 16.8333C15.7822 16.8551 15.8199 16.8668 15.8586 16.8668C15.8973 16.8668 15.935 16.8551 15.9669 16.8333C16.002 16.8172 16.0316 16.7914 16.0523 16.7588C16.073 16.7263 16.0839 16.6885 16.0836 16.6499V2.49993C16.0842 2.46869 16.0778 2.4377 16.0648 2.40926C16.0519 2.38083 16.0327 2.35568 16.0087 2.33567C15.9847 2.31566 15.9565 2.30131 15.9262 2.29368C15.8958 2.28605 15.8642 2.28534 15.8336 2.2916H4.16693Z" fill="#0D3475"/>
                                                </svg>
                                                
                                            </a>
                                        <?php endif; ?>
                                    </span>
                                    <span><a href="#" class="common_btn" onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'product_id' => $product->id] )); ?>', '<?php echo e(get_phrase('Share Product')); ?>');" >
                                        <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.25 17.1249C1.20234 17.1249 1.15422 17.1194 1.10656 17.1085C0.824531 17.0413 0.625 16.7898 0.625 16.4999C0.625 10.8205 1.34344 6.09711 10 5.88226V1.49992C10 1.25148 10.147 1.02695 10.3742 0.927419C10.6006 0.828513 10.8661 0.871325 11.0492 1.04101L19.1742 8.54101C19.3023 8.65867 19.375 8.82539 19.375 8.99992C19.375 9.17445 19.3023 9.34117 19.1742 9.45898L11.0492 16.959C10.8667 17.1287 10.6012 17.1726 10.3742 17.0726C10.147 16.9729 10 16.7484 10 16.4999V12.1323C4.06187 12.2744 2.96625 14.4651 1.80906 16.7795C1.70172 16.9949 1.4825 17.1249 1.25 17.1249ZM10.625 10.8749C10.9705 10.8749 11.25 11.1545 11.25 11.4999V15.0723L17.8284 8.99992L11.25 2.92758V6.49992C11.25 6.84539 10.9705 7.12492 10.625 7.12492C3.72062 7.12492 2.23391 9.79523 1.94156 14.0604C3.23609 12.3215 5.4425 10.8749 10.625 10.8749Z" fill="#0D3475"/>
                                            </svg>
                                            
                                        </a></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="n_detals_p pt-details <?php if(isset($_GET['shared'])): ?> hidden-on-shared-view <?php endif; ?>">
                    <h3 class="sub-title"><?php echo e(get_phrase('Details')); ?></h3>
                    <ul class="E_market">
                        <li><?php echo e(get_phrase('Condition')); ?><span><?php echo e(ucfirst($product->condition)); ?></span></li>
                        
                    </ul>
                    <div class="product-description p_des mt-20">
                        <?php echo script_checker($product->description, false); ?>
                    </div>
                </div>
            </div>
        </div>
        


        <?php if(isset($related_product)): ?>
<div class="related-prodcut mb-14 mt-3 ">
    <h3 class="sub-title"><?php echo e(get_phrase('Related Product')); ?></h3>
</div>
<div class="rl-products owl-carousel">
    <?php $__currentLoopData = $related_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card m_product product">
            <div class="product-figure position-relative mb-0">
                <a href="<?php echo e(route('single.product',$related_product->id)); ?>">
                    <div class="thumbnail-196-196" style="background-image: url('<?php echo e(get_product_image($related_product->image,'coverphoto')); ?>');"></div>
                </a>
                
            </div>
             <div class="p-8">
                <h3 class="h6"><a href="<?php echo e(route('single.product',$related_product->id)); ?>"> <?php echo e(ellipsis($related_product->title, 15)); ?></a></h3>
                <span class="location"><?php echo e($related_product->location); ?></span>
                <a href="<?php echo e(route('single.product',$related_product->id)); ?>" class="btn common_btn d-block">$<?php echo e($related_product->price); ?></a>
             </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>

    </div> <!-- row end -->
</div>



<?php /**PATH C:\Users\USER\Documents\GitHub\abr-d-_rs\resources\views/frontend/marketplace/single_product.blade.php ENDPATH**/ ?>