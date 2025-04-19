<?php echo $__env->make('auth.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Main Start -->
<main class="main my-4 p-5">
    <div class="container">

        <!-- Texte centré au-dessus -->
        <!-- Texte centré au-dessus avec espacement vertical -->
    <div class="text-center mb-5" style="margin-top: -50px">
        <p class="fs-1 fw-bold text-primary">
            1er club privé social dédié aux pros de la Piscine & du Jardin
        </p>
    </div>
        <div class="row align-items-center">
            <!-- Colonne de gauche -->
            <div class="col-lg-6">
                <div class="login-img">
                    <img class="img-fluid" src="<?php echo e(asset('assets/frontend/images/login.png')); ?>" alt="">
                </div>
            </div>

            <!-- Colonne de droite -->
            <div class="col-lg-6">
                <div class="login-txt ms-s ms-lg-5">

                    <?php if($message = Session::get('error_message')): ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong><?php echo e(get_phrase("L'inscription publique n'est pas autorisée")); ?>!</strong>
                            <?php echo e(get_phrase("Vous devriez contacter l'administrateur du site")); ?>.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <h3><?php echo e(get_phrase('Se connecter')); ?></h3>

                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group form-email">
                            <label for="#"><?php echo e(get_phrase('Email')); ?></label>
                            <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(get_phrase('Entrez votre adresse e-mail')); ?>">
                        </div>
                        <p class="text-danger"><?php echo e($errors->first('email')); ?></p>

                        <div class="form-group form-pass">
                            <label for="#"><?php echo e(get_phrase('Mot de passe')); ?></label>
                            <input type="password" name="password" placeholder="<?php echo e(get_phrase('Votre mot de passe')); ?>">
                        </div>

                        <!-- Se souvenir de moi -->
                        <div class="mb-3 form-check">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <label class="form-check-label" for="remember_me"><?php echo e(get_phrase('Se souvenir de moi')); ?></label>
                        </div>

                        <input class="my-3" type="submit" name="submit" id="submit" value="<?php echo e(get_phrase('Se connecter')); ?>">

                        <div class="flex items-center justify-end mt-2">
                            <?php if(Route::has('password.request')): ?>
                                <a href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(get_phrase('Vous avez oublié votre mot de passe ?')); ?>

                                </a>
                            <?php endif; ?>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div> <!-- container end -->
</main>
<!-- Main End -->

<style>
    input[type="submit"] {
        background: #0D3475;
        padding: 10px 32px;
        color: #fff;
        border: 1px solid #0D3475;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background: #FFAA01;
        color: #0D3475;
        border: 1px solid #FFAA01;
    }

    input[type="submit"]:active {
        background: #FFAA01;
        color: #0D3475;
        border: 1px solid #FFAA01;
    }
</style>

<?php echo $__env->make('auth.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\Users\DELL\Desktop\Voary\Piscine de Romain\AbracadamallReseau\AbracadamallReseau\resources\views/auth/login.blade.php ENDPATH**/ ?>