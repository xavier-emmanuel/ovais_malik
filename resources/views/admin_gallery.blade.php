@extends('layouts.admin_master')

@section('stylesheets')
@endsection

@section('content')
  <section class="admin-section">
    <div class="box">
      <div class="action">
        <button class="btn btn-outline" data-toggle="modal" data-target="#add-photos" data-backdrop="static">
          <i class="fas fa-plus"></i>&nbsp; Upload Photos
        </button>
      </div>

      <div class="row admin-photos">
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <img src="https://picsum.photos/300/200/?image=1079" alt="" width="100%">
            <div class="overlay">
              <div class="gallery-action">
                <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                <button class="btn btn-primary"><i class="fas fa-trash"></i></button>
              </div>
            </div>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <img src="https://picsum.photos/300/200/?image=1079" alt="" width="100%">
            <div class="overlay">
              <div class="gallery-action">
                <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                <button class="btn btn-primary"><i class="fas fa-trash"></i></button>
              </div>
            </div>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <img src="https://picsum.photos/300/200/?image=1079" alt="" width="100%">
            <div class="overlay">
              <div class="gallery-action">
                <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                <button class="btn btn-primary"><i class="fas fa-trash"></i></button>
              </div>
            </div>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <img src="https://picsum.photos/300/200/?image=1079" alt="" width="100%">
            <div class="overlay">
              <div class="gallery-action">
                <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                <button class="btn btn-primary"><i class="fas fa-trash"></i></button>
              </div>
            </div>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <img src="https://picsum.photos/300/200/?image=1079" alt="" width="100%">
            <div class="overlay">
              <div class="gallery-action">
                <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                <button class="btn btn-primary"><i class="fas fa-trash"></i></button>
              </div>
            </div>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <img src="https://picsum.photos/300/200/?image=1079" alt="" width="100%">
            <div class="overlay">
              <div class="gallery-action">
                <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                <button class="btn btn-primary"><i class="fas fa-trash"></i></button>
              </div>
            </div>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <img src="https://picsum.photos/300/200/?image=1079" alt="" width="100%">
            <div class="overlay">
              <div class="gallery-action">
                <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                <button class="btn btn-primary"><i class="fas fa-trash"></i></button>
              </div>
            </div>
          </figure>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <figure>
            <img src="https://picsum.photos/300/200/?image=1079" alt="" width="100%">
            <div class="overlay">
              <div class="gallery-action">
                <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                <button class="btn btn-primary"><i class="fas fa-trash"></i></button>
              </div>
            </div>
          </figure>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal Add Photos -->
  <div class="modal fade" id="add-photos" tabindex="-1" role="dialog" aria-labelledby="addPhotos" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form id="frm-edit-audio" method="post" enctype="multipart/form-data" name="frm_edit_audio">
          {{ csrf_field() }}
          <input type="hidden" name="hdn_audio_id" id="hdn-audio-id">
          <input type="hidden" name="hdn_audio" id="hdn-audio">
          <div class="modal-header">
            <h5 class="modal-title">Add Photo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <button type="button" class="btn btn-primary add-photos-wrapper">
              <input type="file" name="add_photos" id="add-photos" multiple>
              <label for="add-photos"><i class="fas fa-image"></i>&nbsp; Select photos</label>
            </button>

            <div class="container-fluid">
              <div class="row">
                <!-- Preview images here -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs 6">
                  <img src="https://picsum.photos/300/200/?image=9" alt="" width="100%">
                  <textarea name="" id="" cols="30" rows="3" class="form-control">Caption</textarea>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs 6">
                  <img src="https://picsum.photos/300/200/?image=9" alt="" width="100%">
                  <textarea name="" id="" cols="30" rows="3" class="form-control">Caption</textarea>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs 6">
                  <img src="https://picsum.photos/300/200/?image=9" alt="" width="100%">
                  <textarea name="" id="" cols="30" rows="3" class="form-control">Caption</textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; Close</button>
            <button type="submit" class="btn btn-info btn-edit-audio">
              <i class="fas fa-upload"></i>&nbsp; Upload</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Edit Photos -->
  <div class="modal fade" id="edit-photos" tabindex="-1" role="dialog" aria-labelledby="editPhotos" aria-hidden="true">
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

  <!-- Modal Delete Photos -->
  <div class="modal fade" id="delete-photos" tabindex="-1" role="dialog" aria-labelledby="deletePhotos" aria-hidden="true">
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
@endsection