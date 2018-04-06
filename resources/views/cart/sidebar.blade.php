<div class="col-md-3 cart-total">
    <a class="continue" href="{{ route('home') }}">Продолжить покупки</a>
    <div class="price-details">
        <h4>Количество товаров</h4>
        <p align="center" class="qty">{{ Session::get('goods.qty', 0) }}</p>
        <div class="clearfix"> </div>

    </div>
    <ul class="total_price">
        <li class="last_price"> <h4>Сумма</h4></li>
        <li class="last_price price"><span>{{ Session::get('goods.price', 0) }}</span></li>
        <div class="clearfix"> </div>

    </ul>


    <div class="clearfix"></div>
    @if(Session::get('goods.qty') != 0)
    <a class="order" href="{{ route('purchase') }}">Оплатить</a>
    @endif
    <div class="total-item">
        <h3>Опции</h3>
        <h4>Купоны</h4>
        <a class="cpns" href="#">Применить купоны</a>
        <p><a href="#">Log In</a> Использовать учетную запись связанную с купонами</p>
    </div>
</div>

<div class="clearfix"> </div>