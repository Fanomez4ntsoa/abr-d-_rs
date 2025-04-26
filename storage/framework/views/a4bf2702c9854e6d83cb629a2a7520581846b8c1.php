<style>
    /* Styles pour les cartes */
    .badge-card {
        border-radius: 10px;
        transition: border-color 0.3s ease;
        background-color: #fff;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        cursor: pointer;
        border: 2px solid transparent;
        transition: border-color 0.3s ease, background-color 0.3s ease;
    }

    .badge-card:hover {
    border-color: #ddd;
    }

    .badge-card.selected {
        border: 2px solid #007bff;
        background-color: #f8f9fa;
    }
    
    .badge-card.selected-pro {
        border: 2px solid #d4af37; /* Bordure dorée pour Pro quand sélectionné */
        background-color: #f8f9fa;
    }

    /* .badge-card.gold-border {
        border: 2px solid #d4af37;
    } */

    .badge-card .entry_badge {
        list-style: none;
        padding: 0;
    }

    .badge-card .entry_badge li {
        display: flex;
        align-items: flex-start; /* Alignement en haut pour les descriptions longues */
        margin-bottom: 12px; /* Espacement entre les éléments */
    }

    .badge-card .entry_badge i {
        color: #007bff;
        margin-right: 10px;
        font-size: 1.2rem;
    }

    .badge-card .entry_badge li i {
        margin-right: 8px;
        font-size: 0.9rem; /* Réduit la taille de l’icône */
        margin-top: 2px; /* Ajustement pour l’alignement */
    }
    .badge-card .entry_badge .entry_badge_text h6 {
        margin: 0;
        font-size: 0.95rem; /* Taille réduite pour les titres */
        font-weight: 500; /* Poids moyen pour une bonne lisibilité */
        line-height: 1.3; /* Espacement entre les lignes */
        color: #333;
    }
    .badge-card .entry_badge .entry_badge_text p {
        margin: 2px 0 0 0; /* Espacement minimal au-dessus */
        font-size: 0.85rem; /* Taille réduite pour les descriptions */
        font-weight: 400; /* Poids léger pour les descriptions */
        line-height: 1.4; /* Espacement entre les lignes pour aérer */
        color: #666; /* Couleur plus claire pour les descriptions */
    }

    /* .badge-card .entry_badge .entry_badge_text h6 {
        margin-bottom: 5px;
        font-size: 1rem;
        font-weight: 600;
    }
    .badge-card .entry_badge .entry_badge_text p {
        margin-bottom: 0;
        font-size: 0.9rem;
        color: #6c757d;
    } */
    .btn.common_btn {
        border: 2px solid #6f42c1;
        color: #6f42c1;
        background-color: transparent;
        font-weight: 600;
        padding: 10px;
        border-radius: 5px;
        transition: all 0.3s ease;
    }
    .btn.common_btn:hover {
        background-color: #6f42c1;
        color: #fff;
    }
    .btn.common_btn_2 {
        background-color: #6c757d;
        color: #fff;
        border: none;
        padding: 10px;
        border-radius: 5px;
    }
</style>

