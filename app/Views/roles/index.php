<?= $this->extend('master') ?>

<?= $this->section('title_bar_title') ?>Roles<?= $this->endSection() ?>


<?= $this->section('page_specific_css') ?>


<?= $this->endSection() ?>

<?= $this->section('main_content') ?>

<?php helper('form'); ?>
<!-- Page Header -->
<div class="page-header">
  <div class="row align-items-center">
    <div class="col">
      <h3 class="page-title">Roles</h3>
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
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
            <th class="text-right">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($roles as $key => $role) : ?>
            <tr id="role_<?= $role['id'] ?>">
              <td><?= esc($key+1) ?></td>
              <td><?= esc($role['name']) ?></td>
              <td><?= esc($role['status']) ?></td>
              <td><?= esc($role['description']) ?></td>

              <td class="text-right">
                <div class="dropdown dropdown-action">
                  <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item editButton" href="#" data-toggle="modal" data-target="#edit_role" data-id="<?= $role['id'] ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                    <a class="dropdown-item deleteButton" href="#" data-toggle="modal" data-target="#delete_role" data-id="<?= $role['id'] ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
        <?= form_open('roles/create', ['id' => 'addItem']) ?>
        <?= csrf_field() ?>
        <div class="form-group">
          <?= form_label('Role Name <span class="text-danger">*</span>', 'roleName') ?>
          <?= form_input(['name' => 'name', 'id' => 'roleName', 'value' => set_value('name'), 'class' => 'form-control', 'required' => 'required']) ?>
        </div>

        <div class="form-group">
          <?= form_label('Status', 'roleStatus', ['class' => 'col-form-label']) ?>
          <?= form_dropdown('status', ['active' => 'Active', 'inactive' => 'Inactive'], 'active', ['id' => 'roleStatus', 'class' => 'select', 'required' => 'required']) ?>
        </div>

        <div class="form-group">
          <?= form_label('Description <span class="text-danger">*</span>', 'roleDescr') ?>
          <?= form_textarea(['name' => 'description', 'id' => 'roleDescr', 'value' => set_value('description'), 'rows' => '4', 'class' => 'form-control', 'required' => 'required']) ?>
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

<!-- Edit Role Modal -->
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
        <?= form_open('', ['id' => 'itemUpdate']) ?>
        <?= csrf_field() ?>
        <input type="hidden" name="id" id="roleIdUpdate">
        <div class="form-group">
          <?= form_label('Role Name <span class="text-danger">*</span>', 'roleNameUpdate') ?>
          <?= form_input(['name' => 'name', 'id' => 'roleNameUpdate', 'value' => set_value('name'), 'class' => 'form-control', 'required' => 'required']) ?>
        </div>

        <div class="form-group">
          <?= form_label('Status', 'roleStatusUpdate', ['class' => 'col-form-label']) ?>
          <?= form_dropdown('status', ['active' => 'Active', 'inactive' => 'Inactive'], 'active', ['id' => 'roleStatusUpdate', 'class' => 'select', 'required' => 'required']) ?>
        </div>

        <div class="form-group">
          <?= form_label('Description <span class="text-danger">*</span>', 'roleDescrUpdate') ?>
          <?= form_textarea(['name' => 'description', 'id' => 'roleDescrUpdate', 'value' => set_value('description'), 'rows' => '4', 'class' => 'form-control', 'required' => 'required']) ?>
        </div>

        <div class="submit-section">
          <?= form_submit('submit', 'Update', ['class' => 'btn btn-primary submit-btn']) ?>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
</div>
<!-- /Edit Role Modal -->


<!-- Delete role Modal -->
<div class="modal custom-modal fade" id="delete_role" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="form-header">
          <h3>Delete Role</h3>
          <p>Are you sure want to delete?</p>
        </div>
        <div class="modal-btn delete-action">
          <div class="row">
            <div class="col-6">
              <a href="javascript:void(0);" class="btn btn-primary continue-btn" id="deleteBtn">Delete</a>
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
<!-- /Delete role Modal -->

<?= $this->endSection() ?>


<?= $this->section('page_specific_script') ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>


$("#addItem input,#addItem textarea,#addItem option").keypress(function(event) {
  if (event.which === 13) {
    event.preventDefault();
    $("#addItem").submit();
  }
});

