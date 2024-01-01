<?php

namespace Kehet\LaravelOwnableModel\Commands;

use Illuminate\Console\Command;

class LaravelOwnableModelCommand extends Command
{
    public $signature = 'laravel-ownable-model';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
