<div class="container">
    <div id="main-content" class="column column-offset-20">
        <div class="row grid-responsive">
            <div class="column ">
                <div class="card">
                    <div class="card-title">
                        <h3>Статьи</h3>
                        <div align="right" class="admin-button">
                            <a href="{{ route('blogs.create') }}" class="item_add">Добавить новую статью</a>
                        </div>
                    </div>
                    <div class="card-block">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Название</th>
                                <th>Краткое Описание</th>
                                <th>Статья</th>
                                <th>Изображение</th>
                                <th>Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($blogs))
                                @foreach($blogs as $blog)
                                    <tr>
                                        <th scope="row">{{ $blog->id }}</th>
                                        <td><a href="{{ route('blogs.edit',['id'=>$blog->id]) }}">{{ $blog->title }}</a></td>
                                        <td>{!! str_limit($blog->desc, 100) !!}</td>
                                        <td>{!! str_limit($blog->text, 100) !!}</td>
                                        <td><img src="{{ asset('images/'. $blog->image) }}" width="200" height="100" /></td>
                                        <td>
                                            <form action="{{ route('blogs.destroy', ['id'=>$blog->id]) }}" class="form-horizontal" method="post">
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