<?php

namespace Database\Populate;

use App\Models\User;

class UsersPopulate
{
    public static function populate()
    {
        $data =  [
            'name' => 'Eder Admin',
            'email' => 'admin@example.com',
            'address' => 'rua do sorvete 123',
            'phone_number' => '1298764321',
            'password' => '123456',
            'password_confirmation' => '123456',
            'role' => 'admin',
        ];

        $user = new User($data);
        $user->save();

        $data2 = [
            'name' => 'Bob Client',
            'email' => 'client@example.com',
            'address' => 'rua dos clientes 321',
            'phone_number' => '12312947124',
            'password' => '654321',
            'password_confirmation' => '654321',
            'role' => 'client',
        ];

        $user2 = new User($data2);
        $user2->save();

        // $numberOfUsers = 10;

        // for ($i = 1; $i < $numberOfUsers; $i++) {
        //     $data =  [
        //         'name' => 'Fulano ' . $i,
        //         'email' => 'fulano' . $i . '@example.com',
        //         'password' => '123456',
        //         'password_confirmation' => '123456'
        //     ];

        //     $user = new User($data);
        //     $user->save();
        // }

        // echo "Users populated with $numberOfUsers registers\n";
        echo "Usuários cadastrados\n";
    }
}