<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username'  => 'admin',
                'email'     => 'admin@testcode.com',
                'password'  => password_hash('admin123', PASSWORD_DEFAULT),
                'name'      => 'Administrator',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'  => 'editor',
                'email'     => 'editor@testcode.com',
                'password'  => password_hash('editor123', PASSWORD_DEFAULT),
                'name'      => 'Editor',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

         $this->db->table('users')->insertBatch($data);
    }
}
