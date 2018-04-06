<div class="container">
    <div id="main-content" class="column column-offset-20">
        <div class="row grid-responsive">
            <div class="column ">
                <div class="card">
                    <div class="card-title">
                        <h3>Товары</h3>
                        <div align="right" class="admin-button">
                            <a href="{{ route('goods.create') }}" class="item_add">Добавить новый товар</a>
                        </div>
                    </div>
                    <div class="card-block">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Название</th>
                                <th>Краткое Описание</th>
                                <th>Описание</th>
                                <th>Цена</th>
                                <th>Изображение</th>
                                <th>Бренд</th>
                                <th>Категория</th>
                                <th>Для кого</th>
                                <th>Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($goods))
                                @foreach($goods as $good)
                                    <tr>
                                        <th scope="row">{{ $good->id }}</th>
                                        <td><a href="{{ route('goods.edit',['id'=>$good->id]) }}">{{ $good->name }}</a></td>
                                        <td>{!! str_limit($good->desc, 100) !!}</td>
                                        <td>{!! str_limit($good->text, 100) !!}</td>
                                        <td>{{ $good->price }}</td>
                                        <td><img src="{{ asset('images/'. $good->image) }}" width="100" height="100" /></td>
                                        <td>{{ $good->brands->name }}</td>
                                        <td>{{ $good->goodcats->name }}</td>
                                        <td>{{ $good->categories->name }}</td>
                                        <td>
                                            <form action="{{ route('goods.destroy', ['id'=>$good->id]) }}" class="form-horizontal" method="post">
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