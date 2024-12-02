<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearAllCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear route, config, view, and cache';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('route:clear');
        $this->call('config:clear');
        $this->call('view:clear');
        $this->call('cache:clear');

        $this->info('All caches have been cleared!');

        return 0;
    }
}
