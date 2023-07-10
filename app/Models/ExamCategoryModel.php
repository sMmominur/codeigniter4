<?php

namespace App\Models;

use CodeIgniter\Model;

class ExamCategoryModel extends Model
{
    protected $table = 'exam_category';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'exam_category_name',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $validationRules = [
        'exam_category_name' => 'required|min_length[3]|max_length[80]',
        'school_id' => 'required|integer'
    ];


    protected $validationMessages = [
        'exam_category_name' => [
            'required' => 'The exam category name is required.',
            'min_length' => 'The exam category name must be at least 3 characters long.',
            'max_length' => 'The exam category name must not exceed 255 characters.'
        ],
        'school_id' => [
            'required' => 'The school ID is required.',
            'integer' => 'The school ID must be an integer.'
        ]
    ];


    public function getAllCategories()
    {
        return $this->findAll();
    }

    public function getCategory($id)
    {
        return $this->find($id);
    }

    public function createCategory($data)
    {
        return $this->insert($data);
    }

    public function updateCategory($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteCategory($id)
    {
        return $this->delete($id);
    }
}
