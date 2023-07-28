<?php

namespace App\Controllers;

use App\Models\RoleModel;
use App\Controllers\BaseController;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Validation\Exceptions\ValidationException;
use Config\Services;

class RoleController extends BaseController
{
    use ResponseTrait;

   
    public function index()
    {
        $model   = new RoleModel();
        $records = $model->findAll();
        return view('roles/index', ['roles' => $records]);
    }


    public function create()
    {
        $roleModel = new RoleModel();


        // Get the request data and sanitize
        $data = [
            'name'        => htmlspecialchars($this->request->getVar('name')),
            'status'      => htmlspecialchars($this->request->getVar('status')),
            'description' => htmlspecialchars($this->request->getVar('description')),
        ];

        // Create validation rules
        $rules = [
            'name'        => 'required|min_length[3]|max_length[50]',
            'status'      => 'required|in_list[active,inactive]',
            'description' => 'required|min_length[3]|max_length[100]',
        ];

        // Set custom error messages
        $messages = [
            'name' => [
                'required'   => 'The role name field is required.',
                'min_length' => 'The role name field must be at least {param} characters long.',
                'max_length' => 'The role name field must not exceed {param} characters.',
            ],
            'status' => [
                'required' => 'The status field is required.',
                'in_list'  => 'Invalid status value.',
            ],
            'description' => [
                'required'   => 'The description field is required.',
                'min_length' => 'The description field must be at least {param} characters long.',
                'max_length' => 'The description field must not exceed {param} characters.',
            ],
        ];

        try {
            // Validate the data
            $validation = Services::validation();
            $validation->setRules($rules, $messages);

            if (!$validation->withRequest($this->request)->run($data)) {
                return $this->response->setJSON(['errors' => $validation->getErrors()]);
            }

            // If validation passes, insert the data into the database
            $data['id'] = $roleModel->insert($data);
            $data['total'] = $roleModel->countAll();

            return $this->response->setJSON(['message' => 'Role created successfully', 'data' => $data]);
        } catch (ValidationException $e) {
            // If validation fails, retrieve the errors and display them
            return $this->response->setJSON(['errors' => $e->getErrors()]);
        }
    }

    public function edit($id = null)
    {
        // Validate the ID parameter
        if (empty($id) || !is_numeric($id)) {
            return $this->response->setJSON(['error' => 'Invalid role ID.'])->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST);
        }

        $roleModel = new RoleModel();
        $role = $roleModel->find($id);

        if ($role === null) {
            return $this->response->setJSON(['error' => 'Role not found.'])->setStatusCode(ResponseInterface::HTTP_NOT_FOUND);
        }
        return $this->response->setJSON(['data' => $role])->setStatusCode(ResponseInterface::HTTP_OK);
    }


    public function delete($id = null)
    {
        // Validate the ID parameter
        if (empty($id) || !is_numeric($id)) {
            return $this->response->setJSON(['error' => 'Invalid role ID.'])->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST);
        }

        $roleModel = new RoleModel();
        $role = $roleModel->find($id);

        if ($role === null) {
            return $this->response->setJSON(['error' => 'Role not found.'])->setStatusCode(ResponseInterface::HTTP_NOT_FOUND);
        }
        // Perform the delete operation
        $roleModel->delete($id);
        return $this->response->setJSON(['message' => 'Role deleted successfully.'])->setStatusCode(ResponseInterface::HTTP_OK);
    }

    public function update()
    {
        $roleModel = new RoleModel();

        // Get the request data and sanitize
        $data = [
            'name'        => htmlspecialchars($this->request->getVar('name')),
            'status'      => htmlspecialchars($this->request->getVar('status')),
            'description' => htmlspecialchars($this->request->getVar('description')),
        ];

        // Create validation rules
        $rules = [
            'name'        => 'required|min_length[3]|max_length[50]',
            'status'      => 'required|in_list[active,inactive]',
            'description' => 'required|min_length[3]|max_length[100]',
        ];

        // Set custom error messages
        $messages = [
            'name' => [
                'required'   => 'The role name field is required.',
                'min_length' => 'The role name field must be at least {param} characters long.',
                'max_length' => 'The role name field must not exceed {param} characters.',
            ],
            'status' => [
                'required' => 'The status field is required.',
                'in_list'  => 'Invalid status value.',
            ],
            'description' => [
                'required'   => 'The description field is required.',
                'min_length' => 'The description field must be at least {param} characters long.',
                'max_length' => 'The description field must not exceed {param} characters.',
            ],
        ];

        try {
            // Validate the data
            $validation = Services::validation();
            $validation->setRules($rules, $messages);

            if (!$validation->withRequest($this->request)->run($data)) {
                return $this->response->setJSON(['status' => 'error', 'errors' => $validation->getErrors()]);
            }

            // If validation passes, update the data in the database
            $id = $this->request->getVar('id'); // Assuming you have a hidden field with 'id' in the update form
            $updated = $roleModel->update($id, $data);

            if ($updated) {
                // Retrieve the updated role data
                $role = $roleModel->find($id);
                return $this->response->setJSON(['status' => 'success', 'data' => $role, 'message' => 'Role updated successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update role.']);
            }
        } catch (ValidationException $e) {
            // If validation fails, retrieve the errors and display them
            return $this->response->setJSON(['status' => 'error', 'errors' => $e->getErrors()]);
        }
    }
}
