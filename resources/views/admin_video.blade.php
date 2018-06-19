@extends('layouts.admin_master')

@section('stylesheets')
@endsection
@section('content')
		<section class="admin-section">
      <div class="box">
        <div class="action">
          <button class="btn btn-outline" data-toggle="modal" data-target="#add-video">
            <i class="fas fa-plus"></i>&nbsp; Add Video
          </button>
        </div>
        <table id="myTable" class="table table-striped" style="width:100%">
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
            <tr>
              <td class="text-center">1</td>
              <td>
                <a href="https://www.youtube.com/embed/4pgMFb_pO_k" target="_blank">https://www.youtube.com/embed/4pgMFb_pO_k</a>
              </td>
              <td>June 15, 2018</td>
              <td>June 16, 2018</td>
              <td>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit-video">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-video">
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
            <tr>
              <td class="text-center">2</td>
              <td>
                <a href="https://www.youtube.com/embed/4pgMFb_pO_k" target="_blank">https://www.youtube.com/embed/4pgMFb_pO_k</a>
              </td>
              <td>June 15, 2018</td>
              <td>June 16, 2018</td>
              <td>
                <button type="button" class="btn btn-info">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-danger">
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- Modal Add Video -->
    <div class="modal fade" id="add-video" tabindex="-1" role="dialog" aria-labelledby="addVideoTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Video</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="">
              <div class="form-group">
                <label for="add-video-link">
                  <i class="fas fa-link"></i>&nbsp; Link:</label>
                <input type="text" class="form-control" id="add-video-link" name="add_video_link">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; Close</button>
            <button type="button" class="btn btn-info">
              <i class="fas fa-save"></i>&nbsp; Save</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Edit Video -->
    <div class="modal fade" id="edit-video" tabindex="-1" role="dialog" aria-labelledby="editVideoTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Video</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="">
              <div class="form-group">
                <label for="edit-video-link">
                  <i class="fas fa-link"></i>&nbsp; Link:</label>
                <input type="text" class="form-control" id="edit-video-link" name="edit_video_link">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; Close</button>
            <button type="button" class="btn btn-info">
              <i class="fas fa-save"></i>&nbsp; Update</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Delete Video -->
    <div class="modal fade" id="delete-video" tabindex="-1" role="dialog" aria-labelledby="deleteVideoTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="delete-question">
              <i class="fas fa-question-circle" style="font-size: 2rem;"></i>&nbsp;&nbsp;&nbsp;
              <p>Are you sure you want to delete
                <span>https://www.youtube.com/embed/4pgMFb_pO_k</span> ?</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; No</button>
            <button type="button" class="btn btn-info">
              <i class="fas fa-check"></i>&nbsp; Yes</button>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('scripts')
@endsection