<div class="page-wrap">
    <div class="g-3 blog-cards">
        <div class="row" id="batchdatashow"> 
            <div class="col-12 h-100 my-1 single-item-countable" id="batch">
                <article class="single-entry batch-entry h-100 p-0 mb-5">
                    <div class="entry-txt p-8">
                        <?php 
                            $user_info = App\Models\User::where('id', auth()->user()->id)->first();
                            $currentDate = \Carbon\Carbon::now();
                            $badge_info = \App\Models\Badge::where('user_id', auth()->user()->id)
                                ->whereDate('start_date', '<=', $currentDate)
                                ->whereDate('end_date', '>=', $currentDate)
                                ->first();
                        ?>
                        <div class="batch">
                            <div class="demo-badge">
                                <h4 class="text-center"><?php echo e(get_phrase('Build trust with Sociopro Verified')); ?></h4>
                                <div class="badge-image text-center mb-4">
                                    <img src="<?php echo e(get_user_image(auth()->user()->id, 'optimized')); ?>" alt="">
                                    <div class="badge_info d-flex justify-content-center mt-2">
                                        <h5><?php echo e($user_info->name); ?></h5>
                                        <p>
                                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.1825 1.16051C11.5808 0.595046 12.4192 0.595047 12.8175 1.16051L13.8489 2.62463C14.1272 3.01962 14.648 3.15918 15.0865 2.95624L16.7118 2.20397C17.3395 1.91343 18.0655 2.33261 18.1277 3.02149L18.2889 4.80515C18.3324 5.28634 18.7137 5.66763 19.1948 5.71111L20.9785 5.87226C21.6674 5.9345 22.0866 6.66054 21.796 7.28825L21.0438 8.91352C20.8408 9.35198 20.9804 9.87284 21.3754 10.1511L22.8395 11.1825C23.405 11.5808 23.405 12.4192 22.8395 12.8175L21.3754 13.8489C20.9804 14.1272 20.8408 14.648 21.0438 15.0865L21.796 16.7118C22.0866 17.3395 21.6674 18.0655 20.9785 18.1277L19.1948 18.2889C18.7137 18.3324 18.3324 18.7137 18.2889 19.1948L18.1277 20.9785C18.0655 21.6674 17.3395 22.0866 16.7117 21.796L15.0865 21.0438C14.648 20.8408 14.1272 20.9804 13.8489 21.3754L12.8175 22.8395C12.4192 23.405 11.5808 23.405 11.1825 22.8395L10.1511 21.3754C9.87284 20.9804 9.35198 20.8408 8.91352 21.0438L7.28825 21.796C6.66054 22.0866 5.9345 21.6674 5.87226 20.9785L5.71111 19.1948C5.66763 18.7137 5.28634 18.3324 4.80515 18.2889L3.02149 18.1277C2.33261 18.0655 1.91343 17.3395 2.20397 16.7117L2.95624 15.0865C3.15918 14.648 3.01962 14.1272 2.62463 13.8489L1.16051 12.8175C0.595046 12.4192 0.595047 11.5808 1.16051 11.1825L2.62463 10.1511C3.01962 9.87284 3.15918 9.35198 2.95624 8.91352L2.20397 7.28825C1.91343 6.66054 2.33261 5.9345 3.02149 5.87226L4.80515 5.71111C5.28634 5.66763 5.66763 5.28634 5.71111 4.80515L5.87226 3.02149C5.9345 2.33261 6.66054 1.91343 7.28825 2.20397L8.91352 2.95624C9.35198 3.15918 9.87284 3.01962 10.1511 2.62463L11.1825 1.16051Z" fill="#329CE8"/>
                                                <path d="M7.5 11.83L10.6629 14.9929L17 8.66705" stroke="white" stroke-width="1.67647" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Formulaire pour les cartes comparatives -->
                            <form action="<?php echo e(route('badge.info')); ?>" method="GET">
                                <div class="row mb-4">
                                    <!-- Carte pour Badge Fondateur -->
                                    <div class="col-md-6 mb-3">
                                        <div class="badge-card p-4 <?php echo e($badge_type == 'simple' ? 'selected' : ''); ?>" onclick="selectBadge('badge-simple')" data-type="simple">
                                            <div class="d-flex align-items-center mb-3">
                                                <input type="radio" name="type" value="simple" id="badge-simple" <?php echo e($badge_type == 'simple' ? 'checked' : ''); ?>>
                                                <label for="badge-simple" class="ms-2 mb-0">
                                                    <h5 class="mb-0"><?php echo e(get_phrase('Badge Fondateur')); ?></h5>
                                                </label>
                                            </div>
                                            <ul class="entry_badge">
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Offre réservée aux 500 premiers inscrits pendant la phase Bêta (jusqu’au 17 mai).</h6>
                                                        <p>À partir du 17 mai, ce badge deviendra le Badge Passionné, à 250€/an.
                                                            Rejoignez les pionniers du 1er réseau social 100% piscine.
                                                            Accédez à vie à un espace exclusif, humain et utile, réservé aux membres les plus engagés.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Statut Fondateur visible à vie</h6>
                                                        <p>Votre badge apparaît partout sur votre profil :
                                                            Reconnaissance, visibilité, et place privilégiée dans la communauté.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Support personnalisé 7j/7 par des piscinistes</h6>
                                                        <p>Un accompagnement pour :
                                                            L’entretien de votre piscine
                                                            Le SAV, les pannes, les fuites
                                                            L’analyse et la lecture de vos devis (construction, rénovation, équipements)</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Vente directe entre membres certifiés, sans commission</h6>
                                                        <p>Publiez un nombre illimité d’annonces dans le Marché.
                                                            Vendez librement, sans intermédiaire ni frais.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Devenez un acteur de la communauté</h6>
                                                        <p>La lecture est ouverte à tous, mais l’interaction est réservée aux membres certifiés :
                                                            Commentaires sur les vidéos, vitrines, articles
                                                            Participation aux discussions dans les salons
                                                            Publication de vos vidéos & reels dans le Cinéma
                                                            Rédaction d’articles dans la Bibliothèque
                                                            Création de groupes dans les Salons</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Accès anticipé aux offres boutiques</h6>
                                                        <p>Recevez les promotions 48 heures avant leur mise en ligne publique.
                                                            Profitez des meilleurs prix, en priorité.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Webinaire mensuel exclusif</h6>
                                                        <p>Chaque mois, participez à une réunion privée animée par le fondateur.
                                                            Découvrez en avant-première les nouveautés, promotions et évolutions du réseau.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Un badge. Une communauté. Une vraie différence.</h6>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Carte pour Badge Ambassadeur -->
                                    <div class="col-md-6 mb-3">
                                        <div class="badge-card p-4 <?php echo e($badge_type == 'pro' ? 'selected' : ''); ?>" onclick="selectBadge('badge-pro')" data-type="pro">
                                            <div class="d-flex align-items-center mb-3">
                                                <input type="radio" name="type" value="pro" id="badge-pro" <?php echo e($badge_type == 'pro' ? 'checked' : ''); ?>>
                                                <label for="badge-pro" class="ms-2 mb-0">
                                                    <h5 class="mb-0"><?php echo e(get_phrase('Badge Ambassadeur')); ?></h5>
                                                </label>
                                            </div>
                                            <ul class="entry_badge">
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Offre réservée aux 200 premiers piscinistes inscrits pendant la phase Bêta (jusqu’au 17 mai).</h6>
                                                        <p>À partir du 17 mai, ce badge deviendra le Badge Pisciniste, au tarif de 500€/an.
                                                            Devenez un acteur clé du 1er Éco Système 100% piscine.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Visibilité prioritaire et reconnaissance officielle</h6>
                                                        <p>Votre badge Ambassadeur est affiché sur votre profil, votre vitrine, vos publications, vos commentaires et sur l’ensemble de vos produits et services à la vente.
                                                            Vous êtes automatiquement identifié comme pisciniste certifié ayant contribué au lancement du concept.
                                                            Votre présence dès la Bêta vous place comme référence historique et partenaire de confiance.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Référencement géolocalisé sur le moteur de recherche piscine</h6>
                                                        <p>Vous êtes référencé dans le moteur de recherche dédié aux piscinistes certifiés, accessible aux particuliers depuis le centre commercial virtuel.
                                                            Les clients peuvent vous trouver facilement par ville, département ou zone d’intervention, pour des projets de construction, rénovation ou entretien.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Vendez sans intermédiaire, sans commission</h6>
                                                        <p>Proposez vos produits ou services dans le Marché dédié, sans aucune limite et sans frais prélevés.
                                                            Gardez 100% de vos ventes, maîtrisez votre activité de A à Z.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Référencement géolocalisé sur le moteur de recherche piscine</h6>
                                                        <p>Vous êtes référencé dans le moteur de recherche dédié aux piscinistes certifiés, accessible aux particuliers depuis le centre commercial virtuel.
                                                            Les clients peuvent vous trouver facilement par ville, département ou zone d’intervention, pour des projets de construction, rénovation ou entretien.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Accès complet à l’écosystème professionnel piscine</h6>
                                                        <p>Rejoignez un réseau B2B exclusif entre piscinistes, artisans, fabricants, distributeurs et marques du secteur.
                                                            Accédez aux appels d’offres, développez des synergies et échangez avec d’autres professionnels certifiés.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Accès à la Centrale d’Achat</h6>
                                                        <p>Accédez à une centrale d’achat réservée aux pros avec les meilleures offres négociées du secteur piscine.
                                                            Optimisez vos coûts, améliorez vos marges et sécurisez votre approvisionnement.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Accès à l’Espace Offres d’Emploi – 100% Piscine</h6>
                                                        <p>Trouvez les bons profils dans un métier exigeant et spécifique.
                                                            Sur la plateforme, vous bénéficiez d’un espace emploi entièrement dédié au secteur de la piscine.
                                                            Vous pouvez y publier vos offres d’emploi, missions ponctuelles ou stages, et les rendre visibles uniquement aux personnes sensibilisées ou formées au métier.
                                                            C’est l’outil idéal pour recruter plus facilement dans un secteur où il est difficile de trouver du personnel qualifié.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Participation à l’Association des Piscinistes</h6>
                                                        <p>En tant qu’Ambassadeur, vous accédez à un espace privé réservé aux professionnels du secteur piscine.
                                                            Surnommé "Association des Piscinistes", il fonctionne comme un réseau social interne, conçu par et pour les pros.
                                                            Créez ou rejoignez des groupes, échangez librement, posez vos questions, partagez vos retours d’expérience…
                                                            Un espace collaboratif et solidaire, loin des groupes impersonnels.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Développez votre image avec des outils puissants</h6>
                                                        <p>Créez une vitrine qui sera mise en avant dans la Galerie et les Allées du centre commercial virtuel.
                                                            Valorisez votre savoir-faire et attirez les bons clients tout au long de l’année.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Devenez rédacteur dans l’Espace Presse</h6>
                                                        <p>Publiez des contenus pour booster votre référencement naturel (SEO) et gagner en notoriété.
                                                            Partagez vos conseils, vos innovations ou votre expertise dans les rubriques les plus consultées de la plateforme.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Accès à l’Espace Associatif</h6>
                                                        <p>Un projet associatif, une idée pour Madagascar, un besoin de soutien ou de financement ?
                                                            Déposez votre dossier dans l’Espace Associatif.
                                                            Vos actions pourront être mises en avant et soutenues par la communauté ou relayées auprès de nos partenaires.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Webinaire mensuel privé avec le fondateur</h6>
                                                        <p>Chaque mois, participez à une session animée par le fondateur.
                                                            Découvrez les nouveautés, anticipez les évolutions et participez à la stratégie globale du réseau.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Avantages réservés aux Ambassadeurs</h6>
                                                        <p>50% sur la location de votre boutique dans le Shop
                                                            50% sur toutes les campagnes marketing et sponsorisées</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Support dédié 7j/7</h6>
                                                        <p>Notre équipe vous accompagne 7 jours sur 7 :
                                                            Conseils, modération, assistance technique ou stratégie – vous n’êtes jamais seul.</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>Un badge unique. Un réseau d’élite. Une vitrine pour développer votre business.</h6>
                                                    </div>
                                                </li>
                                            </ul>
                                            <!-- Prix supprimé ici -->
                                        </div>
                                    </div>
                                </div>

                                <!-- Bouton Next avec logique de désactivation -->
                                <?php if($badge_info?->status == '1' && $badge_info->start_date <= now() && $badge_info->end_date >= now()): ?>
                                    <button type="button" class="btn common_btn_2 next w-100" disabled><?php echo e(get_phrase('Already purchased')); ?></button>
                                <?php else: ?>
                                    <button type="submit" class="btn common_btn w-100"><?php echo e(get_phrase('Next')); ?></button>
                                <?php endif; ?>
                            </form>

                            <!-- JavaScript pour gérer la sélection des cartes -->
                            <script>
                                function selectBadge(radioId) {
                                    // Sélectionne le bouton radio correspondant
                                    const radio = document.getElementById(radioId);
                                    radio.checked = true;

                                    // Récupère la carte cliquée
                                    const clickedCard = radio.closest('.badge-card');
                                    const badgeType = clickedCard.getAttribute('data-type');

                                    // Retire les classes 'selected' et 'selected-pro' de toutes les cartes
                                    document.querySelectorAll('.badge-card').forEach(card => {
                                        card.classList.remove('selected', 'selected-pro');
                                    });

                                    // Ajoute la classe appropriée en fonction du type de badge
                                    if (badgeType === 'simple') {
                                        clickedCard.classList.add('selected');
                                    } else if (badgeType === 'pro') {
                                        clickedCard.classList.add('selected-pro');
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </article>

                <!-- Historique des badges (inchangé) -->
                <?php if(count($badges)): ?>
                <article class="single-entry batch-entry h-100 p-0">
                    <div class="entry-txt p-8">
                        <h4 class="badge-history"><?php echo e(get_phrase('Badge Purchased History')); ?></h4>
                        <table class="table table-borderless">
                            <thead>
                                <tr class="table-heading">
                                    <th scope="col"><?php echo e(get_phrase('ID')); ?></th>
                                    <th scope="col"><?php echo e(get_phrase('Name')); ?></th>
                                    <th scope="col"><?php echo e(get_phrase('Start Date')); ?></th>
                                    <th scope="col"><?php echo e(get_phrase('End Date')); ?></th>
                                    <th scope="col"><?php echo e(get_phrase('Status')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $badges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $badged): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php 
                                        $dateString = $badged->start_date;
                                        $dateTime = new DateTime($dateString);
                                        $formattedDate = $dateTime->format('d M Y'); 
                                        $dateStrings = $badged->end_date;
                                        $dateTimes = new DateTime($dateStrings);
                                        $formattedDates = $dateTimes->format('d M Y'); 
                                        $user_info = App\Models\User::where('id', auth()->user()->id)->first();
                                    ?>
                                    <tr class="single-row table-light">
                                        <th scope="row">
                                            <div class="single-cell">
                                                <div class="cell-item">
                                                    <p><?php echo e(++$key); ?></p>
                                                </div>
                                            </div>
                                        </th>
                                        <td>
                                            <div class="single-cell">
                                                <div class="cell-item">
                                                    <p><?php echo e($user_info->name); ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="single-cell">
                                                <a href="javascript:;" class="cell-item item">
                                                    <p><?php echo e($formattedDate); ?></p>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="single-cell">
                                                <a href="javascript:;" class="cell-item item">
                                                    <p><?php echo e($formattedDates); ?></p>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="single-cell">
                                                <div class="cell-item">
                                                    <?php 
                                                        $currentDate = \Carbon\Carbon::now();
                                                        $isActive = $currentDate >= $badged->start_date && $currentDate <= $badged->end_date; 
                                                    ?>
                                                    <?php if($isActive): ?>
                                                        <p class="btn btn-primary acbtn"><?php echo e(get_phrase('Active')); ?></p>
                                                    <?php else: ?>
                                                        <p class="btn btn-danger acbtn"><?php echo e(get_phrase('Expires')); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </article>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/fanomezantsoa/projet/abr-d-_rs/resources/views/frontend/badge/badge.blade.php ENDPATH**/ ?>