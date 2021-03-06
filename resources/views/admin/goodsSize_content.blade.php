<div class="container">
    <div id="main-content" class="column column-offset-20">
        <div class="row grid-responsive">
            <div class="column ">
                <div class="card">
                    <form method="post" action="{{ route('adminSizeEdit') }}">
                        {{ csrf_field() }}

                        <div class="card-title">
                            <h3>Товары</h3>
                            <div align="right" class="admin-button">
                                <button type="submit" class="btn btn-primary">Обновить</button>
                            </div>
                        </div>
                        <div class="card-block">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Товары</th>
                                    @if(!$sizes->isEmpty())
                                        @foreach($sizes as $size)
                                            <th>{{ $size->name . ', ' . $size->size }}</th>
                                        @endforeach
                                    @endif
                                </tr>
                                </thead>

                                <tbody>

                                @if(!$goods->isEmpty())
                                    @foreach($goods as $good)
                                        <tr>

                                            <td>{{ $good->name }}</td>

                                            @foreach($sizes as $size)
                                                <td>
                                                    @if($size->hasGood($good->name))
                                                        <input checked name="{{ $size->id }}[]" type="checkbox" value="{{ $good->id }}" >
                                                    @else
                                                        <input name="{{ $size->id }}[]" type="checkbox" value="{{ $good->id }}" >
                                                    @endif


                                                </td>
                                            @endforeach

                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>

                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
