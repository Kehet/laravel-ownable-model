<?php

namespace Kehet\LaravelOwnableModel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Kehet\LaravelOwnableModel\LaravelOwnableModel
 */
class LaravelOwnableModel extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Kehet\LaravelOwnableModel\LaravelOwnableModel::class;
    }
}
