<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Slawek extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slawek:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Testowa komenda';

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
        $this->info('Jestem hakerem');
    }
}
