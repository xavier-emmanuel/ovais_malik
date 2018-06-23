@extends('layouts.admin_master')

@section('stylesheets')
  <style>
    .error {
      color: red !important;
      border-color: red !important;
    }
  </style>
@endsection

@section('content')
  <section class="admin-section">
    <div class="box">
      <div class="action">
        <button class="btn btn-outline" data-toggle="modal" data-target="#add-audio-modal">
          <i class="fas fa-plus"></i>&nbsp; Add Audio
        </button>
      </div>
      <table id="tbl-audio" class="table table-striped" style="width:100%">
        <thead>
          <tr>
            <th width="3%" class="text-center">#</th>
            <th>Name</th>
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

  <!-- Modal Add Audio -->
  <div class="modal fade" id="add-audio-modal" tabindex="-1" role="dialog" aria-labelledby="addAudio" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="frm-add-audio" method="post" enctype="multipart/form-data" name="frm_add_audio">
          {{ csrf_field() }}
          <div class="modal-header">
            <h5 class="modal-title">Add Audio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

              <div class="form-group">
                <label for="add-audio">Title:<span>*</span></label>
                <input type="text" class="form-control" id="add-audio-title" name="add_audio_title" autocomplete="off" required>
              </div>
              <div class="form-group">
                <label for="add-audio">
                  Audio:<span>*</span></label>
                <input type="file" id="add-audio" name="add_audio" class="form-control-file" accept=".mp3,audio/*" required><br>
              </div>
              <div class="form-group audio-preview" id="add-audio-prewiew">
                <audio controls src="#" type="audio/mp3" id="audio-preview"></audio>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; Close</button>
            <button type="submit" class="btn btn-info btn-add-audio">
              <i class="fas fa-save"></i>&nbsp; Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Edit Audio -->
  <div class="modal fade" id="edit-audio" tabindex="-1" role="dialog" aria-labelledby="editAudio" aria-hidden="true">
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

  <!-- Modal Delete Audio -->
  <div class="modal fade" id="delete-audio" tabindex="-1" role="dialog" aria-labelledby="deleteAudio" aria-hidden="true">
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
  <script src="{{ asset('/js/pages/admin_audio.js') }}"></script>
@endsection