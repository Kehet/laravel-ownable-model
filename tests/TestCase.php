<?php

namespace Kehet\LaravelOwnableModel\Tests;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Kehet\LaravelOwnableModel\LaravelOwnableModelServiceProvider;
use Kehet\LaravelOwnableModel\Tests\Models\User;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase();
    }

    protected function getPackageProviders($app): array
    {
        return [
            LaravelOwnableModelServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('auth.providers.users.model', User::class);
        config()->set('ownable-model.owner', User::class);
    }

    public function setUpDatabase(): void
    {
        Schema::dropAllTables();

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->integer('owned_by_id')->unsigned();
            $table->string('body');
            $table->timestamps();
        });
    }
}
