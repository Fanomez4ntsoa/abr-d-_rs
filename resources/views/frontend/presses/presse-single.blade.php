
@foreach ($presses as $presse )
    <div class="col-12 col-sm-6 col-md-4 col-lg-6 col-xl-4 h-100 my-1 single-item-countable" id="presse-{{ $presse->id }}">
        <article class="single-entry sblog_entry h-100 p-0">
            <a href="{{ route('single.presse',$presse->id) }}">
                <div class="entry-img thumbnail-210-200" style="background-image: url('{{ get_presse_image($presse->thumbnail,'thumbnail') }}')">
                    <span class="date-meta">
                        {{ $presse->created_at->timezone(Auth::check() ? Auth::user()->timezone : 'UTC')->format('d-M-Y') }}
                    </span>                
                </div>
            </a>
            <div class="entry-txt p-8">
                <div class="blog-meta">
                    <span><a href="{{ route('single.presse',$presse->id) }}">{{ $presse->category->name }}</a></span>
                </div>
                <h3 class="h6 ellipsis-line-2"><a href="{{ route('single.presse',$presse->id) }}">{{$presse->title}}</a></h3>
                <div class="d-flex blog-ava">
                    <img src="{{ get_user_image($presse->user_id,'optimized') }}" class="user-round" alt="">
                    <div class="ava-info">
                        <h6><a href="{{ route('user.profile.view',$presse->user->id) }}">{{ $presse->user->name }} </a></h6>
                        <small>{{ $presse->created_at->timezone(Auth::user()->timezone ?? 'UTC')->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
        </article>
    </div> 
@endforeach
