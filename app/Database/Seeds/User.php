<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'email'    => 'admin@admin.com',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'ip' => '127.0.0.1',
            'about_me' => 'I run this place',
            'job' => 'Administrator'
        ];

        $this->db->table('users')->insert($data);

        $data = [
            'username' => 'josh',
            'email'    => 'josh@joshgarlitz.com',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'ip' => '127.0.0.1',
            'about_me' => 'I like making things.',
            'job' => 'Developer'
        ];

        $this->db->table('users')->insert($data);
    }
}
