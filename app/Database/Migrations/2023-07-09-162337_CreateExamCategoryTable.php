<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateExamCategoryTable extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'school_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['active', 'inactive','trash'],
                'default' => 'active',
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            
        ]);
        $this->forge->addKey('id', true);
        //$this->forge->addForeignKey('school_id', 'schools', 'id');
        $this->forge->createTable('exam_category');
    }

    public function down()
    {
        $this->forge->dropTable('exam_category');
    }
}
