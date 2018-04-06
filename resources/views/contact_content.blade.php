<div class="contact">

    <div class="container">
        <h1>Свяжитесь с нами</h1>
        <div class="contact-form">

            <div class="col-md-8 contact-grid">
                <form method="post" action="{{ route('contact') }}">

                    {{ csrf_field() }}

                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Ваше имя" autofocus="">

                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Ваш адрес почты" autofocus="">
                    <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Тема" autofocus="">

                    <textarea name="message" cols="77" rows="6" autofocus="">{{ old('message') }}</textarea>
                    <div class="send">
                        <input type="submit" value="Отправить">
                    </div>
                </form>
            </div>
            <div class="col-md-4 contact-in">

                <div class="address-more">
                    <h4>Адресс</h4>
                    <p>The company name,</p>
                    <p>Lorem ipsum dolor,</p>
                    <p>Glasglow Dr 40 Fe 72. </p>
                </div>
                <div class="address-more">
                    <h4>Адресс2</h4>
                    <p>Tel:1115550001</p>
                    <p>Fax:190-4509-494</p>
                    <p>Email:<a href="mailto:contact@example.com"> contact@example.com</a></p>
                </div>

            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

</div>