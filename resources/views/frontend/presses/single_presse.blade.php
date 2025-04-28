@php
    $comments = DB::table('comments')->join('users', 'comments.user_id', '=', 'users.id')->where('comments.is_type', 'presse')->where('comments.id_of_type', $presse->id)->where('comments.parent_id', 0)->select('comments.*', 'users.name', 'users.photo')->orderBy('comment_id', 'DESC')->take(1)->get();                                                                
    $total_comments = DB::table('comments')->where('comments.is_type', 'presse')->where('comments.id_of_type', $presse->id)->where('comments.parent_id', 0)->get()->count();
@endphp

<div class="single-wrap">
    <div class="sblog_feature bg-white radius-8">
        <div class="blog-feature " style="min-height: 0px; background-image: url('{{ get_presse_image($presse->thumbnail,'coverphoto') }}')">
            <div class="blog-head">
                <div class="d-flex align-items-center">
                    <img src="{{ get_user_image($presse->user_id,'optimized') }}" class="user-round user_image_show_on_modal" alt="">
                    <div class="ava-info ms-2">
                        <h6 class="mb-0"><a href="{{ route('user.profile.view',$presse->user->id) }}">{{ $presse->user->name }}</a></h6>
                        <small>{{ $presse->created_at->diffForHumans()  }}</small>
                    </div>
                </div>
               
            </div>
        </div><!--  Presse Cover End -->
        <div class="sm_bottom">
             <div>
                <a href="#"> {{ $presse->created_at->format("d-M-Y") }} </a>
               <h1>{{ $presse->title }}</h1>
             </div>
            <div class="bhead-meta">
                <span>{{ $total_comments }} {{ get_phrase('Comments') }}</span>
                <span>{{ count(json_decode($presse->view)) }} {{ get_phrase('Views') }}</span>
            </div>
        </div>
    </div>
    <div class="row mt-12 ">
        <div class="col-lg-12">
            <div class="card border-none p-3 radius-8 nblog_details blog-details">
                @php echo script_checker($presse->description, false); @endphp
                <div class="blog-footer">
                    <div class="post-share justify-content-between align-items-center border-bottom pb-3">
                        <div class="post-meta ">
                            <h4 class="h3">{{get_phrase('tags:')}}</h4>
                            @php
                                $tags = json_decode($presse->tag, true);
                            @endphp
                            
                            @if(is_array($tags))
                                @foreach ($tags as $tag )
                                    <a href="#"><span class="badge common_btn_3 mt-1">#{{ $tag }}</span></a>
                                @endforeach
                            @endif
                        </div>
                        <div class="p-share d-flex align-items-center mt-20">
                            <h3 class="h6">{{ get_phrase('Share') }}: </h3>
                            <div class="social-share ms-2">
                                <ul>
                                    @foreach ($socailshare as $key => $value )
                                        <li><a href="{{ $value }}" target="_blank"><i class="fa-brands fa-{{ $key }}"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Comment Start -->
                    <div class="user-comments  bg-white" id="user-comments-{{$presse->id}}">
                        <div class="comment-form nBlog_user d-flex p-3 bg-secondary">
                            <img src="{{get_user_image(Auth()->user()->photo, 'optimized')}}" alt="" class="rounded-circle h-39 img-fluid " width="40px">
                            <form action="javascript:void(0)" class="w-100 ms-2" method="post">
                                <input class="form-control py-3" onkeypress="postComment(this, 0, {{$presse->id}}, 0,'presse');" rows="1" placeholder="Écrire des commentaires">
                            </form>
                        </div>
                        <ul class="comment-wrap pt-3 pb-0 list-unstyled" id="comments{{$presse->id}}">
                            @include('frontend.main_content.comments',['comments'=>$comments,'post_id'=>$presse->id,'type'=>"presse"])
                        </ul>
                        @if($comments->count() < $total_comments) 
                            <a class="btn p-3 pt-0" onclick="loadMoreComments(this, {{$presse->id}}, 0, {{$total_comments}},'presse')">{{get_phrase('View Comment')}}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('frontend.main_content.scripts')
@include('frontend.initialize')


