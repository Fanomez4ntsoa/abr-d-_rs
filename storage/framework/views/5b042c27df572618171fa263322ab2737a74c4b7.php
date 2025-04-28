<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php
        $system_name = \App\Models\Setting::where('type', 'system_name')->value('description');
        $system_favicon = \App\Models\Setting::where('type', 'system_fav_icon')->value('description');
    ?>
    <title><?php echo e($system_name); ?></title>

    <!-- CSRF Token for ajax for submission -->
    <meta name="csrf_token" content="<?php echo e(csrf_token()); ?>" />

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="shortcut icon" href="<?php echo e(get_system_logo_favicon($system_favicon,'favicon')); ?>" />

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/fontawesome/all.min.css')); ?>">
    <!-- CSS Library -->

    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/owl.carousel.min.css')); ?>">

    <!-- Style css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/nice-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/plyr/plyr.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/own.css')); ?>">
    <link href="<?php echo e(asset('assets/frontend/leafletjs/leaflet.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/frontend/toaster/toaster.css')); ?>" rel="stylesheet">


    <link href="<?php echo e(asset('assets/frontend/uploader/jquery.uploader.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/fundraiser/css/new-style.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/fundraiser/css/custom_new.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/gallery/justifiedGallery.min.css')); ?>">

    <script src="<?php echo e(asset('assets/frontend/js/jquery-3.6.0.min.js')); ?>"></script>
    
</head>

<body>
    <?php $user_info = Auth()->user() ?>
    
 
    <!-- Main Start -->
    <main class="main">
        <?php if($post != null): ?>
            <?php echo $__env->make('frontend.main_content.single-post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <div class="card border-none bg-white radius-8 py-4">
                <div class="card-body">
                    <p class="mb-0"><i class="fas fa-lock"></i> <b><?php echo e(get_phrase("This content isn't available right now")); ?></b> </p>
                    <p class="ps-3"> <?php echo e(get_phrase("When this happens, it's usually because the owner only shared it with a small group of people, changed who can see it or it's been deleted.")); ?></p>
                </div>
            </div>
        <?php endif; ?>
    </main>
    <!-- Main End -->



    <!--Javascript
    ========================================================-->
    <script src="<?php echo e(asset('assets/frontend/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/js/venobox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/js/timepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/js/jquery.datepicker.min.js')); ?>"></script>

   
    <script src="<?php echo e(asset('assets/frontend/js/jquery.nice-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/plyr/plyr.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/jquery-form/jquery.form.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/frontend/leafletjs/leaflet.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/leafletjs/leaflet-search.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/toaster/toaster.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/frontend/gallery/jquery.justifiedGallery.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('assets/frontend/js/foundation.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/js/modernizr.min.js')); ?>"></script>


    <script src="<?php echo e(asset('assets/frontend/uploader/jquery.uploader.min.js')); ?>"></script>

    
    <script src="<?php echo e(asset('assets/frontend/js/initialize.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/frontend/js/custom.js')); ?>"></script>

    <?php echo $__env->make('frontend.initialize', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
</body>

</html><?php /**PATH C:\Users\USER\Documents\GitHub\abr-d-_rs\resources\views/frontend/main_content/custom_shared_view.blade.php ENDPATH**/ ?>