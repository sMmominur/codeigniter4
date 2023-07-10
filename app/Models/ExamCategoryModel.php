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


}
