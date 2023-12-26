<div class="modal fade" id="blogModal" tabindex="-1" aria-labelledby="blogModalLabel" aria-hidden="true">
    <div style="max-width:800px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="blogModalLabel">Add Blog</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('create-blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="">
                        <div class="col">
                            <label for="blogName" class="col-form-label">Post Title:</label>
                            <input type="text" class="@error('title') is-invalid @enderror form-control"
                                name="title" value="{{ old('title') }}">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="col">
                            <label for="category" class="col-form-label">Category:</label>
                            <select name="category_id" class="form-select" aria-label="category">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row align-items-center gap-4">
                            <div class="col">
                                <label for="thumbnail" class="col-form-label">Post Thumbnail:</label>
                                <input type="file" class="form-control" name="thumbnail">
                            </div>
                            <div class="col mt-4">
                                <input type="checkbox" class="form-check-input" name="status" value="1"
                                    id="status">
                                <label class="form-check-label" for="status">Post Status</label>
                            </div>
                        </div>

                        <div class="col">
                            <label for="description" class="col-form-label">Description:</label>
                            <textarea type="textarea" class="tinymce-editor form-control @error('description') is-invalid @enderror" name="description"
                                id="description">{{ old('name') }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-primary">Add Blog</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script type="text/javascript">
    tinymce.init({
        selector: 'textarea.tinymce-editor',
        height: 250,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount', 'image'
        ],
        toolbar: 'menubar | undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help | wordcount',
        content_css: '//www.tiny.cloud/css/codepen.min.css'
    });
</script>
