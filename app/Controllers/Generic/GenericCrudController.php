<?php

namespace App\Controllers\Generic;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Validation\Exceptions\ValidationException;
use Config\Services;

/**
 * Generic CRUD Controller
 *
 * Provides common CRUD functionalities for models.
 * Extend this controller for specific models to perform CRUD operations.
 */
abstract class GenericCrudController extends Controller
{
    use ResponseTrait;

    /**
     * The model name to be used for CRUD operations.
     * Override this property in child classes with the appropriate model class name.
     *
     * @var string
     */
    protected $modelName;

    /**
     * The view name to be used for rendering the index page.
     * Override this property in child classes with the appropriate view name.
     *
     * @var string|null
     */
    protected $viewName = 'crud/index';


    /**
     * Constructor.
     * Load the 'form' helper for form validation.
     */
    public function __construct()
    {
        helper('form');
    }

    /**
     * Index method to list records.
     * Override this method in child classes to customize the view and data.
     *
     * @return mixed
     */
    public function index()
    {
        $model = $this->getModel();
        $data['records'] = $model->findAll();
        return view($this->viewName, $data);
    }

    /**
     * Create a new record.
     * Override this method in child classes to handle custom data processing.
     *
     * @return mixed
     */
    public function create()
    {
        $model = $this->getModel();
        $data = $this->request->getPost();

        try {
            $this->validateData($data);
            $model->insert($data);
            return $this->response->setJSON(['message' => 'Record created successfully']);

        } catch (ValidationException $e) {
            return $this->response->setJSON(['errors' => $e->getErrors()]);
        }
    }

    /**
     * Edit a record by its ID.
     * Override this method in child classes to customize the response.
     *
     * @param int|null $id
     * @return mixed
     */
    public function edit($id = null)
    {
        $model = $this->getModel();
        if (empty($id) || !is_numeric($id)) {
            return $this->response->setJSON(['error' => 'Invalid record ID.'])->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST);
        }

        $record = $model->find($id);
        if ($record === null) {
            return $this->response->setJSON(['error' => 'Record not found.'])->setStatusCode(ResponseInterface::HTTP_NOT_FOUND);
        }

        return $this->response->setJSON(['data' => $record])->setStatusCode(ResponseInterface::HTTP_OK);
    }

    /**
     * Update a record.
     * Override this method in child classes to handle custom data processing.
     *
     * @return mixed
     */
    public function update()
    {
        $model = $this->getModel();
        $data = $this->request->getPost();

        try {
            $this->validateData($data);
            $id = $data['id'];
            $model->update($id, $data);
            return $this->response->setJSON(['message' => 'Record updated successfully']);

        } catch (ValidationException $e) {
            return $this->response->setJSON(['errors' => $e->getErrors()]);
        }
    }

    /**
     * Delete a record by its ID.
     * Override this method in child classes to customize the response.
     *
     * @param int|null $id
     * @return mixed
     */
    public function delete($id = null)
    {
        $model = $this->getModel();
        if (empty($id) || !is_numeric($id)) {
            return $this->response->setJSON(['error' => 'Invalid record ID.'])->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST);
        }

        $record = $model->find($id);
        if ($record === null) {
            return $this->response->setJSON(['error' => 'Record not found.'])->setStatusCode(ResponseInterface::HTTP_NOT_FOUND);
        }

        $model->delete($id);
        return $this->response->setJSON(['message' => 'Record deleted successfully'])->setStatusCode(ResponseInterface::HTTP_OK);
    }

    /**
     * Get the model instance.
     * Override this method in child classes to return the model instance.
     *
     * @return mixed
     */
    abstract protected function getModel();

    /**
     * Get the validation rules for the model.
     * Override this method in child classes to return the specific validation rules.
     *
     * @return array
     */
    protected function getValidationRules()
    {
        return [
            // Default validation rules for the model (override in child classes if needed).
        ];
    }

    /**
     * Get the validation messages for the model.
     * Override this method in child classes to return the specific validation messages.
     *
     * @return array
     */
    protected function getValidationMessages()
    {
        return [
            // Default validation messages for the model (override in child classes if needed).
        ];
    }

    /**
     * Validate the data using the provided validation rules and messages.
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException
     */
    protected function validateData(array $data)
    {
        $validation = Services::validation();
        $validation->setRules($this->getValidationRules(), $this->getValidationMessages());
    
        if (!$validation->run($data)) {
            return $this->response->setJSON(['errors' => $validation->getErrors()]);
        }
    }
    
}
