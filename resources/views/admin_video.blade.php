@extends('layouts.admin_master')

@section('stylesheets')
@endsection

@section('content')
  <section class="admin-section">
    <div class="box">
      <div class="action">
        <button class="btn btn-outline" data-toggle="modal" data-target="#add-video" id="btn-add-video">
          <i class="fas fa-plus"></i>&nbsp; Add Video
        </button>
      </div>
      <table id="tbl-video" class="table table-striped" style="width:100%">
        <thead>
          <tr>
            <th width="3%" class="text-center">#</th>
            <th>Url</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </section>

  <!-- Modal Add Video -->
  <div class="modal fade" id="add-video" tabindex="-1" role="dialog" aria-labelledby="addVideoTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="loading-overlay" style="display: none;">
        <div class="lds-default">
          <div></div><div></div><div></div>
          <div></div><div></div><div></div>
          <div></div><div></div><div></div>
          <div></div><div></div><div></div>
        </div>
      </div>
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Video</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/admin-video/create" method="POST" id="frm-add-video" name="frm_add_video" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-body">
            <div class="form-group">
              <label for="add-video-link">
                <i class="fas fa-link"></i>&nbsp; Video Link: <span>*</span>&nbsp;&nbsp; <i class="fas fa-question-circle form-info" data-toggle="popover" data-content="This field only accepts none other than youtube link or url."></i></label>
              <input type="text" class="form-control" id="add-video-link" name="add_video_link" autocomplete="off" placeholder="e.g. https://www.youtube.com/watch?v=4pgMFb_pO_k">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; Close</button>
            <button type="submit" class="btn btn-info" id="btn-add">
              <i class="fas fa-save"></i>&nbsp; Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Edit Video -->
  <div class="modal fade" id="edit-video" tabindex="-1" role="dialog" aria-labelledby="editVideoTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="loading-overlay" style="display: none;">
        <div class="lds-default">
          <div></div><div></div><div></div>
          <div></div><div></div><div></div>
          <div></div><div></div><div></div>
          <div></div><div></div><div></div>
        </div>
      </div>
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Video</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/admin-video/update" method="POST" id="frm-edit-video" name="frm_edit_video" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" class="form-control" id="edit-video-id" name="edit_video_id">
              <label for="edit-video-link">
                <i class="fas fa-link"></i>&nbsp; Video Link: <span>*</span>&nbsp;&nbsp; <i class="fas fa-question-circle form-info" data-toggle="popover" data-content="This field only accepts none other than youtube link or url."></i></label>
              <input type="text" class="form-control" id="edit-video-link" name="edit_video_link" autocomplete="off">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; Close</button>
            <button type="submit" class="btn btn-info" id="btn-edit">
              <i class="fas fa-save"></i>&nbsp; Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Delete Video -->
  <div class="modal fade" id="delete-video" tabindex="-1" role="dialog" aria-labelledby="deleteVideoTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="loading-overlay" style="display: none;">
        <div class="lds-default">
          <div></div><div></div><div></div>
          <div></div><div></div><div></div>
          <div></div><div></div><div></div>
          <div></div><div></div><div></div>
        </div>
      </div>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/admin-video/delete" method="POST" id="frm-delete-video" name="frm_delete_video" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-body">
            <div class="delete-question">
              <input type="hidden" class="form-control" id="delete-video-id" name="delete_video_id">
              <i class="fas fa-question-circle" style="font-size: 2rem;"></i>&nbsp;&nbsp;&nbsp;
              <p>Are you sure you want to delete
                <span id="video-link"></span> ?</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; No</button>
            <button type="submit" class="btn btn-info" id="btn-delete">
              <i class="fas fa-check"></i>&nbsp; Yes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{ asset(App::environment('production') ? '/public/js/pages/admin_video.js' : '/js/pages/admin_video.js')}}"></script>
@endsection