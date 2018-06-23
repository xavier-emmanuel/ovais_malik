@extends('layouts.admin_master')

@section('stylesheets')
  <!-- CKEditor -->
  <link rel="stylesheet" href="{{ asset('/plugins/ckeditor/contents.css') }}">

  <!-- Bootstrap Tags Input -->
  <link rel="stylesheet" href="{{ asset('/plugins/bootstrap-tags-input/bootstrap-tagsinput.css') }}">
@endsection

@section('content')
  <section class="admin-section">
    <form id="frm-create-blog" method="post" enctype="multipart/form-data" name="frm_create_blog">
      {{ csrf_field() }}
      <div class="blog-wrapper">
        <div class="box box-content-1">
          <div class="form-group">
            <label for="add-blog-title">
              Title:
              <span>*</span>
            </label>
            <input type="text" class="form-control" id="add-blog-title" name="add_blog_title" required></div>

          <div class="form-group">
            <label for="add-blog-category">
              Category:
              <span>*</span>
            </label>
            <select name="add_blog_category" id="add-blog-category" class="form-control">
              <option selected disabled>Select category</option>
              <option value="1">1 asda</option>
              <option value="2">2 asda</option>
              <option value="3">3 asda</option>
            </select>
          </div>

          <div class="form-group">
            <label for="add-blog-content">
              Content:
              <span>*</span>
            </label>
            <textarea name="add_blog_content" id="add-blog-content" cols="30" rows="10" required></textarea>
          </div>
        </div>

        <div class="box box-content-2">
          <div class="form-group">
            <label for="add-blog-tags">Tags:</label>
            <input type="text" id="add-blog-tags" name="add_blog_tags" class="form-control" data-role="tagsinput"></div>

          <div class="form-group">
            <label for="add-blog-featured-image">
              Featured Image:
              <span>*</span>
            </label>
            <input type="file" id="add-blog-featured-image" name="add_blog_featured_image" class="form-control-file" required></div>

          <div class="form-group">
            <label for="">Preview:</label>
            <div class="preview-image-wrapper">
              <img src="{{ asset('/img/oneiros-web-solutions-logo.png') }}" alt=""></div>
          </div>

          <div class="text-center">
            <a href="#" target="_blank" class="btn btn-outline"> <i class="fas fa-eye"></i>
              &nbsp; Preview
            </a>
            <button type="submit" class="btn btn-outline"> <i class="fas fa-newspaper"></i>
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
  <script src="{{ asset('/plugins/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('/plugins/ckeditor/config.js') }}"></script>
  <script src="{{ asset('/plugins/ckeditor/styles.js') }}"></script>

  <!--Bootstrap Tags Input -->
  <script src="{{ asset('/plugins/bootstrap-tags-input/bootstrap-tagsinput.min.js') }}"></script>

  <!-- Jquery Validator -->
  <script src="{{ asset('/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

  <script>
    CKEDITOR.replace('add-blog-content');

    $(document).ready(function () {
      $('#add-blog-tags').tagsinput();
    });
  </script>
@endsection