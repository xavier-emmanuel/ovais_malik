@extends('layouts.admin_master')

@section('stylesheets')
@endsection
@section('content')
		<section class="admin-section">
      <div class="box">
        <div class="action">
          <a href="admin-blog/create" class="btn btn-outline">
            <i class="fas fa-plus"></i>&nbsp; Create
          </a>
        </div>
        <table id="myTable" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th width="3%" class="text-center">#</th>
              <th>Name</th>
              <th></th>
              <th>Author</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
    </section>

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