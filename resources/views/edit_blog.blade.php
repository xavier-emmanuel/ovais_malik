@extends('layouts.admin_master')

@section('stylesheets')
  <!-- CKEditor -->
  <link rel="stylesheet" href="{{ asset('/plugins/ckeditor/contents.css') }}">

  <!-- Bootstrap Tags Input -->
  <link rel="stylesheet" href="{{ asset('/plugins/bootstrap-tags-input/bootstrap-tagsinput.css') }}">

  <style>
    .error {
      color: red !important;
      border-color: red !important;
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
      <div class="blog-wrapper">
        <div class="box box-content-1">
          <div class="form-group">
            <label for="edit-blog-title">
              Title:
              <span>*</span>
            </label>
            <input type="text" class="form-control" id="edit-blog-title" name="blog_title" value="{{ $blogs->title }}" required></div>

          <div class="form-group">
            <label for="edit-blog-category">
              Category:
              <span>*</span>
            </label>
            <select name="blog_category" id="edit-blog-category" class="form-control">
              <option selected disabled>Select category</option>
              @foreach($categories as $category)
              <option value="{{ $category->id }}" @if($category->id == $blogs->category_id)
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
            <textarea name="blog_content" id="blog_content" cols="30" rows="10" required>{{ $blogs->content }}</textarea>
          </div>
        </div>

        <div class="box box-content-2">
          <div class="form-group">
            <label for="edit-blog-tags">Tags:</label>
            <input type="text" id="edit-blog-tags" name="blog_tags" class="form-control" value="{{ $blogs->tags }}" data-role="tagsinput"></div>

          <div class="form-group">
            <label for="edit-blog-featured-image">
              Featured Image:
              <span>*</span>
            </label>
            <input type="file" id="edit-blog-featured-image" name="blog_featured_image" class="form-control-file" accept="image/x-png,image/gif,image/jpeg"></div>

          <div class="form-group">
            <label for="">Preview:</label>
            <div class="preview-image-wrapper">
              <img src="/{{ $blogs->image }}" id="image-preview" alt=""></div>
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
  <!-- CKEditor -->
  <script src="{{ asset(App::environment('production') ? '/public/plugins/ckeditor/ckeditor.js' : '/plugins/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/plugins/ckeditor/config.js' : '/plugins/ckeditor/config.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/plugins/ckeditor/styles.js' : '/plugins/ckeditor/styles.js') }}"></script>

  <!--Bootstrap Tags Input -->
  <script src="{{ asset(App::environment('production') ? '/public/plugins/bootstrap-tags-input/bootstrap-tagsinput.min.js' : '/plugins/bootstrap-tags-input/bootstrap-tagsinput.min.js') }}"></script>

  <!-- Jquery Validator -->
  <script src="{{ asset(App::environment('production') ? '/public/plugins/jquery-validation/jquery.validate.min.js' : '/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

  <script src="{{ asset(App::environment('production') ? '/public/js/pages/admin_blog.js' : '/js/pages/admin_blog.js') }}"></script>

  <script>
    CKEDITOR.replace('blog_content');

    $(document).ready(function () {
      $('#edit-blog-tags').tagsinput();
    });
  </script>
@endsection