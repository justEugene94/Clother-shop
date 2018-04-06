<div class="contact">
    <div class="container">
            <h3>Добавление нового материала</h3><br><br>

                    <form action="{{ (isset($good->id)) ? route('goods.update', ['id'=>$good->id]) : route('goods.store') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                    <label for="name">
                                        <span> Название товара: </span>
                                    </label>
                                    <input type="text" class="form-control" name="name" value="{{ isset($good->name) ? $good->name : old('name') }}" placeholder="Введите название" autofocus="">
                            </div>

                            <div class="form-group col-md-4">
                                    <label for="price">
                                        <span> Цена товара: </span>
                                    </label>
                                    <input type="text" class="form-control" name="price" value="{{ isset($good->price) ? $good->price : old('price') }}" placeholder="Введите стоимость" autofocus="">
                            </div>

                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-4">

                                <label>
                                    <span>Бренд:</span>
                                </label>
                                <select class="form-control" name="brand_id">
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ (isset($good->brand_id) && $good->brand_id == $brand->id) ? 'selected' : '' }}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group col-md-4">
                                    <label>
                                        <span>Категория:</span>
                                    </label>
                                    <select class="form-control" name="goodcat_id">
                                        @foreach($goodcats as $goodcat)
                                            <option value="{{ $goodcat->id }}" {{ (isset($good->goodcat_id) && $good->goodcat_id == $goodcat->id) ? 'selected' : '' }}>{{ $goodcat->name }}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="form-group col-md-4">
                                    <label>
                                        <span>Для кого:</span>
                                    </label>
                                    <select class="form-control" name="category_id">
                                        @foreach($categorys as $category)
                                            <option value="{{ $category->id }}" {{ (isset($good->category_id) && $good->category_id == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                    <label>
                                        <span> Краткое описание: </span>
                                    </label>
                                    <textarea name="desc" class="form-control" id="editor" autofocus="">{{ isset($good->desc) ? $good->desc : old('desc') }}</textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                    <label for="text">
                                        <span> Описание: </span>
                                    </label>
                                    <textarea name="text" class="form-control" id="editor2" autofocus="">{{ isset($good->text) ? $good->text : old('text') }}</textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                @if(isset($good->image))
                                    <label>
                                        <span>Изображение материала:</span>
                                    </label>

                                    <img src="{{ '/images/'.$good->image }}" alt="00212" title="00212" style="width:400px" />
                                    <input type="hidden" class="form-control-file" name="old_image" value="{{ $good->image }}">

                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>
                                    <span>Изображение:</span>
                                </label>
                                <div class="input-prepend">
                                    <input type="file" name="image" class="form-control-file" data-buttonText="Выберите изображение" data-buttonName="btn-primary" data-placeholder="Файла нет">
                                </div>
                            </div>
                        </div>

                        @if(isset($good->id))
                            <input type="hidden" name="_method" value="PUT">

                        @endif

                        <button type="submit" class="btn btn-success">{{ isset($good) ? 'Изменить товар' : 'Добавить новый товар' }}</button>


                    </form>

        <script>
            CKEDITOR.replace( 'editor' );
            CKEDITOR.replace( 'editor2' );
        </script>


    </div>
</div>