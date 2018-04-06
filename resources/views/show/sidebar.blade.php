<div class="col-md-3 product-price">

    @if(isset($goodcats))
        <div class=" rsidebar span_1_of_left">
            <div class="of-left">
                <h3 class="cate">Категории</h3>
            </div>
            <ul class="menu">

                @foreach($goodcats as $goodcat)

                    <li class="item{{ $goodcat->id }}"><a href="{{ route('category', ['cate'=>$sex, 'alias'=>$goodcat->alias])  }}">{{ $goodcat->name }}</a></li>

                @endforeach

            </ul>
        </div>
    @endif


    @if(isset($brands))
        <div class="sellers">
            <div class="of-left-in">
                <h3 class="tag">Бренды</h3>
            </div>
            <div class="tags">
                <ul>
                    @foreach($brands as $brand)
                        <li><a href="{{ isset($alias) ? route('category', ['cate'=>$sex, 'alias'=> $alias,'brand'=>$brand->name]) : route('category', ['cate'=>$sex, 'alias'=> 0,'brand'=>$brand->name]) }}">{{ $brand->name }}</a></li>
                    @endforeach

                    <div class="clearfix"> </div>
                </ul>

            </div>

        </div>
    @endif
    <!---->

</div>