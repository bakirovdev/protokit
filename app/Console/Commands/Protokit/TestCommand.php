<?php

namespace App\Console\Commands\Protokit;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Psy\Readline\Hoa\StreamOut;
use Symfony\Component\Console\Output\StreamOutput;

class TestCommand extends Command
{
    protected $signature = 'protokit:test';

    protected $description = 'Testing';

    public function handle():void
    {
        $stream = fopen('php://output', 'w');

        Artisan::call('protokit:migrate');
        Artisan::call('test', [], new StreamOutput($stream));
    }
}
