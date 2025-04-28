             
<!-- Content Section Start -->
    <div class="single-event-wrap single_event">
        <div class="event-image event-cover">
            <img class="w-100" src="<?php echo e(viewImage('event',$event->banner,'coverphoto')); ?>" class="img-fluid" alt="Event">
            <div class="ev_s_control evn_card">
                <div class="card m_product ev_event_card radius-8 p-20">
                   <div class="ev_head">
                     <div class="ev_left">
                        <span class="text-primary"><?php echo e(date('l', strtotime($event->event_date))); ?>, <?php echo e(date('d F Y', strtotime($event->event_date))); ?>, at <?php echo e($event->event_time); ?></span>
                        <h2 class="h5 mb-0"> <?php echo e($event->title); ?></h2>
                        <span><?php echo e($event->location); ?></span>
                     </div>
                     <div class="ev_right">
                        <?php if(in_array(auth()->user()->id, json_decode($event->going_users_id))): ?>
                          <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('event.going',$event->id); ?>')" class="w-100 mb-2 btn btn-primary <?php if(in_array(auth()->user()->id, json_decode($event->going_users_id))): ?> displaynone <?php endif; ?>" id="goingId<?php echo e($event->id); ?>"> <?php echo e(get_phrase('Going')); ?></a>
                        <?php endif; ?>
                        

                          <?php if(in_array(auth()->user()->id, json_decode($event->interested_users_id))): ?>
                           <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('event.interested',$event->id); ?>')" class="w-100 mb-2 no_btn btn btn-primary <?php if(in_array(auth()->user()->id, json_decode($event->interested_users_id))): ?> displaynone <?php endif; ?>" id="interestedId<?php echo e($event->id); ?>"><i class="fa-solid fa-star me-2"></i> <?php echo e(get_phrase('Interested')); ?></a>
                          <?php endif; ?>
                        
                     </div>
                   </div>

                    <div class="event-tab ev_tabs ct-tab ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="about-tab" data-bs-toggle="tab"
                                    data-bs-target="#about" type="button" role="tab" aria-controls="about"
                                    aria-selected="true"><?php echo e(get_phrase('About')); ?></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="discussion-tab" data-bs-toggle="tab"
                                    data-bs-target="#discussion" type="button" role="tab"
                                    aria-controls="discussion" aria-selected="false"><?php echo e(get_phrase('Discussion')); ?></button>
                            </li>
                        </ul>
                         <div class="ns_share">
                            <?php  $postOfThisEvent = \App\Models\Posts::where('publisher','event')->where('publisher_id',$event->id)->first();?>
                            <?php if($postOfThisEvent != null): ?>
                                <div class="post-controls dropdown dotted">
                                    <a class="nav-link dropdown-toggle ms-auto text-end m-0 p-0 w-25" href="#" id="navbarDropdown"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                       
                                            <li>
                                                <a href="javascript:void(0)" onclick="showCustomModal('<?php echo e(route('load_modal_content', ['view_path' => 'frontend.main_content.share_post_modal', 'post_id' => $postOfThisEvent->post_id] )); ?>', '<?php echo e(get_phrase('Share Event')); ?>');" class="dropdown-item "> <?php echo e(get_phrase('Share')); ?></a>
                                            </li>
                                        
                                            
                                        
                                    </ul>
                                </div>
                                <?php endif; ?>
                         </div>
                    </div>
                </div> <!-- Card End -->

            </div>
        </div>
        <div class="row mt-12">
            <div class="col-lg-12 col-sm-12">
                <div class="tab-content card m_product ev_event_card radius-8 p-3 " id="myTabContent">
                    <div class="tab-pane fade show active" id="about" role="tabpanel"
                        aria-labelledby="about-tab">
                        <h2 class="h6"><?php echo e(get_phrase('Details')); ?></h2>
                        <p>
                            <?php echo script_checker($event->description, false); ?>
                        </p>
                    </div> <!-- Tab Pane End -->

                    

                    <div class="tab-pane fade" id="discussion" role="tabpanel"  aria-labelledby="discussion-tab">
                        
                        <?php echo $__env->make('frontend.main_content.create_post', ['event_id' => $event->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="discuss-wrap">
                            <h3 class="h6 my-3"><?php echo e(get_phrase('Recent Activity')); ?></h3>
                            <?php echo $__env->make('frontend.main_content.posts',['type'=>'user_post'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div><!-- Tab Pane End -->
                </div> <!-- Tab Content End -->
            </div>
            
        </div>
    </div>

<!-- Content Section End -->

<?php echo $__env->make('frontend.events.event_invite_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.main_content.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Downloads\Compressed\Piscine de Romain Avril\resources\views/frontend/events/single_event.blade.php ENDPATH**/ ?>