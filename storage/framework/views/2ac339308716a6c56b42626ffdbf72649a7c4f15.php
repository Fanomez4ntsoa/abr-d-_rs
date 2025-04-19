<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $postOfThisEvent = \App\Models\Posts::where('publisher', 'event')
            ->where('publisher_id', $event->id)
            ->first();
        if (!empty($postOfThisEvent->post_id)) {
            $postId = $postOfThisEvent->post_id;
        } else {
            $postId = 0;
        }
 
    ?>
    <div class="col-lg-6 col-xl-4 col-md-4 col-sm-6 single-item-countable" id="event-<?php echo e($event->id); ?>">

        <div class="card m_product m_event event-card">
            <a href="<?php echo e(route('single.event', $event->id)); ?>">
                <div class="event-image thumbnail-210-200"
                    style="background-image: url('<?php echo e(viewImage('event', $event->banner, 'thumbnail')); ?>')">
                    <div class="event-date n_date">
                        <?php $date = explode("-",$event->event_date); ?>
                        <p class="eve_t_text">
                            <?php echo e(date('M', strtotime($event->event_date))); ?>

                        </p>
                        <span><?php echo e($date['2']); ?></span>
                    </div>
                </div>
            </a>
            <div class="event-text og_event_text">
                <small class="event-meta"><?php echo e(date('D', strtotime($event->event_date))); ?>, at
                    <?php echo e($event->event_time); ?></small>
                <small class="mute e_location">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <mask id="mask0_16_74" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                            width="20" height="20">
                            <rect width="20" height="20" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_16_74)">
                            <path
                                d="M10.0026 16.1248C11.697 14.5693 12.954 13.1561 13.7734 11.8853C14.5929 10.6144 15.0026 9.48595 15.0026 8.49984C15.0026 6.98595 14.52 5.74637 13.5547 4.78109C12.5894 3.81581 11.4054 3.33317 10.0026 3.33317C8.59983 3.33317 7.4158 3.81581 6.45052 4.78109C5.48524 5.74637 5.0026 6.98595 5.0026 8.49984C5.0026 9.48595 5.41233 10.6144 6.23177 11.8853C7.05121 13.1561 8.30816 14.5693 10.0026 16.1248ZM10.0026 17.7707C9.80816 17.7707 9.61371 17.736 9.41927 17.6665C9.22483 17.5971 9.05121 17.4929 8.89844 17.354C7.99566 16.5207 7.19705 15.7082 6.5026 14.9165C5.80816 14.1248 5.2283 13.3575 4.76302 12.6144C4.29774 11.8714 3.94358 11.1561 3.70052 10.4686C3.45747 9.78109 3.33594 9.12484 3.33594 8.49984C3.33594 6.4165 4.00608 4.75678 5.34635 3.52067C6.68663 2.28456 8.23871 1.6665 10.0026 1.6665C11.7665 1.6665 13.3186 2.28456 14.6589 3.52067C15.9991 4.75678 16.6693 6.4165 16.6693 8.49984C16.6693 9.12484 16.5477 9.78109 16.3047 10.4686C16.0616 11.1561 15.7075 11.8714 15.2422 12.6144C14.7769 13.3575 14.197 14.1248 13.5026 14.9165C12.8082 15.7082 12.0095 16.5207 11.1068 17.354C10.954 17.4929 10.7804 17.5971 10.5859 17.6665C10.3915 17.736 10.197 17.7707 10.0026 17.7707ZM10.0026 9.99984C10.4609 9.99984 10.8533 9.83664 11.1797 9.51025C11.5061 9.18387 11.6693 8.7915 11.6693 8.33317C11.6693 7.87484 11.5061 7.48248 11.1797 7.15609C10.8533 6.8297 10.4609 6.6665 10.0026 6.6665C9.54427 6.6665 9.15191 6.8297 8.82552 7.15609C8.49913 7.48248 8.33594 7.87484 8.33594 8.33317C8.33594 8.7915 8.49913 9.18387 8.82552 9.51025C9.15191 9.83664 9.54427 9.99984 10.0026 9.99984Z"
                                fill="#767676" />
                        </g>
                    </svg>
                    <?php echo e($event->location); ?></small>
                <h3 class="elips_con"><a class="ellipsis-line-2"
                        href="<?php echo e(route('single.event', $event->id)); ?>"><?php echo e(ellipsis($event->title, 100)); ?></a></h3>
                <div class="organiser elips_con d-flex align-items-center">
                    <a href="<?php echo e(route('user.profile.view', $event['user_id'])); ?>"><img src="<?php echo e(get_user_image($event->getUser->photo, 'optimized')); ?>"
                            width="28" class="user-round" alt=""></a>
                    <div class="ognr-info ms-2">
                        <h6 class="m-0"><a href="<?php echo e(route('user.profile.view', $event['user_id'])); ?>"><?php echo e($event->getUser->name); ?></a></h6>
                    </div>
                </div>
                <div class="og_btn d-flex justify-content-between e_event mt-2">
                    <div class=" interest_text <?php if(Auth::check()): ?> && (!in_array(auth()->user()->id, json_decode($event->interested_users_id)) && !in_array(auth()->user()->id, json_decode($event->going_users_id))) displaynone <?php endif; ?>" id="dropdown_interest<?php echo e($event->id); ?>">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown_event_label" >
                                <i class="fa-solid fa-star"></i>
                                <?php if(Auth::check()): ?>
                                    <?php if(in_array(auth()->user()->id, json_decode($event->going_users_id))): ?>
                                    <?php echo e(get_phrase('Going')); ?>

                                    <?php elseif(in_array(auth()->user()->id, json_decode($event->interested_users_id))): ?>
                                    <?php echo e(get_phrase('Interested')); ?> 
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php echo e(get_phrase('Interested')); ?>

                                <?php endif; ?>
                            </button>

                            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                <span class="visually-hidden"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <?php if(Auth::check()): ?>
                                    <li class="btn-interested <?php if(in_array(auth()->user()->id, json_decode($event->interested_users_id))): ?> displaynone <?php endif; ?>">
                                        <a class="dropdown-item " href="#"
                                            onclick="ajaxAction('<?php echo route('event.interested', $event->id); ?>')">
                                            <i class="fa-solid fa-star me-1"></i>
                                            <?php echo e(get_phrase('Interested')); ?>

                                        </a>
                                    </li>
                                    <li class="btn-going <?php if(in_array(auth()->user()->id, json_decode($event->going_users_id))): ?> displaynone <?php endif; ?>">
                                        <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('event.going', $event->id); ?>')"
                                            class="dropdown-item"> <i class="fa-solid fa-circle-check me-1"></i>
                                            <?php echo e(get_phrase('Going')); ?></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('event.cancel', $event->id); ?>')"
                                            class="dropdown-item"><i class="fa-solid fa-circle-xmark"></i>
                                            <?php echo e(get_phrase('Cancel')); ?>

                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li class="btn-interested ">
                                        <a class="dropdown-item " href="<?php echo e(route('login')); ?>">
                                            <i class="fa-solid fa-star me-1"></i>
                                            <?php echo e(get_phrase('Interested')); ?>

                                        </a>
                                    </li>
                                    <li class="btn-going">
                                        <a href="<?php echo e(route('login')); ?>"
                                            class="dropdown-item"> <i class="fa-solid fa-circle-check me-1"></i>
                                            <?php echo e(get_phrase('Going')); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('login')); ?>"
                                            class="dropdown-item"><i class="fa-solid fa-circle-xmark"></i>
                                            <?php echo e(get_phrase('Cancel')); ?>

                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>

                    <?php if(Auth::check()): ?>
                        <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('event.interested', $event->id); ?>')"
                            class="btn ni_btn btn-primary <?php if(in_array(auth()->user()->id, json_decode($event->interested_users_id)) || in_array(auth()->user()->id, json_decode($event->going_users_id))): ?> displaynone <?php endif; ?>"
                            id="btn_interest<?php echo e($event->id); ?>">
                            <i class="fa-solid fa-star me-2"></i><?php echo e(get_phrase('Interest')); ?>

                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>"
                            class="btn ni_btn btn-primary displaynone"
                            id="btn_interest<?php echo e($event->id); ?>">
                            <i class="fa-solid fa-star me-2"></i><?php echo e(get_phrase('Interest')); ?>

                        </a>
                    <?php endif; ?>


                    <div class="post-controls ev_event_con dropdown">
                        <div class="dropdown ">
                            <button class="btn cl_btn  btn-secondary" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if($event->user_id == auth()->user()->id): ?>
                                        <li>
                                            <button
                                                onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.events.edit_event', 'event_id' => $event->id])); ?>', '<?php echo e(get_phrase('Edit Event')); ?>');"
                                                class="dropdown-item  ed_ve btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#createEvent"><i class="fa fa-edit me-1"></i>
                                                <?php echo e(get_phrase('Edit Event')); ?></button>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"
                                                onclick="confirmAction('<?php echo route('event.delete', ['event_id' => $event->id]); ?>', true)"
                                                class="dropdown-item  ed_ve btn-primary btn-sm"><i
                                                    class="fa fa-trash me-1"></i> <?php echo e(get_phrase('Delete Event')); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if($postId != 0): ?>
                                    <li>
                                        <?php if(Auth::check()): ?>
                                            <a href="javascript:void(0)"
                                                onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postId])); ?>', '<?php echo e(get_phrase('Share Event')); ?>');"
                                                class="dropdown-item btn ed_ve btn-primary btn-sm">
                                        <?php else: ?>
                                            <a href="<?php echo e(route('login')); ?>"
                                                class="dropdown-item btn ed_ve btn-primary btn-sm">
                                        <?php endif; ?>
                                            <i class="fa fa-share me-1"></i>
                                            <?php echo e(get_phrase('Share Event')); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>





            </div>
        </div>
    </div>
    <?php if(isset($search) && !empty($search)): ?>
        <?php if($key == 2): ?>
        <?php break; ?>
    <?php endif; ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\USER\Documents\GitHub\abr-d-_rs\resources\views/frontend/events/event-single.blade.php ENDPATH**/ ?>