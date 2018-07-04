@extends('layouts.admin_master')

@section('stylesheets')
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/plugins/ckeditor/contents.css' : '/plugins/ckeditor/contents.css') }}">
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/plugins/bootstrap-tags-input/bootstrap-tagsinput.css' : '/plugins/bootstrap-tags-input/bootstrap-tagsinput.css') }}">
  <style>
    .error {
      color: red !important;
      border-color: red !important;
    }
    .category-name {
      color: #495057 !important;
    }
  </style>
@endsection

@section('content')
  <section class="admin-section">
    <form id="frm-create-blog" method="post" enctype="multipart/form-data" name="frm_store_blog">
      {{ csrf_field() }}
      <div class="blog-wrapper">
        <div class="box box-content-1">
          <div class="form-group">
            <label for="add-blog-title">
              Title:
              <span>*</span>
            </label>
            <input type="text" class="form-control" id="add-blog-title" name="blog_title" required></div>

          <div class="form-group">
            <label for="add-blog-description">
              Short Description:
              <span>*</span>
            </label>
            <textarea class="form-control" name="blog_description" id="blog-description" cols="30" rows="3" required></textarea>
          </div>

          <div class="form-group">
            <label for="add-blog-category">
              Category:
              <span>*</span>
            </label>
            <select name="blog_category" id="add-blog-category" class="form-control">
              <option selected disabled>Select category</option>
              @foreach($data as $category)
              <option value="{{ $category->id }}" class="category-name">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="add-blog-content">
              Content:
              <span>*</span>
            </label>
            <textarea name="blog_content" id="blog_content" cols="30" rows="10" required></textarea>
          </div>
        </div>

        <div class="box box-content-2">
          <div class="form-group">
            <label for="add-blog-tags">Tags:</label>
            <input type="text" id="add-blog-tags" name="blog_tags" class="form-control" data-role="tagsinput"></div>

          <div class="form-group">
            <label for="add-blog-featured-image">
              Featured Image:
              <span>*</span>
            </label>
            <input type="file" id="add-blog-featured-image" name="blog_featured_image" class="form-control-file" accept="image/x-png,image/gif,image/jpeg" required></div>

          <div class="form-group">
            <label for="">Preview:</label>
            <div class="preview-image-wrapper">
              <img src="{{ asset('/img/photo-preview-frame-icon-by_vexels.png') }}" id="image-preview" alt=""></div>
          </div>

          <div class="text-center">
            <a href="#" target="_blank" class="btn btn-outline"> <i class="fas fa-eye"></i>
              &nbsp; Preview
            </a>
            <button type="submit" class="btn btn-outline btn-publish"> <i class="fas fa-newspaper"></i>
              &nbsp; Publish
            </button>
          </div>
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
  <script src="{{ asset(App::environment('production') ? '/public/js/pages/admin_blog.js' : '/js/pages/admin_blog.js') }}"></script>
  <script>
    CKEDITOR.replace('blog_content', {
      filebrowserUploadUrl: '{{ route('upload',['_token' => csrf_token() ]) }}',
      filebrowserBrowseUrl: '{{ asset(App::environment('production') ? '/public/plugins/ckfinder/ckfinder.html' : '/plugins/ckfinder/ckfinder.html') }}'
    });

    $(document).ready(function () {
      $('#add-blog-tags').tagsinput();
    });
  </script>
@endsection