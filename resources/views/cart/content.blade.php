<div class="check">
    <h1>Товары в корзине ({{ Session::get('goods.qty', 0) }})</h1>
    <div class="col-md-9 cart-items">



        @if(isset($goodsCart))

            @foreach($goodsCart as $goodCart)

                <div class="cart-header">
                    <div align="right" class='del-item' data-id="{{ $goodCart['good_id'] }}"><img src="{{ asset('images/close_1.png') }}" ></div>
                    <div class="cart-sec simpleCart_shelfItem">
                        <div class="cart-item cyc">
                            <img src="{{ asset('images/'. $goodCart['img']) }}" class="img-responsive" alt=""/>
                        </div>
                        <div class="cart-item-info">
                            <h3><a href="{{ route('product', ['id'=>$goodCart['good_id']]) }}">{{ $goodCart['name'] }}</a></h3>
                            <ul class="qty">
                                <li><p>Size : {{ $goodCart['size'] }}</p></li>
                                <li><p>Color : {{ $goodCart['color'] }}</p></li>
                            </ul>

                        </div>
                        <div class="clearfix"></div>

                    </div>
                </div>

            @endforeach

        <script>
            jQuery(document).ready(function ($) {

                $('.del-item').click(function () {

                    var id = $(this).data('id');
                    $(this).parent().fadeOut('slow', function() {
                        $(this).remove();
                    });

                    $.ajax({
                        url: '/deletecart',
                        data: {'id' : id},
                        success: function (res) {
                            $('.simpleCart_total').text(res.cart);
                            $('.qty').text(res.qty);
                            $('.price').text(res.price);
                            alert('Удалено');

                            console.log(res);
                        },
                        error: function () {
                            alert('Ошибка');
                        }
                    });
                });
            });
        </script>


        @else
            <div class="cart-header">
                <div class="cart-sec simpleCart_shelfItem">
                    <h3> Здесь будут отображаться добавленные товары</h3>
                </div>
            </div>


        @endif
    </div>
</div>