<div class="col-md-9 product1">

        @foreach($goods as $k=>$good)

            {{--{{ ($k == 0 || $k%3 ==0) ? '<div class=" bottom-product">' : ''}}--}}

            <div class="col-md-4 bottom-cd simpleCart_shelfItem">
                <div class="product-at ">
                    <a href="{{ route('product', ['id'=>$good->id]) }}"><img class="img-responsive" src="{{ asset('images/' . $good->image) }}" alt="">
                        <div class="pro-grid">
                            <span class="buy-in">Купить</span>
                        </div>
                    </a>
                </div>
                <p class="tun">{!!  $good->desc !!}</p>
                <a href="{{ route('product', ['id'=>$good->id]) }}" class="item_add" ><p class="number item_price"><i> </i>${{ $good->price }}</p></a>
            </div>

            {{--{{ $k%3 == 2 ? '</div>' : '' }}--}}

        @endforeach

</div>

<div class="clearfix"> </div>
