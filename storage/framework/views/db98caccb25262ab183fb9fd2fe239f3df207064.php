<?php echo $__env->make('auth.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <style type="text/css">
        .font-family-serif {
            font-family: serif;
        }
    </style>
    <!-- Main Start -->
    <main class="main my-4 p-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="login-img">
                        <img class="img-fluid" src="<?php echo e(asset('assets/frontend/images/login.png')); ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login-txt ms-0 ms-lg-5 text-center fs-5 w-100 mb-20 fw-bold font-family-serif">
                        <?php echo e(get_phrase('Merci pour votre inscription ! Avant de commencer, pourriez-vous vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer ?')); ?>

                        <br><br>
                        👉 <?php echo e(get_phrase('Pensez à vérifier également votre dossier de spams ou courriers indésirables.')); ?>

                        <br><br>
                        <?php echo e(get_phrase('Si vous n\'avez pas reçu l\'e-mail, nous serons heureux de vous en envoyer un autre.')); ?>

                    </div>
                    

                    <div class="ms-0 ms-lg-5 my-5">

                        <?php if(session('status') == 'verification-link-sent'): ?>
                            <div class="alert alert-success text-center">
                                <?php echo e(get_phrase('Un nouveau lien de vérification a été envoyé à l\'adresse e-mail que vous avez fournie lors de votre inscription.')); ?>

                            </div>
                        <?php endif; ?>

                        <form method="POST" action="<?php echo e(route('verification.send')); ?>">
                            <?php echo csrf_field(); ?>
                            <div>
                                <button type="submit" class="btn btn-custom w-100 p-10px rounded-10px"><?php echo e(get_phrase('Renvoyer l\'email de vérification')); ?></button>
                            </div>
                        </form>

                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-custom w-100 my-3 p-10px rounded-10px">
                                <?php echo e(get_phrase('Se déconnecter')); ?>

                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- container end -->
    </main>
    <!-- Main End -->

    <style>
        .btn-custom {
            background: #020202; 
            padding: 10px 32px;
            color: #fff;
            border: 1px solid #020202;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
    
        /* Survol (devient orange) */
        .btn-custom:hover {
            background: #fc8b15;  /* Orange */
            color: #020202;
            border: 1px solid #fc8b15;
        }
    
        /* Lorsque l'élément est cliqué (focus) */
        .btn-custom:active {
            background: #fc8b15;  /* Orange */
            color: #020202;
            border: 1px solid #fc8b15;
        }
    </style>

<?php echo $__env->make('auth.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\asaRomain\AbracadamallReseau\resources\views/auth/verify-email.blade.php ENDPATH**/ ?>