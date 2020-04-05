<?php

namespace Hayrullah\RecordErrors\Commands;

use Illuminate\Console\Command;

class CacheCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'record_errors:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cache command for cache all of view, route, config';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('config:cache');
        $this->call('event:cache');
        $this->call('route:cache');
//        $this->call('route:trans:cache');
        $this->call('view:cache');
    }
}
