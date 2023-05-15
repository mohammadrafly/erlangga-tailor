<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = [    
            [        
                'username' => 'customer',        
                'email'    => 'customer@gmail.com',        
                'password' => password_hash('customer', PASSWORD_DEFAULT),       
                'role'     => 'customer',        
                'name'     => 'customer',
                'alamat'   => 'Jl. Kenanga No.41, Dadaprejo, Kec. Junrejo, Kota Batu, Jawa Timur 65233'    
            ],
            [        
                'username' => 'admin',        
                'email'    => 'admin@gmail.com',        
                'password' => password_hash('admin', PASSWORD_DEFAULT),       
                'role'     => 'admin',        
                'name'     => 'admin',   
                'alamat'   => '' 
            ],
        ];
        
        $this->db->table('users')->insertBatch($data);
    }
}
