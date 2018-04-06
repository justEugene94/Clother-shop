<div class="contact">
    <div class="container">
        <h3>Добавление нового администратора</h3><br><br>

        <form action="{{ (isset($user->id)) ? route('users.update', ['id'=>$user->id]) : route('users.store') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">
                        <span> Имя: </span>
                    </label>
                    <input type="text" class="form-control" name="name" value="{{ isset($user->name) ? $user->name : old('name') }}" placeholder="Введите имя" autofocus="">
                </div>

                <div class="form-group col-md-6">
                    <label for="login">
                        <span> Никнейм: </span>
                    </label>
                    <input type="text" class="form-control" name="login" value="{{ isset($user->login) ? $user->login : old('login') }}" placeholder="Введите никнейм" autofocus="">
                </div>

            </div>


            <div class="form-row">
                <div class="form-group">
                    <label for="email">
                        <span> Почта: </span>
                    </label>
                    <input type="email" class="form-control" name="email" value="{{ isset($user->email) ? $user->email : old('email') }}" placeholder="Введите почту" autofocus="">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password">
                        <span> Пароль: </span>
                    </label>
                    <input type="password" class="form-control" name="password" value="" placeholder="Введите пароль" autofocus="">
                </div>

                <div class="form-group col-md-6">
                    <label for="login">
                        <span> Повторите пароль: </span>
                    </label>
                    <input type="password" class="form-control" name="password_confirmation" value="" placeholder="Повторите пароль" autofocus="">
                </div>

            </div>

            @if(isset($user->id))
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="old_pass" value="{{ $user->password }}">
            @endif

            <button type="submit" class="btn btn-success">{{ 'Сохранить' }}</button>


        </form>

    </div>
</div>