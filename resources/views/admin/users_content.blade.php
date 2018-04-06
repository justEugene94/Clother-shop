<div class="container">
    <div id="main-content" class="column column-offset-20">
        <div class="row grid-responsive">
            <div class="column ">
                <div class="card">
                    <div class="card-title">
                        <h3>Администраторы</h3>
                        <div align="right" class="admin-button">
                            <a href="{{ route('users.create') }}" class="item_add">Добавить нового администратора</a>
                        </div>
                    </div>
                    <div class="card-block">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th align="center">#</th>
                                <th align="center">Имя</th>
                                <th align="center">Почта</th>
                                <th align="center">Логин</th>
                                <th align="center">Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($users))
                                @foreach($users as $user)
                                    <tr>
                                        <th align="center" scope="row">{{ $user->id }}</th>
                                        <td align="center"><a href="{{ route('users.edit',['id'=>$user->id]) }}">{{ $user->name }}</a></td>
                                        <td align="center">{{ $user->email }}</td>
                                        <td align="center">{{ $user->login }}</td>
                                        <td align="center">
                                            <form action="{{ route('users.destroy', ['id'=>$user->id]) }}" class="form-horizontal" method="post">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">Удалить</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>