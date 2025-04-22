{{-- @php $user_info = Auth()->user() @endphp
@auth

    @include('frontend.story.index')
    @include('frontend.main_content.create_post')    

@endauth

<div id="timeline-posts">
    @include('frontend.main_content.posts',['type'=>'user_post'])
</div>

@include('frontend.main_content.scripts') --}}


<!-- resources/views/frontend/index.blade.php -->
<div id="timeline">
    <!-- Stories -->
    @if ($stories->isNotEmpty())
        <div class="stories">
            @foreach ($stories as $story)
                <div class="story">
                    <img src="{{ $story->user->photo }}" alt="{{ $story->user->name }}">
                    <p>{{ $story->user->name }}</p>
                    <!-- Contenu de la story -->
                </div>
            @endforeach
        </div>
    @endif

    <!-- Posts -->
    <div id="posts-container">
        @foreach ($posts as $post)
        @php
            // dd($post->getUser->photo);
        @endphp
        <div class="post" data-post-id="{{ $post->post_id }}">
            @if ($post->getUser)
                <img src="{{ get_user_image($post->user_id, 'optimized') }}" alt="{{ $post->getUser->name ?? 'Utilisateur inconnu' }}">
                <h3>{{ $post->getUser->name ?? 'Utilisateur inconnu' }}</h3>
            @else
                <img src="default.jpg" alt="Utilisateur inconnu">
                <h3>Utilisateur inconnu</h3>
            @endif
            <p>{{ $post->content }}</p>
            <span>{{ $post->created_at ? $post->created_at->diffForHumans() : 'Date inconnue' }}</span>
        </div>
        @endforeach
    </div>

    <!-- Skeleton Loader -->
    <div id="skeleton-loader" style="display: none;">
        @for ($i = 0; $i < 5; $i++)
            <div class="skeleton-post">
                <div class="skeleton-avatar"></div>
                <div class="skeleton-content">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
            </div>
        @endfor
    </div>
</div>

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/locale/fr.min.js"></script>
    <script>
        let lastPostId = {{ $posts->last()->post_id ?? 0 }};
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
@endsection

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
</style>