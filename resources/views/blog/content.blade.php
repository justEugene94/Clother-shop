<div class="blog">
    <div class="container">
        <h1>Blog</h1>

        @foreach($blogs as $k=>$blog)

            @if($k == 0 || $k%2 == 0)
                <div class="blog-top">
            @endif

                    <div class="col-md-6 grid_3">
                        <h3><a href="{{ route('blog', ['id'=>$blog->id]) }}">{{ $blog->title }}</a></h3>
                        <a href="{{ route('blog', ['id'=>$blog->id]) }}"><img src="{{ asset('images/' . $blog->image) }}" class="img-responsive" alt=""/></a>

                        <div class="blog-poast-info">
                            <ul>
                                <li><span><i class="date"> </i>{{ $blog->created_at->format('Y-m-d') }}</span></li>
                                <li><a class="p-blog" href="#"><i class="comment"> </i>{{ count($blog->comments) }} {{ Lang::choice('ru.comments', count($blog->comments)) }}</a></li>
                            </ul>
                        </div>
                        {!! $blog->desc !!}
                        <div class="button"><a href="{{ route('blog', ['id'=>$blog->id]) }}">Читать далее</a></div>
                    </div>

            @if(($k+1)%2 == 0)
                        <div class="clearfix"> </div>
                </div>
            @endif

        @endforeach

    </div>
</div>