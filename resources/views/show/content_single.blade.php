
<div class="product">
    <div class="container">
        <div class="col-md-9 product-price1">
                <div class="col-md-5 single-top">
                    <div class="flexslider">
                        <img src="{{ asset('images/'. $good->image) }}" />
                    </div>
                    <!-- FlexSlider -->
                    <script defer src="{{ asset('js/jquery.flexslider.js') }}"></script>
                    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}" type="text/css" media="screen" />


                </div>
                <div class="col-md-7 single-top-in simpleCart_shelfItem">
                    <form action="{{ route('addCart') }}" method="post">
                        <div class="single-para ">
                            <h4>{{ $good->name }}</h4>

                            <h5 class="item_price">$ {{ $good->price }}</h5>
                            {!! $good->desc !!}
                            <div class="available">
                                <ul>
                                    <li>Color
                                        <select id="colorId" name="color_id">
                                            @foreach($colors as $color)
                                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                                            @endforeach
                                        </select></li>
                                    <li class="size-in">Size
                                        <select id="sizeId" name="size_id">
                                            @foreach($sizes as $size)
                                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                                            @endforeach
                                        </select></li>
                                    <div class="clearfix"> </div>
                                </ul>
                            </div>

                            <input type="hidden" id='goodImg' name="good_img" value="{{ $good->image }}">
                            <input type="hidden" id='goodId' name="good_id" value="{{ $good->id }}">
                            <input type="hidden" id='goodPrice' name="price" value="{{ $good->price }}">
                            <input id='tok' type="hidden" name="_token" value="{{ csrf_token() }}">

                            <button type="submit" id='add-to-cart' class="btn btn-primary">Добавить в корзину</button>

                        </div>
                    </form>
                </div>


            <script>
                jQuery(document).ready(function(){
                    $('form').submit(function (e) {
                       e.preventDefault();
                       var name = $('.single-para > h4').text();
                       var img = $('#goodImg').val();
                       var id = $('#goodId').val();
                       var tok = $('#tok').val();
                       var price = $('#goodPrice').val();
                       var color_id = $('#colorId').val();
                       var size_id= $('#sizeId').val();

                       $.ajax({
                           url: '/addcart',
                           method:'POST',
                           data: {'_token': tok,
                               'good_id': id,
                               'name': name,
                               'img': img,
                               'price': price,
                               'color_id': color_id,
                               'size_id': size_id,
                                },

                           success: function (res) {
                                if(!res) alert('Ошибка');
                                alert('Товар добавлен в корзину');
                                $('.simpleCart_total').text(res);
//
//                                console.log(res);
                           },
//                           error: function () {
//                                alert('!Error!');
//                           }
                       });
                    });
                });

            </script>
            <div class="clearfix"> </div>
            <!---->
            <br>
            <div class="cd-tabs">
                <nav>
                    <ul class="cd-tabs-navigation">
                        <li><a data-content="fashion"  href="#0">Описание </a></li>
                        <li><a data-content="cinema" href="#0" >Краткая информация</a></li>
                        <li><a data-content="television" href="#0" class="selected ">Отзывы ({{ count($good->reviews) }})</a></li>

                    </ul>
                </nav>
                <ul class="cd-tabs-content">
                    <li data-content="fashion">
                        <div class="facts">
                            {!! $good->text !!}
                            <ul>
                                <li>Research</li>
                                <li>Design and Development</li>
                                <li>Porting and Optimization</li>
                                <li>System integration</li>
                                <li>Verification, Validation and Testing</li>
                                <li>Maintenance and Support</li>
                            </ul>
                        </div>

                    </li>
                    <li data-content="cinema">
                        <div class="facts1">

                            <div class="color"><p>Цвета</p>
                                <span >{{ $colors->implode('name', ', ') }}</span>
                                <div class="clearfix"></div>
                            </div>
                            <div class="color">
                                <p>Размер</p>
                                <span >{{ $sizes->implode('size', ', ') }}</span>
                                <div class="clearfix"></div>
                            </div>

                        </div>

                    </li>
                    <li data-content="television" class="selected">
                        <div class="comments-top-top">
                            @foreach($good->reviews as $good->review)
                                <div class="top-comment-left">
                                    <img class="img-responsive" src="{{ asset('images/co.png') }}" alt="">
                                </div>
                                <div class="top-comment-right">
                                    <h6><a href="#">{{ $good->review->name }}</a> - {{ $good->review->created_at->format('Y-m-d') }}</h6>

                                    {{ $good->review->text }}
                                </div>
                            @endforeach
                            <div class="clearfix"> </div>
                            <a class="add-re" href="#">Оставить отзыв</a>
                        </div>

                    </li>

                    <div class="clearfix"></div>
                </ul>
            </div>

            <script type="text/javascript">
                jQuery(function () {
                    var menu_ul = $('.cd-tabs-content > li'), menu_a = $('.cd-tabs-navigation > li > a');
                    menu_a.click(function (e) {
                        e.preventDefault();
                        if(!$(this).hasClass('selected')){
                            menu_a.removeClass('selected');
                            menu_ul.removeClass('selected');
                            $('[data-content=' + $(this).data('content') + ']').addClass('selected');
                        } else {
                            $(this).removeClass('selected');
                        }
                    })
                });
            </script>
        </div>

        <div class="clearfix"> </div>
    </div>
</div>

