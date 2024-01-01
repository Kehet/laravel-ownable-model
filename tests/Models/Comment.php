<?php

namespace Kehet\LaravelOwnableModel\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kehet\LaravelOwnableModel\Contracts\OwnableContract;
use Kehet\LaravelOwnableModel\Traits\HasOwner;

class Comment extends Model implements OwnableContract
{
    use HasFactory;
    use HasOwner;

    protected $table = 'comments';

    protected $guarded = [];
}
