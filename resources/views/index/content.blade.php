<div class="container">
    <div class="content-top">
        <h1>Категории для мужчин</h1>

                    @foreach($menCats as $k=>$menCat)
                {!! ($k== 0 || $k%3==0) ? '<div class="grid-in">' : '' !!}

                    <div class="col-md-4 grid-top">
                        <a href="{{ route('category', ['categ'=>'men', 'alias'=>$menCat->alias]) }}" class="b-link-stripe b-animate-go  thickbox">
                            <img class="img-responsive" src="{{ asset('images/' . $menCat->image) }}" alt="">
                            <div class="b-wrapper">
                                <h3 class="b-animate b-from-left    b-delay03 ">
                                    <span>{{ $menCat->name }}</span>
                                </h3>
                            </div>
                        </a>

                    </div>
                {!! ($k+1)%3 == 0 ? '<div class="clearfix"> </div></div>' : '' !!}

            @endforeach




    </div>


    <div class="content-top-bottom">

        <h1 align="center"> Категории для женщин </h1>
        @foreach($womenCats as $k=>$womenCat)
            {!! ($k== 0 || $k%3==0) ? '<div class="grid-in">' : '' !!}

            <div class="col-md-4 grid-top">
                <a href="{{ route('category', ['categ'=>'women', 'alias'=>$womenCat->alias]) }}" class="b-link-stripe b-animate-go  thickbox">
                    <img class="img-responsive" src="{{ asset('images/' . $womenCat->image) }}" alt="">
                    <div class="b-wrapper">
                        <h3 class="b-animate b-from-left    b-delay03 ">
                            <span>{{ $womenCat->name }}</span>
                        </h3>
                    </div>
                </a>

            </div>
            {!! $k%3 == 2 ? '<div class="clearfix"> </div></div>' : '' !!}

        @endforeach

    </div>
    <!---->
    <div class="content-bottom">
        <h2 align="center">Бренды</h2>
    </div>
    <div class="content-bottom">
        <ul>
            @foreach($brands as $brand)
                <li><a href="{{ route('category', ['categ'=>'men', 'alias'=>0, 'brand'=>$brand->name]) }}"><img class="img-responsive" src="{{ asset('images/' . $brand->image) }}" alt=""></a></li>
            @endforeach
            <div class="clearfix"> </div>
        </ul>
    </div>

</div>