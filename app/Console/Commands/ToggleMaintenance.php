<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ToggleMaintenance extends Command
{
    protected $signature = 'maintenance:toggle {mode : The mode to set (on/off)}';
    protected $description = 'Toggle maintenance mode';

    public function handle()
    {
        $mode = $this->argument('mode');
        $envFile = base_path('.env');
        $contents = File::get($envFile);

        if ($mode === 'on') {
            $contents = preg_replace('/MAINTENANCE_MODE=(.*)/', 'MAINTENANCE_MODE=true', $contents);
            $this->info('Maintenance mode enabled');
        } else {
            $contents = preg_replace('/MAINTENANCE_MODE=(.*)/', 'MAINTENANCE_MODE=false', $contents);
            $this->info('Maintenance mode disabled');
        }

        File::put($envFile, $contents);
    }
}