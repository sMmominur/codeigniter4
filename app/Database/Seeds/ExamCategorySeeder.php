<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ExamCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'exam_category_name' => 'Half Yearly Examination',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
            [
                'exam_category_name' => 'Pre Test Examination',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
            [
                'exam_category_name' => 'Test Examination',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
            [
                'exam_category_name' => 'Final Examination',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
        ];

        $this->db->table('exam_category')->insertBatch($data);
    }
}
