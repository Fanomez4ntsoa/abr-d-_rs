<div class="modal fade show" id="invitedPersonForEvent" tabindex="-1"
aria-labelledby="invitedPerson" aria-modal="true" role="dialog">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header text-center">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo e(get_phrase('Invite')); ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"><i class="fa fa-times"></i></button>
        </div>
        <div class="modal-body p-3">
            <div class="gr-search">
                <form action="#" class="mb-4">
                    <input type="text" onkeyup="searchUserForInviting(this, '#friendsForInvitingEvent')" class="bg-secondary rounded"
                        placeholder="Search">
                    <span class="i fa fa-search"></span>
                </form>
            </div>
            <h6><?php echo e(get_phrase('Selected users')); ?></h6>
            <form class="ajaxForm" action="<?php echo e(route('event.invition')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="event_id" value="<?php echo e($event->id); ?>" id="">
                    <div class="invite-friends" id="invitedEventUser">
                    
                    </div>
                <div class="group-suggestion mt-3" id="friendsForInvitingEvent">
                    <h6><?php echo e(get_phrase('Suggestion')); ?></h6>
                    <div class="sugest-wrap">
                        <?php $users = \App\Models\User::orderBy('id','DESC')->limit('7')->get(); ?>
                        <?php echo $__env->make('frontend.events.invite',['users'=>$users], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-block w-100 btn-lg"><?php echo e(get_phrase('Invite Event')); ?></button>
            </form>
        </div>

    </div>
</div>
</div>



<?php echo $__env->make('frontend.events.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Downloads\Compressed\Piscine de Romain Avril\resources\views/frontend/events/event_invite_modal.blade.php ENDPATH**/ ?>