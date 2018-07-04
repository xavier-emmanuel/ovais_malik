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
      <table id="myTable" class="table table-striped tbl-blog" style="width:100%">
        <thead>
          <tr>
            <th width="3%" class="text-center">#</th>
            <th>Title</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </section>

  <!-- Modal Delete Blog -->
  <div class="modal fade" id="delete-blog" tabindex="-1" role="dialog" aria-labelledby="deleteblog" aria-hidden="true">
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
        <form id="frm-delete-blog" method="post" name="frm_delete_blog">
          <input type="hidden" name="hdn_blog_id" id="hdn-blog-id">
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
                <span id="blog-title"></span> ?</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times"></i>&nbsp; No</button>
            <button type="submit" class="btn btn-info btn-delete-blog">
              <i class="fas fa-check"></i>&nbsp; Yes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{ asset(App::environment('production') ? '/public/js/pages/admin_delete_blog.js' : '/js/pages/admin_delete_blog.js') }}"></script>
  <script>
    $('.tbl-blog').DataTable({
        "ajax": {
            url: "/admin-blog/show",
            type: 'GET'
        },
    });

    $(document).ready(function(){
        if(localStorage.getItem("Create"))
        {
            $.toast({
                heading: 'Success',
                text: 'Blog has been successfully added.',
                position: 'top-right',
                icon: 'success',
                hideAfter: 3500
            });
            localStorage.clear();
        }
        if(localStorage.getItem("Update"))
        {
            $.toast({
                heading: 'Success',
                text: 'Blog has been successfully updated.',
                position: 'top-right',
                icon: 'success',
                hideAfter: 3500
            });
            localStorage.clear();
        }
    });
</script>
@endsection