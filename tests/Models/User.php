<?php

namespace Kehet\LaravelOwnableModel\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kehet\LaravelOwnableModel\Contracts\OwnerContract;

class User extends Authenticatable implements OwnerContract
{
    use HasFactory;

    protected $table = 'users';

    protected $guarded = [];
}
