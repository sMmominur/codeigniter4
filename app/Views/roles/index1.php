<?= $this->extend('master') ?>

<?= $this->section('main_content') ?>

<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-center">
    <div class="col">
      <h3 class="page-title">Roles</h3>
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Roles</li>
      </ul>
    </div>
    <div class="col-auto float-right ml-auto">
      <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_policy"><i class="fa fa-plus"></i> Add Role</a>
    </div>
  </div>
</div>
<!-- /Page Header -->

<!-- Data table -->
<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-striped custom-table mb-0 datatable" id="rolesTable">
        <thead>
          <tr>
            <th style="width: 30px;">#</th>
            <th>Role Name </th>
            <th>Status </th>
            <th>Description </th>
            <th>Created </th>
            <th class="text-right">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($roles as $role): ?>
            <tr id="role_">
              <td><?= $role['id'] ?></td>
              <td><?= $role['name'] ?></td>
              <td><?= $role['status'] ?></td>
              <td><?= $role['description'] ?></td>
              <td><?= $role['created_at'] ?></td>
              <td class="text-right">
                <div class="dropdown dropdown-action">
                  <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_policy"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_policy"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                  </div>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- /Data table -->

<!-- Add Policy Modal -->
<div id="add_policy" class="modal custom-modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label>Role Name <span class="text-danger">*</span></label>
            <input class="form-control" type="text">
          </div>
          <div class="form-group">
            <label>Description <span class="text-danger">*</span></label>
            <textarea class="form-control" rows="4"></textarea>
          </div>
          <div class="form-group">
            <label class="col-form-label">Status</label>
            <select class="select">
              <option>Active</option>
              <option>Inactive</option>
            </select>
          </div>
          <div class="submit-section">
            <button class="btn btn-primary submit-btn">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /Add Policy Modal -->

<!-- Edit Policy Modal -->
<div id="edit_policy" class="modal custom-modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label>Role Name <span class="text-danger">*</span></label>
            <input class="form-control" type="text" value="Leave Policy">
          </div>
          <div class="form-group">
            <label>Description <span class="text-danger">*</span></label>
            <textarea class="form-control" rows="4"></textarea>
          </div>
          <div class="form-group">
            <label class="col-form-label">Status</label>
            <select class="select">
              <option>Active</option>
              <option>Inactive</option>
            </select>
          </div>
          <div class="submit-section">
            <button class="btn btn-primary submit-btn">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /Edit Policy Modal -->

<!-- Delete Policy Modal -->
<div class="modal custom-modal fade" id="delete_policy" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="form-header">
          <h3>Delete Policy</h3>
          <p>Are you sure want to delete?</p>
        </div>
        <div class="modal-btn delete-action">
          <div class="row">
            <div class="col-6">
              <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
            </div>
            <div class="col-6">
              <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /Delete Policy Modal -->








<?= $this->endSection() ?>


<?= $this->section('page_specific_script') ?>

</script>

<?= $this->endSection() ?>