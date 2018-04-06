<div class="header">
    <div class="header-top">
        {{--search panel--}}


            <div class="container">
                @if(isset($menus))
                    {{--<div class="search">--}}
                        {{--<form>--}}
                            {{--<input type="text" value="Search " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">--}}
                            {{--<input type="submit" value="Искать">--}}
                        {{--</form>--}}
                    {{--</div>--}}
                    <div class="header-left">
                        <ul>
                            <li><a  href="{{ route('adminIndex') }}"  >Админка</a></li>

                        </ul>
                        <div class="cart box_1">
                            <a href="{{ route('checkout') }}">
                                <h3> <div class="total">
                                        <span class="simpleCart_total">$ {{ Session::get('goods.price', 0) }} ({{ Session::get('goods.qty', 0) }} Товара)</span></div>
                                    <img src="{{ asset('images/cart.png') }}" alt=""/></h3>
                            </a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                @else

                        <div class="header-left">
                            <ul>
                                <li ><a href="{{ route('logout') }}"  >Выйти</a></li>
                            </ul>
                        </div>
                        <div class="clearfix"> </div>

                @endif
                <div class="clearfix"> </div>
            </div>

    </div>
    <div class="container">
        <div class="head-top">
            <div class="logo">
                <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a>
            </div>
            @if(isset($menus))
                <div class=" h_menu4">
                    <ul class="memenu skyblue">

                        @foreach($menus as $menu)

                            <li><a class="color1" href="{!! $menu->path !!}">{{ $menu->title }}</a></li>

                        @endforeach

                    </ul>
                </div>
            @elseif(isset($adminMenu))
                <div class=" h_menu4">
                    <ul class="memenu skyblue">

                        @foreach($adminMenu as $menu)

                                <li><a class="color1" href="{!! $menu['path'] !!}">{{ $menu['title'] }}</a>
                                    @if(isset($menu['arr']))

                                        <div class="mepanel">
                                            <div class="row">
                                                {{--<div class="col1">--}}
                                                    <div class="h_nav">
                                                        <ul>
                                                            @foreach($menu['arr'] as $m)
                                                            <li><a href="{{ $m['path'] }}">{{ $m['title'] }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            {{--</div>--}}
                                        </div>

                                    @endif
                                </li>

                        @endforeach

                    </ul>
                </div>
            @endif

            <div class="clearfix"> </div>
        </div>
    </div>

</div>


@if(isset($banners))

    <div class="banner">
        <div class="container">
            <script src="{{ asset('js/responsiveslides.min.js') }}"></script>
            <script>
                $(function () {
                    $("#slider").responsiveSlides({
                        auto: true,
                        nav: true,
                        speed: 500,
                        namespace: "callbacks",
                        pager: true,
                    });
                });
            </script>
            <div  id="top" class="callbacks_container">
                <ul class="rslides" id="slider">

                    @foreach($banners as $banner)
                        <li>

                            <div class="banner-text">
                                <h3>{{ $banner->title }}</h3>
                                {!! $banner->desc !!}
                                <a href="{{ route('home') }}">Далее</a>
                            </div>

                        </li>
                    @endforeach

                </ul>
            </div>

        </div>
    </div>

@endif

@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