$("#itemUpdate input,#itemUpdate textarea,#itemUpdate option").keypress(function(event) {
  if (event.which === 13) {
    event.preventDefault();
    $("#itemUpdate").submit();
  }
});


  /** 
   * Role Add
   */
  $("#addItem").submit(function(event) {
    event.preventDefault();

    var name = $('#roleName').val();
    var status = $('#roleStatus').val();
    var description = $('#roleDescr').val();

    var requestData = {
      'csrf_test_name': '<?= csrf_hash(); ?>',
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
        if (response.errors) {
          showValidationError(response);
        } else {
          appendNewRow(response);
          var statusData = {
            icon: xhr.status === 200 ? 'success' : 'error',
            title: xhr.status === 200 ? 'Role added' : 'Error occurred',
            message: response.message,
            timer: xhr.status === 200 ? 2000 : 3000
          };
          showStatusDialog(statusData);
        }
        resetFields();
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
   * Delete record
   */

   $(document).on("click", ".deleteButton", function() {
    var roleId = $(this).data('id');
    $("#deleteBtn").data('id', roleId);
  });

  $("#deleteBtn").click(function() {
    var roleId = $(this).data('id');
    $.ajax({
      url: '<?= base_url('roles/delete/') ?>' + roleId,
      type: 'GET',
      success: function(response, status, xhr) {
        $("#delete_role").modal('hide');
        if (response.error === 'error') {
          var statusData = {
            icon: 'error',
            title: 'Error occurred',
            message: response.error,
            timer: 3000
          };
          showStatusDialog(statusData);
        } else {
          removeTableRow(roleId);

          var statusData = {
            icon: 'success',
            title: 'Role Deleted',
            message: response.message,
            timer: 3000
          };
          showStatusDialog(statusData);
        }
      },
      error: function(xhr, textStatus, errorThrown) {
        $("#delete_role").modal('hide');
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
   * Role update
   */
  $(document).on("click", ".editButton", function() {
    var roleId = $(this).data('id');
    $.ajax({
      url: '<?= base_url('roles/edit/') ?>' + roleId,
      type: 'GET',
      dataType: 'json',
      success: function(response, status, xhr) {
        $("#roleIdUpdate").val(response.data.id);
        $("#roleNameUpdate").val(response.data.name);
        $("#roleStatusUpdate").val(response.data.status);
        $("#roleDescrUpdate").val(response.data.description);
      },
      error: function(xhr, textStatus, errorThrown) {

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

  $("#itemUpdate").submit(function(event) {
    event.preventDefault();

    var id = $('#roleIdUpdate').val();
    var name = $('#roleNameUpdate').val();
    var status = $('#roleStatusUpdate').val();
    var description = $('#roleDescrUpdate').val();

    var requestData = {
      '<?= csrf_token() ?>': '<?= csrf_hash(); ?>',
      'id': id,
      'name': name,
      'status': status,
      'description': description
    };

    $.ajax({
      url: '<?= base_url('roles/update') ?>',
      type: 'POST',
      dataType: 'json',
      data: requestData,
      success: function(response, status, xhr) {
        $("#edit_role").modal('hide');
        if (response.status === 'error') {
          showValidationError(response);
        } else {
          updateTableRow(response.data);

          var statusData = {
            icon: 'success',
            title: 'Role updated',
            message: response.message,
            timer: 3000
          };

          showStatusDialog(statusData);
        }
      },
      error: function(xhr, textStatus, errorThrown) {
        $("#edit_role").modal('hide');
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



  function showStatusDialog(statusData) {
    Swal.fire({
      icon: statusData.icon,
      title: statusData.title,
      text: statusData.message,
      timer: statusData.timer
    });
  }

  function resetFields() {
    $('#roleName').val('');
    $('#roleStatus').val('');
    $('#roleDescr').val('');
  }

  function showValidationError(response) {

    let obj = response.errors;
    let message = '';
    for (let key in obj) {
      if (obj.hasOwnProperty(key)) {
        message += `<li>${obj[key]}</li>`;
      }
    }
    message += '';

    Swal.fire({
      icon: 'error',
      title: 'Validation error occurred',
      html: "<ul style='text-align: left;'>" + message + "</ul>",
      timer: 6000
    });
  }

  function appendNewRow(response) {
    var newRow = '<tr id="role_' + response.data.id + '">' +
      '<td>' + response.data.total + '</td>' +
      '<td>' + response.data.name + '</td>' +
      '<td>' + response.data.status + '</td>' +
      '<td>' + response.data.description + '</td>' +
      '<td class="text-right">' +
      '<div class="dropdown dropdown-action">' +
      '<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>' +
      '<div class="dropdown-menu dropdown-menu-right">' +
      '<a class="dropdown-item editButton" href="#" data-toggle="modal" data-target="#edit_role" data-id="'+response.data.id+'"><i class="fa fa-pencil m-r-5"></i> Edit</a>' +
      '<a class="dropdown-item deleteButton" href="#" data-toggle="modal" data-target="#delete_role" data-id="'+response.data.id+'"><i class="fa fa-trash-o m-r-5"></i> Delete</a>' +
      '</div></div></td></tr>';
    $('#roleTable tbody').prepend(newRow);
  }

  function removeTableRow(roleId) {
    $('#role_' + roleId).remove();
  }

  function updateTableRow(data) {
    var row = $('#role_' + data.id);
    row.find('td:nth-child(2)').text(data.name);
    row.find('td:nth-child(3)').text(data.status);
    row.find('td:nth-child(4)').text(data.description);
  }

</script>

<?= $this->endSection() ?>