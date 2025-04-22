


<!-- resources/views/frontend/index.blade.php -->
<div id="timeline">
    <!-- Stories -->
    <?php if($stories->isNotEmpty()): ?>
        <div class="stories">
            <?php $__currentLoopData = $stories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="story">
                    <img src="<?php echo e($story->user->photo); ?>" alt="<?php echo e($story->user->name); ?>">
                    <p><?php echo e($story->user->name); ?></p>
                    <!-- Contenu de la story -->
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <!-- Posts -->
    <div id="posts-container">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            // dd($post->getUser->photo);
        ?>
        <div class="post" data-post-id="<?php echo e($post->post_id); ?>">
            <?php if($post->getUser): ?>
                <img src="<?php echo e(get_user_image($post->user_id, 'optimized')); ?>" alt="<?php echo e($post->getUser->name ?? 'Utilisateur inconnu'); ?>">
                <h3><?php echo e($post->getUser->name ?? 'Utilisateur inconnu'); ?></h3>
            <?php else: ?>
                <img src="default.jpg" alt="Utilisateur inconnu">
                <h3>Utilisateur inconnu</h3>
            <?php endif; ?>
            <p><?php echo e($post->content); ?></p>
            <span><?php echo e($post->created_at ? $post->created_at->diffForHumans() : 'Date inconnue'); ?></span>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- Skeleton Loader -->
    <div id="skeleton-loader" style="display: none;">
        <?php for($i = 0; $i < 5; $i++): ?>
            <div class="skeleton-post">
                <div class="skeleton-avatar"></div>
                <div class="skeleton-content">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/locale/fr.min.js"></script>
    <script>
        let lastPostId = <?php echo e($posts->last()->post_id ?? 0); ?>;
        let isLoading = false;

        function loadMorePosts() {
            if (isLoading) return;
            isLoading = true;

            document.getElementById('skeleton-loader').style.display = 'block';

            fetch(`/timeline/posts?last_post_id=${lastPostId}`, {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                const postsContainer = document.getElementById('posts-container');
                data.posts.forEach(post => {
                    const postElement = document.createElement('div');
                    postElement.className = 'post';
                    postElement.dataset.postId = post.post_id;
                    postElement.innerHTML = `
                        <img src="${post.user.photo || 'default.jpg'}" alt="${post.user.name || 'Utilisateur inconnu'}">
                        <h3>${post.user.name || 'Utilisateur inconnu'}</h3>
                        <p>${post.content}</p>
                        <span>${moment(post.created_at).fromNow()}</span>
                    `;
                    postsContainer.appendChild(postElement);
                });

                lastPostId = data.posts.length ? data.posts[data.posts.length - 1].post_id : lastPostId;
                isLoading = false;
                document.getElementById('skeleton-loader').style.display = 'none';

                if (!data.has_more) {
                    window.removeEventListener('scroll', handleScroll);
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                isLoading = false;
                document.getElementById('skeleton-loader').style.display = 'none';
            });
        }

        function handleScroll() {
            if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 500) {
                loadMorePosts();
            }
        }

        window.addEventListener('scroll', handleScroll);
    </script>
<?php $__env->stopSection(); ?>

<style>
.skeleton-post {
    display: flex;
    margin: 10px 0;
}
.skeleton-avatar {
    width: 50px;
    height: 50px;
    background: #e0e0e0;
    border-radius: 50%;
    animation: pulse 1.5s infinite;
}
.skeleton-content {
    flex: 1;
    margin-left: 10px;
}
.skeleton-line {
    height: 20px;
    background: #e0e0e0;
    margin: 5px 0;
    animation: pulse 1.5s infinite;
}
@keyframes pulse {
    0% { opacity: 1; }
    50% { opacity: 0.5; }
    100% { opacity: 1; }
}
</style><?php /**PATH /home/fanomezantsoa/projet/abr-d-_rs/resources/views/frontend/main_content/index.blade.php ENDPATH**/ ?>