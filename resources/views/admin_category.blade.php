@extends('layouts.admin_master')

@section('stylesheets')
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
        <form action="admin-category/store" method="post" id="frm-add-category">
          <div class="modal-header">
            <h5 class="modal-title">Add Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

              <div class="form-group">
                <label for="add-category">
                  <i class="fas fa-link"></i>&nbsp; Name:</label>
                <input type="text" class="form-control" id="add-category-name" name="add_category_name">
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
        <div class="modal-header">
          <h5 class="modal-title">Edit Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="">
            <div class="form-group">
              <label for="edit-category">
                <i class="fas fa-link"></i>&nbsp; Name:</label>
              <input type="text" class="form-control" id="edit-category-name" name="edit_category_name">
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