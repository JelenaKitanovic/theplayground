<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as AuthenticateUser;

class User extends AuthenticateUser implements UserInterface
{
    protected $guarded = [];
}
