<?php

namespace App\Module;

use App\Models\User;

class UserRepository
{
    public function store(array $rowProperties)
    {
        User::insert([
            'name' => $rowProperties['name'],
            'email' => $rowProperties['email'],
            'birthday' => $rowProperties['birthday'],
            'phone' => $rowProperties['phone'],
            'ip' => $rowProperties['ip'],
            'country' => $rowProperties['country']
        ]);
    }
}