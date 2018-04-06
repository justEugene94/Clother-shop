<div class="contact">

    <div class="container">
        <h1>Введите данные для оплаты</h1>
        <div class="contact-form">

            <div class="contact-grid">
                <form method="post" action="{{ route('purchase') }}">

                    {{ csrf_field() }}

                    <div class="col-md-6">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Ваше имя" autofocus="">
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="surname" value="{{ old('surname') }}" placeholder="Ваша фамилия" autofocus="">
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="email" value="{{ old('email') }}" placeholder="Ваш адрес почты" autofocus="">
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="bank_card" value="{{ old('bank_card') }}" placeholder="Номер банковской карты" autofocus="">
                    </div>

                    <div class="col-md-12">
                        <div class="send">
                            <input type="submit" value="Отправить">
                        </div>
                    </div>
                </form>
            </div>

            <div class="clearfix"> </div>
        </div>
    </div>

</div>