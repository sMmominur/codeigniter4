<?php

namespace App\Controllers;

use App\Controllers\Generic\GenericCrudController;
use App\Models\PermissionModel;

class PermissionsController extends GenericCrudController
{
    /**
     * The model name to be used for CRUD operations.
     * Override this property in child classes with the appropriate model class name.
     *
     * @var string
     */
    protected $modelName = PermissionModel::class;

    // Override the $viewName property to specify a custom view for the index page.
    protected $viewName = 'permissions/index';

    /**
     * Get the model instance.
     * Override this method in child classes to return the model instance.
     *
     * @return mixed
     */
    protected function getModel()
    {
        return new $this->modelName;
    }

    

    /**
     * Get the validation rules for the model.
     * Override this method in child classes to return the specific validation rules.
     *
     * @return array
     */
    protected function getValidationRules()
    {
        return [
            'name' => 'required|min_length[3]|max_length[50]',
            'description' => 'required|min_length[3]|max_length[100]',
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
            'name' => [
                'required' => 'The name field is required.',
                'min_length' => 'The name field must be at least {param} characters long.',
                'max_length' => 'The name field must not exceed {param} characters.',
            ],
            'description' => [
                'required' => 'The description field is required.',
                'min_length' => 'The description field must be at least {param} characters long.',
                'max_length' => 'The description field must not exceed {param} characters.',
            ],
        ];
    }

    // Customization: You can add additional methods specific to the 'PermissionsController'.
}
