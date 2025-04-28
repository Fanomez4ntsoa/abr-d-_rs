<div class="d-flex">
    <?php if($message->react==''): ?>
    <a href="javascript:void(0)"> <img src="<?php echo e(asset('storage/images/r-like.png')); ?>" class="react-icon filter-gray-1"  alt="Like"> </a>
    <?php elseif($message->react=='like'): ?>
    <a href="javascript:void(0)" class="<?php if($message->react=='like'): ?> d-block <?php else: ?> d-none <?php endif; ?>"> <img src="<?php echo e(asset('storage/images/r-like.png')); ?>" class="react-icon" alt="Like"> </a>
    
    <?php elseif($message->react=='love'): ?>
        <a href="javascript:void(0)" class="<?php if($message->react=='love'): ?> d-block <?php else: ?> d-none <?php endif; ?>"> <img src="<?php echo e(asset('storage/images/love.svg')); ?>" class="react-icon" alt="Love"> </a>
    <?php elseif($message->react=='sad'): ?>
    <a href="javascript:void(0)" class="<?php if($message->react=='sad'): ?> d-block <?php else: ?> d-none <?php endif; ?>"> <img src="<?php echo e(asset('storage/images/sad.svg')); ?>" class="react-icon" alt="Sad"> </a>
    <?php elseif($message->react=='angry'): ?>
    <a href="javascript:void(0)" class="<?php if($message->react=='angry'): ?> d-block <?php else: ?> d-none <?php endif; ?>"> <img src="<?php echo e(asset('storage/images/angry.svg')); ?>" class="react-icon" alt="Angry"> </a>
    <?php elseif($message->react=='haha'): ?>
    <a href="javascript:void(0)" class="<?php if($message->react=='haha'): ?> d-block <?php else: ?> d-none <?php endif; ?>"> <img src="<?php echo e(asset('storage/images/haha.svg')); ?>" class="react-icon" alt="HaHa"> </a>
    <?php endif; ?>
</div>

<ul class="react-list eReact">
    <li><a href="javascript:void(0)" onclick="myMessageReact('like', 'update', <?php echo e($message->id); ?>)" ><img src="<?php echo e(asset('storage/images/r-like.png')); ?>" class="" alt="Like"></a>
    </li>
    <li><a href="javascript:void(0)" onclick="myMessageReact('love', 'update', <?php echo e($message->id); ?>)"><img src="<?php echo e(asset('storage/images/love.svg')); ?>" class="eLove" alt="Love"></a>
    </li>
    <li><a href="javascript:void(0)" onclick="myMessageReact('haha', 'update', <?php echo e($message->id); ?>)"><img src="<?php echo e(asset('storage/images/haha.svg')); ?>" class="" alt="Love"></a>
    </li>
    <li><a href="javascript:void(0)" onclick="myMessageReact('sad', 'update', <?php echo e($message->id); ?>)"><img src="<?php echo e(asset('storage/images/sad.svg')); ?>" class="" alt="Sad"></a>
    </li>
    <li><a href="javascript:void(0)" onclick="myMessageReact('angry', 'update', <?php echo e($message->id); ?>)"><img src="<?php echo e(asset('storage/images/angry.svg')); ?>" class=""  alt="Angry"></a>
    </li>
</ul>
<?php /**PATH C:\Users\USER\Documents\GitHub\abr-d-_rs\resources\views/frontend/chat/chat_react.blade.php ENDPATH**/ ?>