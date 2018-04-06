<div class="blog">

    <div class="container">
        <div class="blog-top">
            <div class=" grid_3 grid-1">
                <h3><a href="blog_single.html">{{ $blog->title }}</a></h3>
                <a href="blog_single.html"><img src="{{ asset('images/' . $blog->image) }}" class="img-responsive" alt=""/></a>

                <div class="blog-poast-info">
                    <ul>
                        <li><span><i class="date"> </i>{{ $blog->created_at->format('Y-m-d') }}</span></li>
                        <li><a class="p-blog" href="#"><i class="comment"> </i>{{ count($blog->comments) }} {{ Lang::choice('ru.comments', count($blog->comments)) }}</a></li>
                    </ul>
                </div>
                {!! $blog->text !!}
            </div>

            @foreach($comments as $comment)
                <div class="comments-top-top">

                    <div class="top-comment-right">
                        <h5>{{ $comment->name }} </h5>
                        <h6>{{ $comment->created_at->format('M d, Y') }}</h6>
                        <p>{{ $comment->text }}</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            @endforeach

            <div class="single-bottom">

                <h4>Оставить комментарий</h4>
                <form method="post" action="{{ route('blog', ['id'=>$blog->id]) }}">

                    {{ csrf_field() }}


                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Имя" autofocus="">

                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Имеил" autofocus="">

                    <textarea name="text" cols="77" rows="6" autofocus="">{{ old('text') }}</textarea>

                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">

                    <input type="submit" value="Отправить">

                </form>
            </div>
        </div>
    </div>
</div>