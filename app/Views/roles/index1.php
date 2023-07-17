<?= $this->extend('master') ?>

<?= $this->section('main_content') ?>

<?php helper('form'); ?>
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
      <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_role"><i class="fa fa-plus"></i> Add Role</a>
    </div>
  </div>
</div>
<!-- /Page Header -->

<!-- Data table -->
<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-striped custom-table mb-0 datatable" id="roleTable">
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
          <?php foreach ($roles as $role) : ?>
            <tr id="role_<?= $role['id'] ?>">
              <td><?= $role['id'] ?></td>
              <td><?= $role['name'] ?></td>
              <td><?= $role['status'] ?></td>
              <td><?= $role['description'] ?></td>
              <td><?= $role['created_at'] ?></td>
              <td class="text-right">
                <div class="dropdown dropdown-action">
                  <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_role"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_role"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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

<!-- Add Role Modal -->
<div id="add_role" class="modal custom-modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('roles/create', ['id' => 'roleFormAdd']) ?>
        <?= csrf_field() ?>
        <div class="form-group">
          <?= form_label('Role Name <span class="text-danger">*</span>', 'roleName') ?>
          <?= form_input(['name' => 'name', 'id' => 'roleName', 'value' => set_value('name'), 'class' => 'form-control', 'required' => 'required']) ?>
        </div>
        <div class="form-group">
          <?= form_label('Description <span class="text-danger">*</span>', 'roleDescr') ?>
          <?= form_textarea(['name' => 'description', 'id' => 'roleDescr', 'value' => set_value('description'), 'rows' => '4', 'class' => 'form-control', 'required' => 'required']) ?>
        </div>
        <div class="form-group">
          <?= form_label('Status', 'roleStatus', ['class' => 'col-form-label']) ?>
          <?= form_dropdown('status', ['active' => 'Active', 'inactive' => 'Inactive'], 'active', ['id' => 'roleStatus', 'class' => 'select', 'required' => 'required']) ?>
        </div>
        <div class="submit-section">
          <?= form_submit('submit', 'Submit', ['class' => 'btn btn-primary submit-btn']) ?>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
</div>

<!-- /Add Role Modal -->

<!-- Edit Policy Modal -->
<div id="edit_role" class="modal custom-modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="roleFormId2">
          <div class="form-group">
            <label>Role Name <span class="text-danger">*</span></label>
            <input class="form-control" type="text" value="Super Admin">
          </div>
          <div class="form-group">
            <label>Description <span class="text-danger">*</span></label>
            <textarea class="form-control" rows="4" value="All access"></textarea>
          </div>
          <div class="form-group">
            <label class="col-form-label">Status</label>
            <select class="select">
              <option>Active</option>
              <option>Inactive</option>
            </select>
          </div>
          <div class="submit-section">
            <button type="submit" class="btn btn-primary submit-btn">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /Edit Policy Modal -->

<!-- Delete Policy Modal -->
<div class="modal custom-modal fade" id="delete_role" role="dialog">
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $("#roleFormAdd").submit(function(event) {
    event.preventDefault();

    var name = $('#roleName').val();
    var status = $('#roleStatus').val();
    var description = $('#roleDescr').val();

    var requestData = {
      '<?= csrf_token() ?>': '<?= csrf_hash() ?>',
      'name': name,
      'status': status,
      'description': description
    };

    $.ajax({
      url: '<?= base_url('roles/create') ?>',
      type: 'POST',
      dataType: 'json',
      data: requestData,
      success: function(response, status, xhr) {
        $("#add_role").modal('hide');
        var statusData = {
          icon: xhr.status === 200 ? 'success' : 'error',
          title: xhr.status === 200 ? 'Role added' : 'Error occurred',
          message: response.message,
          timer: xhr.status === 200 ? 2000 : 3000
        };
        showStatusDialog(statusData);
        resetFields();
        var data = JSON.parse(response);

        //loadRoles();
        var newRow = '<tr id="role_' + data.role.id + '">' +
            '<td>' + data.role.id + '</td>' +
            '<td>' + data.role.name + '</td>' +
            '<td>' + data.role.status + '</td>' +
            '<td>' + data.role.description + '</td>' +
            '<td>' + data.role.created_at + '</td>' +
            '<td class="text-right">' +
            '<div class="dropdown dropdown-action">' +
            '<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>' +
            '<div class="dropdown-menu dropdown-menu-right">' +
            '<a class="dropdown-item" href="#" onclick="editRole(' + data.role.id + ')" data-toggle="modal" data-target="#edit_role"><i class="fa fa-pencil m-r-5"></i> Edit</a>' +
            '<a class="dropdown-item" href="#" onclick="deleteRole(' + data.role.id + ')" data-toggle="modal" data-target="#delete_role"><i class="fa fa-trash-o m-r-5"></i> Delete</a>' +
            '</div></div></td></tr>';
            $('#roleTable tbody').append(newRow);
      },
      error: function(xhr, textStatus, errorThrown) {
        $("#add_role").modal('hide');

        var statusData = {
          icon: 'error',
          title: 'Error occurred',
          message: errorThrown,
          timer: 3000
        };
        showStatusDialog(statusData);
      }
    });
  });


  /**
   * After performing any action show the action status
   */
  function showStatusDialog(statusData) {
    Swal.fire({
      icon: statusData.icon,
      title: statusData.title,
      text: statusData.message,
      timer: statusData.timer
    });
  }
  /**
   * After submitting the form reset all form data
   */

  function resetFields() {
    $('#roleName').val('');
    $('#roleStatus').val('');
    $('#roleDescr').val('');
  }

  // Load loads
  function loadRoles() {
    $.ajax({
      url: '<?= base_url('roles') ?>',
      type: 'GET',
      success: function(response, status, xhr) {
        $('#contactList').html(response);
      }
    });
  }
</script>

<?= $this->endSection() ?>