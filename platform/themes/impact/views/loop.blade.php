
@if ($posts->count() > 0)
    <div class="blog-container mt-5">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-3 col-sm-6 container-grid" style="margin-bottom: 30px;">
                    <div class="grid-in">
                        <div class="grid-shadow">
                            <div class="hourseitem" style="margin-top: 0;">
                                <div class="blii">
                                    <div class="img">
                                        <img
                                            data-src="{{ RvMedia::getImageUrl($post->image, 'small', false, RvMedia::getDefaultImage()) }}"
                                            src="{{ RvMedia::getImageUrl($post->image, 'small', false, RvMedia::getDefaultImage()) }}"
                                            alt="{{ $post->name }}" class="thumb"
                                            style="border-radius: 0;"></div>
                                    <a href="{{ $post->url }}" title="{{ $post->name }}" class="linkdetail"></a></div>
                            </div>
                            <div class="grid-h" data-mh="blog-post">
                                <div class="blog-title">
                                    <a href="{{ $post->url }}" title="{{ $post->name }}"><h2>{{ $post->name }}</h2></a>

                                </div>
                                <div class="blog-excerpt">
                                    <p>{{ Str::words($post->description, 50) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <br>
    <div class="pagination">
        {!! $posts->appends(request()->query())->links() !!}
    </div>
@endif
