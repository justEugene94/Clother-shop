<div class="contact">
    <div class="container">
        <h3>Добавление новой статьи</h3><br><br>

        <form action="{{ (isset($blog->id)) ? route('blogs.update', ['id'=>$blog->id]) : route('blogs.store') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-row">
                <div class="form-group">
                    <label for="title">
                        <span> Название статьи: </span>
                    </label>
                    <input type="text" class="form-control" name="title" value="{{ isset($blog->title) ? $blog->title : old('title') }}" placeholder="Введите название" autofocus="">
                </div>

            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>
                        <span> Краткое описание: </span>
                    </label>
                    <textarea name="desc" class="form-control" id="editor" autofocus="">{{ isset($blog->desc) ? $blog->desc : old('desc') }}</textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="text">
                        <span> Статья: </span>
                    </label>
                    <textarea name="text" class="form-control" id="editor2" autofocus="">{{ isset($blog->text) ? $blog->text : old('text') }}</textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    @if(isset($blog->image))
                        <label>
                            <span>Изображение материала:</span>
                        </label>

                        <img src="{{ '/images/'.$blog->image }}" alt="00212" title="00212" style="width:400px" />
                        <input type="hidden" class="form-control-file" name="old_image" value="{{ $blog->image }}">

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

            @if(isset($blog->id))
                <input type="hidden" name="_method" value="PUT">

            @endif

            <button type="submit" class="btn btn-success">{{ isset($blog) ? 'Изменить статью' : 'Добавить новую статью' }}</button>


        </form>

        <script>
            CKEDITOR.replace( 'editor' );
            CKEDITOR.replace( 'editor2' );
        </script>


    </div>
</div>