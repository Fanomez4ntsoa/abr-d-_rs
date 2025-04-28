<?php $__currentLoopData = $all_albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
<?php
if(isset($page_identifire)) {
    $identifires = $page_identifire; 
}
?>
    <div class="single-item-countable grid_single" id="photoAlbum<?php echo e($album->id); ?>">
        <div class="card new_album album-card" >
            <div class="mb-2 position-relative">
                <a href="<?php echo e(route('album.details.list', ['identifire' => $identifires,'album_id' => $album->id])); ?>" class="mb-0" ><img src="<?php echo e(get_album_thumbnail($album->id, 'optimized')); ?>" class="rounded img-fluid " alt=""></a>
                <div class="post-controls dropdown dotted">
                    <a class="nav-link dropdown-toggle" href="#"
                        id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                    </a>
                    <ul class="dropdown-menu"
                        aria-labelledby="navbarDropdown">
                        <li>
                        <a href="<?php echo e(route('album.details.list', ['identifire' => $identifires,'album_id' => $album->id, ])); ?>" class="dropdown-item"> <?php echo e(get_phrase('View Album')); ?>

                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="dropdown-item" onclick="confirmAction('<?php echo e(route('profile.album', ['action_type' => 'delete', 'album_id' => $album->id])); ?>', true);"  > <?php echo e(get_phrase('Delete Album')); ?>

                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-details">
                <h6><a href="<?php echo e(route('album.details.list', ['identifire' => $identifires,'album_id' => $album->id])); ?>"  class="mb-0"><?php echo e($album->title); ?></a></h6>
                <span class="mute"><?php echo e(DB::table('album_images')->where('album_id', $album->id)->get()->count()); ?> <?php echo e(get_phrase('Items')); ?></span>
            </div>
        </div>
    </div> <!-- Card End -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\asaRomain\AbracadamallReseau\resources\views/frontend/profile/album_single.blade.php ENDPATH**/ ?>