@extends('layouts.admin_master')

@section('stylesheets')
@endsection

@section('content')
  <section class="admin-section">
    <div class="box">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-gallery-tab" data-toggle="tab" href="#nav-gallery" role="tab" aria-controls="nav-home" aria-selected="true">Gallery</a>
          <a class="nav-item nav-link" id="nav-client-logo-tab" data-toggle="tab" href="#nav-client-logo" role="tab" aria-controls="nav-profile" aria-selected="false">Client Logo</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-gallery" role="tabpanel" aria-labelledby="nav-gallery-tab">
          <div class="action">
            <button class="btn btn-outline" data-toggle="modal" data-target="#add-gallery" data-backdrop="static" id="btn-upload-photos">
              <i class="fas fa-plus"></i>&nbsp; Upload Photos
            </button>
          </div>

          <div class="admin-gallery" id="gallery-images">
          </div>

        </div>
        <div class="tab-pane fade" id="nav-client-logo" role="tabpanel" aria-labelledby="nav-client-logo-tab">
          <div class="action">
            <button class="btn btn-outline" data-toggle="modal" data-target="#add-client-logo" id="btn-upload-logo">
              <i class="fas fa-plus"></i>&nbsp; Add Logo
            </button>
          </div>

          <div class="admin-gallery" id="gallery-logo">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal Add Gallery -->
  <div class="modal fade" id="add-gallery" tabindex="-1" role="dialog" aria-labelledby="addGallery" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="loading-overlay" style="display: none;">
          <div class="lds-default">
            <div></div><div></div><div></div>
            <div></div><div></div><div></div>
            <div></div><div></div><div></div>
            <div></div><div></div><div></div>
          </div>
        </div>
        <form id="frm-add-gallery" method="post" enctype="multipart/form-data" name="frm_add_gallery">
          {{ csrf_field() }}
          <div class="modal-header">
            <h5 class="modal-title">Add Photo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <button type="button" class="btn btn-primary add-photos-wrapper">
              <input type="file" name="filenames[]" id="add-photos" multiple>
              <label for="add-photos"><i class="fas fa-image"></i>&nbsp; Select photos</label>
            </button>

            <div class="container-fluid">
              <div class="preview-image"></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; Close</button>
            <button type="submit" class="btn btn-info" id="btn-upload">
              <i class="fas fa-upload"></i>&nbsp; Upload</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Edit Gallery -->
  <div class="modal fade" id="edit-gallery" tabindex="-1" role="dialog" aria-labelledby="editGallery" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="loading-overlay" style="display: none;">
          <div class="lds-default">
            <div></div><div></div><div></div>
            <div></div><div></div><div></div>
            <div></div><div></div><div></div>
            <div></div><div></div><div></div>
          </div>
        </div>
        <form id="frm-edit-gallery" name="frm_edit_gallery" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-header">
            <h5 class="modal-title">Edit Image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" name="edit_image_id" id="edit-image-id">
              <label for="add-client-logo-image">Image: </label>
              <input type="file" id="edit-photo" name="edit_photo" class="form-control-file">
            </div>
            <div class="form-group div-preview">
              <label for="">Preview:</label>
              <div class="preview-image-wrapper m-auto">
                <img id="image-show" src="{{ asset('/img/photo-preview-frame-icon-by_vexels.png') }}" alt="">
              </div>
            </div>
            <div class="form-group">
              <label for="add-client-logo-name">Caption: </label>
              <textarea id="edit-caption" name="edit_caption" cols="30" rows="3" class="form-control" placeholder="Add caption here"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; Close</button>
            <button type="submit" class="btn btn-info" id="btn-edit-image">
              <i class="fas fa-save"></i>&nbsp; Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Delete Gallery -->
  <div class="modal fade" id="delete-gallery" tabindex="-1" role="dialog" aria-labelledby="deleteGallery" aria-hidden="true">
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
        <form id="frm-delete-gallery" method="post" name="frm_delete_gallery">
          {{ csrf_field() }}
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <input type="hidden" name="delete_image_id" id="delete-image-id">
          <div class="modal-body">
            <div class="delete-question">
              <i class="fas fa-question-circle" style="font-size: 2rem;"></i>&nbsp;&nbsp;&nbsp;
              <p>Are you sure you want to delete this image?</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; No</button>
            <button type="submit" class="btn btn-info" id="btn-delete-image">
              <i class="fas fa-check"></i>&nbsp; Yes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Add Client Logo -->
  <div class="modal fade" id="add-client-logo" tabindex="-1" role="dialog" aria-labelledby="addClientLogo" aria-hidden="true">
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
        <form id="frm-add-client-logo" name="frm_add_client_logo" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-header">
            <h5 class="modal-title">Add Client Logo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="add-client-logo-name">Name: <span>*</span></label>
              <input type="text" class="form-control" id="add-client-logo-name" name="add_client_logo_name" autocomplete="off">
            </div>

            <div class="form-group">
              <label for="add-client-logo-image">Logo: <span>*</span></label>
              <input type="file" id="add-client-logo-image" name="add_client_logo_image" class="form-control-file" required>
            </div>

            <div class="form-group logo-preview">
              <label for="">Preview:</label>
              <div class="preview-image-wrapper m-auto">
                <img src="{{ asset('/img/photo-preview-frame-icon-by_vexels.png') }}" alt="" id="logo-show">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; Close</button>
            <button type="submit" class="btn btn-info" id="btn-add-logo">
              <i class="fas fa-save"></i>&nbsp; Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Edit Client Logo -->
  <div class="modal fade" id="edit-client-logo" tabindex="-1" role="dialog" aria-labelledby="editClientLogo" aria-hidden="true">
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
        <form id="frm-edit-client-logo" name="frm_edit_client_logo" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-header">
            <h5 class="modal-title">Edit Client Logo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="edit_logo_id" id="edit-logo-id">
            <div class="form-group">
              <label for="edit-client-logo-name">Name: <span>*</span></label>
              <input type="text" class="form-control" id="edit-client-logo-name" name="edit_client_logo_name" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="edit-client-logo-image">
                Logo:
                <span>*</span>
              </label>
              <input type="file" id="edit-client-logo-image" name="edit_client_logo_image" class="form-control-file">
            </div>
            <div class="form-group logo-preview-edit">
              <label for="">Preview:</label>
              <div class="preview-image-wrapper m-auto">
                <img id="logo-show-edit" src="{{ asset('/img/photo-preview-frame-icon-by_vexels.png') }}" alt="">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; Close</button>
            <button type="submit" class="btn btn-info" id="btn-edit-logo">
              <i class="fas fa-save"></i>&nbsp; Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Delete Client Logo -->
  <div class="modal fade" id="delete-client-logo" tabindex="-1" role="dialog" aria-labelledby="deleteClientLogo" aria-hidden="true">
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
        <form id="frm-delete-client-logo" method="post" name="frm_delete_client_logo">
          {{ csrf_field() }}
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="delete_logo_id" id="delete-logo-id">
            <div class="delete-question">
              <i class="fas fa-question-circle" style="font-size: 2rem;"></i>&nbsp;&nbsp;&nbsp;
              <p>Are you sure you want to delete <span id="client-logo-name"></span> logo?</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; No</button>
            <button type="submit" class="btn btn-info" id="btn-delete-logo">
              <i class="fas fa-check"></i>&nbsp; Yes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{ asset(App::environment('production') ? '/public/js/pages/admin_gallery.js' : '/js/pages/admin_gallery.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/plugins/jquery-validation/dist/additional-methods.js' : '/plugins/jquery-validation/dist/additional-methods.js') }}"></script>
@endsection