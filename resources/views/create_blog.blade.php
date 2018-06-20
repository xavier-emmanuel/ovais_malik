@extends('layouts.admin_master')

@section('stylesheets')
<link href="{{ asset('/plugins/jQuery-Tags-Input-master/src/jquery.tagsinput.css') }}">
<style type="text/css">
    div.tagsinput {
        width: 100% !important;
    }
</style>
@endsection
@section('content')
    <section class="admin-section">
      <div class="box">
        <div class="row p-t-20">
          <div class="col-lg-8">
            <div class="form-group">
              <label for="title" class="control-label">Title:*</label>
              <input type="text" class="form-control" id="title" name="title" autocomplete="off" required>    
              <hr>    
              <textarea id="content" name="content" required></textarea>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label for="tags" class="control-label">Tags:</label>
              <input type="text" class="form-control" id="tags" name="tags" autocomplete="off">   
              <label for="image" class="control-label">Featured Image:*</label>
              <input type="file" class="form-control" id="image" name="image" autocomplete="off" required>    
              <div class="thumbnail" id="thumbnail_prewiew" hidden>
                <img src="#" id="image_preview" alt="user"></div>
              <hr>    
              <button type="submit" id="btn-add-blog" class="btn btn-primary">
                <span id="add-spinner" class="s-15">Publish</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
@section('scripts')
<script src="{{ asset('/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('/plugins/jQuery-Tags-Input-master/src/jquery.tagsinput.js') }}"></script>
<script src="{{ asset('/plugins/jquery-validation/dist/jquery.validate.js') }}"></script>
<script>
    CKEDITOR.replace('content');
    $('#tags').tagsInput();
</script>
@endsection