@extends('layouts.admin_master')

@section('stylesheets')
@endsection

@section('content')
		<section class="admin-section">
      <div class="box">
        <div class="action">
          <a href="admin-blog/create" class="btn btn-outline">
            <i class="fas fa-plus"></i>&nbsp; Create Blog
          </a>
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
@endsection

@section('scripts')
@endsection