<?php if (isset($component)) {
    $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component;
} ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => $__env->getContainer()->make(Illuminate\View\Factory::class)->make('mail::message'), 'data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('mail::message'); ?>
<?php if ($component->shouldRender()): ?>
    <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
    <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
        <?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
    <?php endif; ?>
    <?php $component->withAttributes([]); ?>

    <?php if (! empty($greeting)): ?>
        # <?php echo e($greeting); ?>

    <?php else: ?>
        <?php if ($level === 'error'): ?>
            # <?php echo app('translator')->get('Whoops!'); ?>
        <?php else: ?>
            # <?php echo app('translator')->get('Coucou!'); ?>
        <?php endif; ?>
    <?php endif; ?>


    <?php $__currentLoopData = $introLines;
    $__env->addLoop($__currentLoopData);
    foreach ($__currentLoopData as $line): $__env->incrementLoopIndices();
        $loop = $__env->getLastLoop(); ?>
        <span style="color: #000000 !important;"><?php echo e($line); ?></span>

    <?php endforeach;
    $__env->popLoop();
    $loop = $__env->getLastLoop(); ?>


    <?php if (isset($actionText)): ?>
        <?php if (isset($component)) {
            $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component;
        } ?>
        <?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => $__env->getContainer()->make(Illuminate\View\Factory::class)->make('mail::button'), 'data' => ['url' => $actionUrl, 'style' => 'background-color: #FFAA01 !important; 
    color: #0D3475 !important; 
    border: 1px solid #FFAA01 !important; 
    text-decoration: none !important; 
    display: inline-block !important; 
    padding: 10px 20px !important; 
    font-size: 16px !important; 
    border-radius: 6px !important;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
        <?php $component->withName('mail::button'); ?>
        <?php if ($component->shouldRender()): ?>
            <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
            <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
                <?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
            <?php endif; ?>
            <?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($actionUrl), 'style' => 'background-color: #FFAA01 !important; 
    color: #0D3475 !important; 
    border: 1px solid #FFAA01 !important; 
    text-decoration: none !important; 
    display: inline-block !important; 
    padding: 10px 20px !important; 
    font-size: 16px !important; 
    border-radius: 6px !important;']); ?>
            <?php echo e($actionText); ?>

            <?php echo $__env->renderComponent(); ?>
        <?php endif; ?>
        <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
            <?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
            <?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
        <?php endif; ?>
    <?php endif; ?>


    <?php $__currentLoopData = $outroLines;
    $__env->addLoop($__currentLoopData);
    foreach ($__currentLoopData as $line): $__env->incrementLoopIndices();
        $loop = $__env->getLastLoop(); ?>
        <span style="color: #000000 !important;"><?php echo e($line); ?></span>

    <?php endforeach;
    $__env->popLoop();
    $loop = $__env->getLastLoop(); ?>


    <?php if (! empty($salutation)): ?>
        <span style="color: #000000 !important;"><?php echo e($salutation); ?></span>
    <?php else: ?>
        <span style="color: #000000 !important;"><?php echo app('translator')->get('Cordialement'); ?>,<br>
            Les Piscines de Romain</span>
    <?php endif; ?>


    <?php if (isset($actionText)): ?>
        <?php $__env->slot('subcopy', null, []); ?>
        <span style="color: #000000 !important;">
            <?php echo app('translator')->get(
                "Si vous rencontrez des problèmes pour cliquer sur le bouton \":actionText\", copiez et collez l'URL ci-dessous\n" .
                    'dans votre navigateur web :',
                ['actionText' => $actionText]
            ); ?>
            <span class="break-all">[<?php echo e($displayableActionUrl); ?>](<?php echo e($actionUrl); ?>)</span>
        </span>
        <?php $__env->endSlot(); ?>
    <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
    <?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
    <?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<style>
    /* Forcer le fond du mail */
    body {
        background-color: #e6e6e7 !important;
    }

    /* Forcer la couleur et taille du bouton */
    .button,
    a.button,
    .button-primary {
        background-color: #FFAA01 !important;
        color: #0D3475 !important;
        border: 1px solid #FFAA01 !important;
        text-decoration: none !important;
        display: inline-block !important;
        padding: 10px 20px !important;
        font-size: 16px !important;
        border-radius: 6px !important;
    }

    /* Désactiver l'effet hover */
    .button:hover,
    a.button:hover,
    .button-primary:hover {
        background-color: #FFAA01 !important;
        color: #0D3475 !important;
        border: 1px solid #FFAA01 !important;
    }
</style>
<?php /**PATH D:\asaRomain\AbracadamallReseau\vendor\laravel\framework\src\Illuminate\Notifications/resources/views/email.blade.php ENDPATH**/ ?>