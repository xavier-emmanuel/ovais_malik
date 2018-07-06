@extends('layouts.admin_master')

@section('stylesheets')
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/plugins/ckeditor/contents.css' : '/plugins/ckeditor/contents.css') }}">
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/plugins/bootstrap-tags-input/bootstrap-tagsinput.css' : '/plugins/bootstrap-tags-input/bootstrap-tagsinput.css') }}">
  <style>
    .error {
      color: #b90504;
      border-color: #b90504;
    }

    label.error {
      font-size: 80%;
      font-weight: 400;
    }

    .category-name {
      color: #495057 !important;
    }
  </style>
@endsection

@section('content')
  <section class="admin-section">
    <form id="frm-edit-blog" method="post" enctype="multipart/form-data" name="frm_edit_blog">
      {{ csrf_field() }}
      <input type="hidden" value="{{ $blogs->id }}" name="hdn_blog_id">
      <input type="hidden" value="{{ $blogs->slug }}" name="hdn_blog_slug">
      <input type="hidden" value="{{ $blogs->image }}" name="hdn_blog_image">
      <input type="hidden" value="{{ $blogs->published }}" name="hdn_blog_published">
      <div class="blog-wrapper">
        <div class="box box-content-1">
          <div class="form-group" id="div">
            <label for="edit-blog-title">
              Title:
              <span>*</span>
            </label>
            <input type="text" class="form-control" id="edit-blog-title" name="blog_title" value="{{ $blogs->title }}" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="add-blog-description">
              Short Description:
              <span>*</span>
            </label>
            <textarea class="form-control" name="blog_description" id="edit-blog-description" cols="30" rows="3" autocomplete="off" required>{{ $blogs->description }}</textarea>
          </div>

          <div class="form-group">
            <label for="edit-blog-category">
              Category:
              <span>*</span>
            </label>
            <select name="blog_category" id="edit-blog-category" class="form-control">
              <option selected disabled>Select category</option>
              @foreach($categories as $category)
              <option value="{{ $category->id }}" class="category-name" @if($category->id == $blogs->category_id)
                selected
              @endif>{{ $category->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="edit-blog-content">
              Content:
              <span>*</span>
            </label>
            <textarea name="blog_content" id="blog_content" cols="30" rows="10" autocomplete="off" required>{{ $blogs->content }}</textarea>
          </div>
        </div>

        <div class="box box-content-2">
          <div class="form-group">
            <label for="edit-blog-tags">Tags:</label>
            <input type="text" id="edit-blog-tags" name="blog_tags" class="form-control" value="{{ $blogs->tags }}" data-role="tagsinput" autocomplete="off"></div>

          <div class="form-group">
            <label for="edit-blog-featured-image">
              Featured Image:
              <span>*</span>
            </label>
            <input type="file" id="edit-blog-featured-image" name="blog_featured_image" class="form-control-file"></div>

          <div class="form-group">
            <label for="">Preview:</label>
            <div class="preview-image-wrapper">
              <img src="{{ asset(App::environment('production') ? 'public/uploads/admin-blogs/original/'.$blogs->image : 'uploads/admin-blogs/original/'.$blogs->image) }}" id="image-preview" alt=""></div>
          </div>

          <div class="text-center">
            <a href="/admin-blog/preview/{{ $blogs->slug }}" target="_blank" class="btn btn-outline btn-preview"> <i class="fas fa-eye"></i>
              &nbsp; Preview
            </a>
            <button type="submit" class="btn btn-outline btn-update"> <i class="fas fa-save"></i>
              &nbsp; Update
            </button>
          </div>
          @if($blogs->published == 0)
          <hr>
          <div class="text-center">
            <button type="button" class="btn btn-outline btn-publish"> <i class="fas fa-newspaper"></i>
              &nbsp; Publish
            </button>
          </div>
          @endif
        </div>
      </div>
    </form>
  </section>

@endsection

@section('scripts')
  <script src="{{ asset(App::environment('production') ? '/public/plugins/ckeditor/ckeditor.js' : '/plugins/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/plugins/ckeditor/config.js' : '/plugins/ckeditor/config.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/plugins/ckeditor/styles.js' : '/plugins/ckeditor/styles.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/plugins/bootstrap-tags-input/bootstrap-tagsinput.min.js' : '/plugins/bootstrap-tags-input/bootstrap-tagsinput.min.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/plugins/jquery-validation/jquery.validate.min.js' : '/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/js/pages/admin_blog.js' : '/js/pages/admin_blog.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/plugins/jquery-validation/dist/additional-methods.js' : '/plugins/jquery-validation/dist/additional-methods.js') }}"></script>
  <script>
    CKEDITOR.replace('blog_content', {
      filebrowserUploadUrl: '{{ route('upload',['_token' => csrf_token() ]) }}',
      filebrowserBrowseUrl: '{{ asset(App::environment('production') ? '/public/plugins/ckfinder/ckfinder.html' : '/plugins/ckfinder/ckfinder.html') }}'
    });

    $(document).ready(function () {
      $('#edit-blog-tags').tagsinput();
    });
  </script>
@endsection