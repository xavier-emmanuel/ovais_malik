@extends('layouts.admin_master')

@section('stylesheets')
  <style>
    .error {
      color: #b90504;
      border-color: #b90504;
    }

    label.error {
      font-size: 80%;
      font-weight: 400;
    }
  </style>
@endsection

@section('content')
  <section class="admin-section">
    <div class="box">
      <div class="action">
        <button class="btn btn-outline" data-toggle="modal" data-target="#add-category">
          <i class="fas fa-plus"></i>&nbsp; Add Category
        </button>
      </div>
      <table id="myTable" class="table table-striped tbl-category" style="width:100%">
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

  <!-- Modal Add Category -->
  <div class="modal fade" id="add-category" tabindex="-1" role="dialog" aria-labelledby="addCategory" aria-hidden="true">
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
        <form name="frm_add_audio" method="post" id="frm-add-category">
          {{ csrf_field() }}
          <div class="modal-header">
            <h5 class="modal-title">Add Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="add-category">Name: <span>*</span></label>
              <input type="text" class="form-control" id="add-category-name" name="category_name" autocomplete="off">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; Close</button>
            <button type="submit" class="btn btn-info">
              <i class="fas fa-save"></i>&nbsp; Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Edit Category -->
  <div class="modal fade" id="edit-category" tabindex="-1" role="dialog" aria-labelledby="editCategory" aria-hidden="true">
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
        <form name="frm_edit_category" method="post" id="frm-edit-category">
          {{ csrf_field() }}
          <input type="hidden" name="hdn_category_id" id="hdn-category-id">
          <div class="modal-header">
            <h5 class="modal-title">Edit Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

              <div class="form-group">
                <label for="edit-category">Name: <span>*</span></label>
                <input type="text" class="form-control" id="edit-category-name" name="category_name" autocomplete="off">
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; Close</button>
            <button type="submit" class="btn btn-info">
              <i class="fas fa-save"></i>&nbsp; Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Delete Video -->
  <div class="modal fade" id="delete-category" tabindex="-1" role="dialog" aria-labelledby="deleteCategory" aria-hidden="true">
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
        <form name="frm_delete_category" method="post" id="frm-delete-category">
          {{ csrf_field() }}
          <input type="hidden" name="hdn_category_id" id="hdn-category-id">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="delete-question">
              <i class="fas fa-question-circle" style="font-size: 2rem;"></i>&nbsp;&nbsp;&nbsp;
              <p>Are you sure you want to delete
                <span id="category-name"></span> ?</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; No</button>
            <button type="submit" class="btn btn-info">
              <i class="fas fa-check"></i>&nbsp; Yes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{ asset(App::environment('production') ? '/public/js/pages/admin_categories.js' : '/js/pages/admin_categories.js') }}"></script>
@endsection