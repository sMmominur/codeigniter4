<?php namespace App\Controllers;

use App\Models\RoleModel;
use CodeIgniter\Controller;

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

        $data = [
            'name'        => $this->request->getVar('name'),
            'status'      => $this->request->getVar('status'),
            'description' => $this->request->getVar('description'),
        ];

        $roleModel->insert($data);
        return $this->response->setJSON(['message' => 'Role created successfully']);
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
