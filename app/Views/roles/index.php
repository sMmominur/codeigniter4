<h1>Roles</h1>

<a href="#" id="createRoleLink">Create New Role</a>

<table id="rolesTable">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Status</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
</table>

<div id="roleFormContainer" style="display: none;">
    <h2>Create/Edit Role</h2>

    <form id="roleForm">
        <input type="hidden" id="roleId" value="">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name">
        </div>
        <div>
            <label for="status">Status:</label>
            <select id="status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description"></textarea>
        </div>
        <div>
            <button type="submit">Save</button>
            <button type="button" id="cancelButton">Cancel</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Fetch and display roles
        function fetchRoles() {
            $.ajax({
                url: '<?= base_url('roles') ?>',
                method: 'GET',
                success: function(response) {
                    console.log(response);
                    var html = '';
                    $.each(response, function(index, role) {
                        html += '<tr>';
                        html += '<td>' + role.id + '</td>';
                        html += '<td>' + role.name + '</td>';
                        html += '<td>' + role.status + '</td>';
                        html += '<td>' + role.description + '</td>';
                        html += '<td>';
                        html += '<a href="#" class="editButton" data-id="' + role.id + '">Edit</a>';
                        html += '<a href="#" class="deleteButton" data-id="' + role.id + '">Delete</a>';
                        html += '</td>';
                        html += '</tr>';
                    });
                    $('#rolesTable').html(html);
                },
                error: function() {
                    alert('An error occurred while fetching roles. Please try again.');
                }
            });
        }

        fetchRoles();

        // Show create role form
        // $('#createRoleLink').click(function() {
        //     $('#roleId').val('');
        //     $('#name').val('');
        //     $('#status').val('active');
        //     $('#description').val('');
        //     $('#roleFormContainer').show();
        // });

        // Handle form submission
        // $(document).on('submit', '#roleForm', function(e) {
        //     e.preventDefault();

        //     var roleId = $('#roleId').val();
        //     var name = $('#name').val();
        //     var status = $('#status').val();
        //     var description = $('#description').val();

        //     var url = '';
        //     var method = '';
        //     if (roleId === '') {
        //         url = '<?= base_url('roles/create') ?>';
        //         method = 'POST';
        //     } else {
        //         url = '<?= base_url('roles/edit/') ?>' + roleId;
        //         method = 'POST';
        //     }

        //     $.ajax({
        //         url: url,
        //         method: method,
        //         data: {
        //             name: name,
        //             status: status,
        //             description: description
        //         },
        //         success: function(response) {
        //             alert(response.message);
        //             $('#roleForm')[0].reset();
        //             $('#roleFormContainer').hide();
        //             fetchRoles();
        //         },
        //         error: function() {
        //             alert('An error occurred while saving the role. Please try again.');
        //         }
        //     });
        // });

        // Edit role
        // $(document).on('click', '.editButton', function() {
        //     var roleId = $(this).data('id');
        //     $('#roleId').val(roleId);

        //     $.ajax({
        //         url: '<?= base_url('roles/edit/') ?>' + roleId,
        //         method: 'GET',
        //         success: function(response) {
        //             $('#name').val(response.name);
        //             $('#status').val(response.status);
        //             $('#description').val(response.description);
        //             $('#roleFormContainer').show();
        //         },
        //         error: function() {
        //             alert('An error occurred while fetching the role. Please try again.');
        //         }
        //     });
        // });

        // Delete role
        // $(document).on('click', '.deleteButton', function() {
        //     var roleId = $(this).data('id');

        //     if (confirm('Are you sure you want to delete this role?')) {
        //         $.ajax({
        //             url: '<?= base_url('roles/delete/') ?>' + roleId,
        //             method: 'DELETE',
        //             success: function(response) {
        //                 alert(response.message);
        //                 fetchRoles();
        //             },
        //             error: function() {
        //                 alert('An error occurred while deleting the role. Please try again.');
        //             }
        //         });
        //     }
        // });

        // Cancel form submission
        // $('#cancelButton').click(function() {
        //     $('#roleForm')[0].reset();
        //     $('#roleFormContainer').hide();
        // });
    });
</script>
