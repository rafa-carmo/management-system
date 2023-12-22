<?php

namespace App\Console\Commands\Docker;

use Exception;
use Illuminate\Console\Command;

class start extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docker:start {type?} {--d|detach?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to start docker containers in specific type';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $types = [
            "full" => "docker-compose.yml",
        ];
        $selectedType = $types[$this->argument('type') ?? 'full'];

        $detach = ($this->option('detach?')) ? '-d' : '';
        $this->info("Starting docker services");
        try {
            passthru("docker compose -f $selectedType up $detach");
        } catch(Exception) {
            $this->error("[General error] - Make sure your docker is running");
        }
        //
    }
}
