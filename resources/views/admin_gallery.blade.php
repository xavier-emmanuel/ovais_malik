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
            <button class="btn btn-outline" data-toggle="modal" data-target="#add-gallery" data-backdrop="static">
              <i class="fas fa-plus"></i>&nbsp; Upload Photos
            </button>
          </div>

          <div class="row admin-gallery">
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
              <figure>
                <img src="https://picsum.photos/300/200/?image=1079" alt="" width="100%">
                <div class="overlay">
                  <div class="gallery-title">
                    <p class="text-center">Caption # 1</p>
                  </div>
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
                  <div class="gallery-title">
                    <p class="text-center">Caption # 2</p>
                  </div>
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
                  <div class="gallery-title">
                    <p class="text-center">Caption # 3</p>
                  </div>
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
                  <div class="gallery-title">
                    <p class="text-center">Caption # 4</p>
                  </div>
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
                  <div class="gallery-title">
                    <p class="text-center">Caption # 5</p>
                  </div>
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
                  <div class="gallery-title">
                    <p class="text-center">Caption # 6</p>
                  </div>
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
                  <div class="gallery-title">
                    <p class="text-center">Caption # 7</p>
                  </div>
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
                  <div class="gallery-title">
                    <p class="text-center">Caption # 8</p>
                  </div>
                  <div class="gallery-action">
                    <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-primary"><i class="fas fa-trash"></i></button>
                  </div>
                </div>
              </figure>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="nav-client-logo" role="tabpanel" aria-labelledby="nav-client-logo-tab">
          <div class="action">
            <button class="btn btn-outline" data-toggle="modal" data-target="#add-client-logo">
              <i class="fas fa-plus"></i>&nbsp; Add Logo
            </button>
          </div>

          <div class="row admin-gallery">
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
              <figure>
                <img src="{{ asset(App::environment('production') ? '/public/img/lamina.png' : '/img/lamina.png') }}" alt="Lamina Studios" width="100%">
                <div class="overlay">
                  <div class="gallery-title">
                    <p class="text-center">Lamina Studios</p>
                  </div>
                  <div class="gallery-action">
                    <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-primary"><i class="fas fa-trash"></i></button>
                  </div>
                </div>
              </figure>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
              <figure>
              <img src="{{ asset(App::environment('production') ? '/public/img/Keen_Software_House_logo.png' : '/img/Keen_Software_House_logo.png') }}" alt="Keen Software House Logo" width="100%">
                <div class="overlay">
                  <div class="gallery-title">
                    <p class="text-center">Keen Software House Logo</p>
                  </div>
                  <div class="gallery-action">
                    <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-primary"><i class="fas fa-trash"></i></button>
                  </div>
                </div>
              </figure>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
              <figure>
                <img src="https://picsum.photos/300/195/?image=1079" alt="" width="100%">
                <div class="overlay">
                  <div class="gallery-title">
                    <p class="text-center">Company Name # 3</p>
                  </div>
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
                  <div class="gallery-title">
                    <p class="text-center">Company Name # 4</p>
                  </div>
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
                  <div class="gallery-title">
                    <p class="text-center">Company Name # 5</p>
                  </div>
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
                  <div class="gallery-title">
                    <p class="text-center">Company Name # 6</p>
                  </div>
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
                  <div class="gallery-title">
                    <p class="text-center">Company Name # 7</p>
                  </div>
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
                  <div class="gallery-title">
                    <p class="text-center">Company Name # 8</p>
                  </div>
                  <div class="gallery-action">
                    <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-primary"><i class="fas fa-trash"></i></button>
                  </div>
                </div>
              </figure>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal Add Gallery -->
  <div class="modal fade" id="add-gallery" tabindex="-1" role="dialog" aria-labelledby="addGallery" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
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

  <!-- Modal Edit Gallery -->
  <div class="modal fade" id="edit-gallery" tabindex="-1" role="dialog" aria-labelledby="editGallery" aria-hidden="true">
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

  <!-- Modal Delete Gallery -->
  <div class="modal fade" id="delete-gallery" tabindex="-1" role="dialog" aria-labelledby="deleteGallery" aria-hidden="true">
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

  <!-- Modal Add Client Logo -->
  <div class="modal fade" id="add-client-logo" tabindex="-1" role="dialog" aria-labelledby="addClientLogo" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="frm-add-client-logo" method="post" enctype="multipart/form-data">
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
              <input type="text" class="form-control" id="add-client-logo-name" name="add_client_logo_name">
            </div>

            <div class="form-group">
              <label for="add-client-logo-image">Logo: <span>*</span></label>
              <input type="file" id="add-client-logo-image" name="add_client_logo_image" class="form-control-file" required>
            </div>
            <!-- Hidden by default. Should only be displayed when input file count is > 0 -->
            <div class="form-group">
              <label for="">Preview:</label>
              <div class="preview-image-wrapper">
                <img src="{{ asset('/img/oneiros-web-solutions-logo.png') }}" alt="">
              </div>
            </div>
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

  <!-- Modal Edit Client Logo -->
  <div class="modal fade" id="edit-client-logo" tabindex="-1" role="dialog" aria-labelledby="editClientLogo" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="frm-edit-client-logo" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-header">
            <h5 class="modal-title">Edit Client Logo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="add-client-logo-name">Name: <span>*</span></label>
              <input type="text" class="form-control" id="add-client-logo-name" name="add_client_logo_name">
            </div>

            <div class="form-group">
              <label for="add-client-logo-image">
                Logo:
                <span>*</span>
              </label>
              <input type="file" id="add-client-logo-image" name="add_client_logo_image" class="form-control-file" required>
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

  <!-- Modal Delete Client Logo -->
  <div class="modal fade" id="delete-client-logo" tabindex="-1" role="dialog" aria-labelledby="deleteClientLogo" aria-hidden="true">
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