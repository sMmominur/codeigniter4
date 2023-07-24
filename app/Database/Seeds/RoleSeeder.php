<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
class RoleSeeder extends Seeder
{
    public function run()
    {
        $roleData = [
            [
                'name'        => 'Super Admin',
                'status'      => 'active',
                'description' => 'administration features and all other features',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ],
            [
                'name'        => 'Admin',
                'status'      => 'active',
                'description' => 'all the administration features within a single site',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ],
            [
                'name'        => 'Editor',
                'status'      => 'active',
                'description' => 'publish and manage posts including the posts of other users',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ],
            [
                'name'        => 'Author',
                'status'      => 'active',
                'description' => 'publish and manage their own posts',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ],
            [
                'name'        => 'Contributor ',
                'status'      => 'active',
                'description' => 'write and manage their own posts but cannot publish them',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ],
            [
                'name'        => 'Subscriber',
                'status'      => 'active',
                'description' => 'Somebody who can only manage their profile',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ],
            [
                'name'        => 'Users',
                'status'      => 'active',
                'description' => 'Somebody who can use the system',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ]
        ];

        $this->db->table('roles')->insertBatch($roleData);
    }
}
