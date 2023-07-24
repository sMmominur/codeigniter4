<?php

namespace App\Controllers;

use App\Models\RoleModel;
use CodeIgniter\Controller;
use CodeIgniter\Validation\Exceptions\ValidationException;
use Config\Services;

class RoleController extends Controller
{
    public function index()
    {
        $roleModel = new RoleModel();
        $roles     = $roleModel->findAll();
        return view('roles/index1', ['roles' => $roles]);
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

            return $this->response->setJSON(['message' => 'Role created successfully','data' => $data ]);

        } catch (ValidationException $e) {
            // If validation fails, retrieve the errors and display them
            return $this->response->setJSON(['errors' => $e->getErrors()]);
        }
    }

    public function edit($id)
    {
        $roleModel = new RoleModel();
        $role      = $roleModel->find($id);

        if ($role === null) {
            return $this->response->setJSON(['error' => 'Role not found.']);
        }

        $data = [
            'name'        => $this->request->getVar('name'),
            'status'      => $this->request->getVar('status'),
            'description' => $this->request->getVar('description'),
            'updated_at'  => date('Y-m-d H:i:s'),
        ];
        $roleModel->update($id, $data);

        return $this->response->setJSON(['message' => 'Role updated successfully.']);
    }

    public function delete($id)
    {
        $roleModel = new RoleModel();
        $role      = $roleModel->find($id);

        if ($role === null) {
            return $this->response->setJSON(['error' => 'Role not found.']);
        }

        $roleModel->delete($id);

        return $this->response->setJSON(['message' => 'Role deleted successfully.']);
    }
}
