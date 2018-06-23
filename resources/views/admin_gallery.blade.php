@extends('layouts.admin_master')

@section('stylesheets')
  <!-- Fancybox -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
@endsection

@section('content')
  <section class="admin-section">
    <div class="box">
      <div class="action">
        <button type="button" id="test" class="btn btn-outline" data-toggle="modal" data-target="#add-image" data-backdrop="static">
          <i class="fas fa-plus"></i>&nbsp; Add Image(s)
        </button>
      </div>

      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1079" data-caption="My caption">
              <img src="https://picsum.photos/300/200/?image=1079" alt="" width="100%">
            </a>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1077">
              <img src="https://picsum.photos/300/200/?image=1077" alt="" width="100%">
            </a>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1062">
              <img src="https://picsum.photos/300/200/?image=1062" alt="" width="100%">
            </a>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1050">
              <img src="https://picsum.photos/300/200/?image=1050" alt="" width="100%">
            </a>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1027">
              <img src="https://picsum.photos/300/200/?image=1027" alt="" width="100%">
            </a>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=1024">
              <img src="https://picsum.photos/300/200/?image=1024" alt="" width="100%">
            </a>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=9">
              <img src="https://picsum.photos/300/200/?image=9" alt="" width="100%">
            </a>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <a data-fancybox="gallery" href="https://picsum.photos/1200/800/?image=20">
              <img src="https://picsum.photos/300/200/?image=20" alt="" width="100%">
            </a>
          </figure>
        </div>
      </div>
      <div class="text-center load-more">
        <a href="#" class="btn btn-outline">LOAD MORE</a>
      </div>
    </div>
  </section>

  <!-- Modal Add Image -->
  <div class="modal fade" id="add-image" tabindex="-1" role="dialog" aria-labelledby="addImage" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form id="frm-edit-audio" method="post" enctype="multipart/form-data" name="frm_edit_audio">
          {{ csrf_field() }}
          <input type="hidden" name="hdn_audio_id" id="hdn-audio-id">
          <input type="hidden" name="hdn_audio" id="hdn-audio">
          <div class="modal-header">
            <h5 class="modal-title">Edit Audio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; Close</button>
            <button type="submit" class="btn btn-info btn-edit-audio">
              <i class="fas fa-save"></i>&nbsp; Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Edit Image -->
  <div class="modal fade" id="edit-image" tabindex="-1" role="dialog" aria-labelledby="editImage" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="frm-edit-audio" method="post" enctype="multipart/form-data" name="frm_edit_audio">
          {{ csrf_field() }}
          <input type="hidden" name="hdn_audio_id" id="hdn-audio-id">
          <input type="hidden" name="hdn_audio" id="hdn-audio">
          <div class="modal-header">
            <h5 class="modal-title">Edit Audio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

              <div class="form-group">
                <label for="add-audio">Title:<span>*</span></label>
                <input type="text" class="form-control" id="edit-audio-title" name="edit_audio_title" autocomplete="off" required>
              </div>
              <div class="form-group">
                <label for="add-audio">
                  Audio:<span>*</span></label>
                <input type="file" id="edit-audio" name="edit_audio" class="form-control-file"><br>
              </div>
              <div class="form-group audio-preview" id="edit-audio-prewiew">
                <audio controls src="#" type="audio/mp3" id="audio-preview"></audio>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; Close</button>
            <button type="submit" class="btn btn-info btn-edit-audio">
              <i class="fas fa-save"></i>&nbsp; Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Delete Image -->
  <div class="modal fade" id="delete-image" tabindex="-1" role="dialog" aria-labelledby="deleteImage" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="frm-delete-audio" method="post" name="frm_delete_audio">
          <input type="hidden" name="hdn_audio_id" id="hdn-audio-id">
          {{ csrf_field() }}
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="delete-question">
              <i class="fas fa-question-circle" style="font-size: 2rem;"></i>&nbsp;&nbsp;&nbsp;
              <p>Are you sure you want to delete
                <span id="audio-title"></span> ?</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; No</button>
            <button type="submit" class="btn btn-info btn-delete-audio">
              <i class="fas fa-check"></i>&nbsp; Yes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <!-- Fancybox -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
@endsection