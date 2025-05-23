<?php if(isset($comment_react) && $comment_react == true): ?>

    <?php $comment_unique_values = array_unique($user_comment_reacts); ?>
    <span>
        <?php $__currentLoopData = $comment_unique_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_comment_react): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($user_comment_react == 'like'): ?>
                <img class="w-17px" src="<?php echo e(asset('storage/images/like.svg')); ?>" alt="">
            <?php endif; ?>

            <?php if($user_comment_react == 'love'): ?>
                <img class="w-20px" src="<?php echo e(asset('storage/images/love.svg')); ?>" alt="">
            <?php endif; ?>

            <?php if($user_comment_react == 'sad'): ?>
                <img class="w-17px" src="<?php echo e(asset('storage/images/sad.svg')); ?>" alt="">
            <?php endif; ?>

            <?php if($user_comment_react == 'angry'): ?>
                <img class="w-17px" src="<?php echo e(asset('storage/images/angry.svg')); ?>" alt="">
            <?php endif; ?>

            <?php if($user_comment_react == 'haha'): ?>
                <img class="w-17px" src="<?php echo e(asset('storage/images/haha.svg')); ?>" alt="">
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if(count($user_comment_reacts) > 0): ?>
            <span class="counter small"><?php echo e(count($user_comment_reacts)); ?></span>
        <?php endif; ?>
    </span>
<?php endif; ?>

<?php if(isset($ajax_call) && $ajax_call): ?>
    <!--hr tag will be split by js to show different sections-->
    <hr>
<?php endif; ?>

<?php if(isset($my_react) && $my_react == true): ?>
    <?php if(array_key_exists(Auth()->user()->id, $user_comment_reacts)): ?>
        <?php if($user_comment_reacts[Auth()->user()->id] == 'like'): ?>
            
            <div class="like-color"><svg width="20" class="mt-3px" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.30176 16.8208L9.52422 19.0208C9.94003 19.3874 10.8756 19.5708 11.4993 19.5708H15.4494C16.6968 19.5708 18.0482 18.7458 18.36 17.6458L20.8548 10.9541C21.3746 9.67076 20.439 8.57076 18.8798 8.57076H14.7217C14.098 8.57076 13.5783 8.11243 13.6822 7.47076L14.202 4.53743C14.4099 3.71243 13.7862 2.79576 12.8506 2.52076C12.019 2.24576 10.9795 2.61243 10.5637 3.16243L6.30176 8.7541" fill="#5431EF"></path>
                <path d="M1 17.1838V7.81618C1 6.47794 1.48 6 2.6 6H3.4C4.52 6 5 6.47794 5 7.81618V17.1838C5 18.5221 4.52 19 3.4 19H2.6C1.48 19 1 18.5221 1 17.1838Z" fill="#5431EF"></path>
                </svg> <?php echo e(get_phrase('Liked')); ?></div>
        <?php endif; ?>

        <?php if($user_comment_reacts[Auth()->user()->id] == 'love'): ?>
            <div class="love-color"><img class="w-20px mt--4px" src="<?php echo e(asset('storage/images/love.svg')); ?>" alt=""> <?php echo e(get_phrase('Loved')); ?></div>
        <?php endif; ?>

        <?php if($user_comment_reacts[Auth()->user()->id] == 'haha'): ?>
            <div class="sad-color"><img class="w-17px mt--4px" src="<?php echo e(asset('storage/images/haha.svg')); ?>" alt=""> <?php echo e(get_phrase('Haha')); ?></div>
        <?php endif; ?>

        <?php if($user_comment_reacts[Auth()->user()->id] == 'angry'): ?>
            <div class="angry-color"><img class="w-17px mt--4px" src="<?php echo e(asset('storage/images/angry.svg')); ?>" alt=""> <?php echo e(get_phrase('Angry')); ?></div>
        <?php endif; ?>

        <?php if($user_comment_reacts[Auth()->user()->id] == 'sad'): ?>
            <div class="sad-color"><img class="w-17px mt--4px" src="<?php echo e(asset('storage/images/sad.svg')); ?>" alt=""> <?php echo e(get_phrase('Sad')); ?></div>
        <?php endif; ?>

        
    <?php else: ?>
        <div>
            
            <svg class="mt-3px" width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 17.1126L9.28881 19.4225C9.71317 19.8075 10.668 20 11.3045 20H15.336C16.6091 20 17.9882 19.1338 18.3065 17.9788L20.8527 10.9528C21.3831 9.6054 20.4283 8.45045 18.837 8.45045H14.5933C13.9568 8.45045 13.4263 7.96921 13.5324 7.29549L14.0629 4.21561C14.2751 3.34939 13.6385 2.38693 12.6837 2.09819C11.835 1.80945 10.7741 2.19444 10.3497 2.77191L6 8.64294" stroke="#9A98A3" stroke-width="1.5" stroke-miterlimit="10"/>
                <path d="M1 17.1838V7.81618C1 6.47794 1.6 6 3 6H4C5.4 6 6 6.47794 6 7.81618V17.1838C6 18.5221 5.4 19 4 19H3C1.6 19 1 18.5221 1 17.1838Z" stroke="#9A98A3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                
            <?php echo e(get_phrase('Like')); ?>

        </div>
    <?php endif; ?>
<?php endif; ?><?php /**PATH C:\Users\DELL\Desktop\Voary\Piscine de Romain\AbracadamallReseau\AbracadamallReseau\resources\views/frontend/main_content/comment_reacts.blade.php ENDPATH**/ ?>