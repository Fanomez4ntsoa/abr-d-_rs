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
        align-items: flex-start;
        margin-bottom: 15px;
    }
    .badge-card .entry_badge i {
        color: #007bff;
        margin-right: 10px;
        font-size: 1.2rem;
    }
    .badge-card .entry_badge .entry_badge_text h6 {
        margin-bottom: 5px;
        font-size: 1rem;
        font-weight: 600;
    }
    .badge-card .entry_badge .entry_badge_text p {
        margin-bottom: 0;
        font-size: 0.9rem;
        color: #6c757d;
    }
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
                        @php 
                            $user_info = App\Models\User::where('id', auth()->user()->id)->first();
                            $currentDate = \Carbon\Carbon::now();
                            $badge_info = \App\Models\Badge::where('user_id', auth()->user()->id)
                                ->whereDate('start_date', '<=', $currentDate)
                                ->whereDate('end_date', '>=', $currentDate)
                                ->first();
                        @endphp
                        <div class="batch">
                            <div class="demo-badge">
                                <h4 class="text-center">{{ get_phrase('Build trust with Sociopro Verified') }}</h4>
                                <div class="badge-image text-center mb-4">
                                    <img src="{{ get_user_image(auth()->user()->id, 'optimized') }}" alt="">
                                    <div class="badge_info d-flex justify-content-center mt-2">
                                        <h5>{{ $user_info->name }}</h5>
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
                            <form action="{{ route('badge.info') }}" method="GET">
                                <div class="row mb-4">
                                    <!-- Carte pour Badge Simple -->
                                    <div class="col-md-6 mb-3">
                                        <div class="badge-card p-4 {{ $badge_type == 'simple' ? 'selected' : '' }}" onclick="selectBadge('badge-simple')" data-type="simple">
                                            <div class="d-flex align-items-center mb-3">
                                                <input type="radio" name="type" value="simple" id="badge-simple" {{ $badge_type == 'simple' ? 'checked' : '' }}>
                                                <label for="badge-simple" class="ms-2 mb-0">
                                                    <h5 class="mb-0">{{ get_phrase('Badge Fondateur') }}</h5>
                                                </label>
                                            </div>
                                            <ul class="entry_badge">
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>{{ get_phrase('A verified badge') }}</h6>
                                                        <p>{{ get_phrase('Your audience can trust that you\'re a real person sharing your real stories.') }}</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>{{ get_phrase('Increased account protection') }}</h6>
                                                        <p>{{ get_phrase('Worry less about impersonation with proactive identity monitoring.') }}</p>
                                                    </div>
                                                </li>
                                            </ul>
                                            <!-- Prix supprimé ici -->
                                        </div>
                                    </div>

                                    <!-- Carte pour Badge Pro -->
                                    <div class="col-md-6 mb-3">
                                        <div class="badge-card p-4 {{ $badge_type == 'pro' ? 'selected' : '' }}" onclick="selectBadge('badge-pro')" data-type="pro">
                                            <div class="d-flex align-items-center mb-3">
                                                <input type="radio" name="type" value="pro" id="badge-pro" {{ $badge_type == 'pro' ? 'checked' : '' }}>
                                                <label for="badge-pro" class="ms-2 mb-0">
                                                    <h5 class="mb-0">{{ get_phrase('Badge Embassendeur') }}</h5>
                                                </label>
                                            </div>
                                            <ul class="entry_badge">
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>{{ get_phrase('A verified badge') }}</h6>
                                                        <p>{{ get_phrase('Your audience can trust that you\'re a real person sharing your real stories.') }}</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>{{ get_phrase('Increased account protection') }}</h6>
                                                        <p>{{ get_phrase('Worry less about impersonation with proactive identity monitoring.') }}</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <div class="entry_badge_text">
                                                        <h6>{{ get_phrase('Exclusive verified badge') }}</h6>
                                                        <p>{{ get_phrase('Stand out with a premium identity that highlights your professionalism and credibility.') }}</p>
                                                    </div>
                                                </li>
                                            </ul>
                                            <!-- Prix supprimé ici -->
                                        </div>
                                    </div>
                                </div>

                                <!-- Bouton Next avec logique de désactivation -->
                                @if($badge_info?->status == '1' && $badge_info->start_date <= now() && $badge_info->end_date >= now())
                                    <button type="button" class="btn common_btn_2 next w-100" disabled>{{ get_phrase('Already purchased') }}</button>
                                @else
                                    <button type="submit" class="btn common_btn w-100">{{ get_phrase('Next') }}</button>
                                @endif
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
                @if(count($badges))
                <article class="single-entry batch-entry h-100 p-0">
                    <div class="entry-txt p-8">
                        <h4 class="badge-history">{{ get_phrase('Badge Purchased History') }}</h4>
                        <table class="table table-borderless">
                            <thead>
                                <tr class="table-heading">
                                    <th scope="col">{{ get_phrase('ID') }}</th>
                                    <th scope="col">{{ get_phrase('Name') }}</th>
                                    <th scope="col">{{ get_phrase('Start Date') }}</th>
                                    <th scope="col">{{ get_phrase('End Date') }}</th>
                                    <th scope="col">{{ get_phrase('Status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($badges as $key => $badged)
                                    @php 
                                        $dateString = $badged->start_date;
                                        $dateTime = new DateTime($dateString);
                                        $formattedDate = $dateTime->format('d M Y'); 
                                        $dateStrings = $badged->end_date;
                                        $dateTimes = new DateTime($dateStrings);
                                        $formattedDates = $dateTimes->format('d M Y'); 
                                        $user_info = App\Models\User::where('id', auth()->user()->id)->first();
                                    @endphp
                                    <tr class="single-row table-light">
                                        <th scope="row">
                                            <div class="single-cell">
                                                <div class="cell-item">
                                                    <p>{{ ++$key }}</p>
                                                </div>
                                            </div>
                                        </th>
                                        <td>
                                            <div class="single-cell">
                                                <div class="cell-item">
                                                    <p>{{ $user_info->name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="single-cell">
                                                <a href="javascript:;" class="cell-item item">
                                                    <p>{{ $formattedDate }}</p>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="single-cell">
                                                <a href="javascript:;" class="cell-item item">
                                                    <p>{{ $formattedDates }}</p>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="single-cell">
                                                <div class="cell-item">
                                                    @php 
                                                        $currentDate = \Carbon\Carbon::now();
                                                        $isActive = $currentDate >= $badged->start_date && $currentDate <= $badged->end_date; 
                                                    @endphp
                                                    @if($isActive)
                                                        <p class="btn btn-primary acbtn">{{ get_phrase('Active') }}</p>
                                                    @else
                                                        <p class="btn btn-danger acbtn">{{ get_phrase('Expires') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </article>
                @endif
            </div>
        </div>
    </div>
</div>
