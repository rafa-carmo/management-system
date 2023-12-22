<?php

namespace App\Console\Commands\Docker;

use Illuminate\Console\Command;

class stopservices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docker:stop {type?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for stop containers docker started in detach mode';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $types = [
            "full" => "docker-compose.yml",
        ];
        $selected = $types[$this->argument('type') ?? 'full'];
        passthru("docker compose -f $selected down");
        $this->info("Services Stopped");

    }
}
