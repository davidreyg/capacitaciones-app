<?php

namespace App\Ship\Commands;

use App\Ship\Parents\Commands\ConsoleCommand;
use Artisan;

class ResetAppCommand extends ConsoleCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'capacitaciones:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset App (Migraciones, Seeders, etc...)!';

    private $array_commands = array();
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->initArray();
        $bar = $this->output->createProgressBar(count($this->array_commands));
        $bar->setFormat('%current%/%max% [%bar%] %message%  <fg=green>DONE</>');
        $bar->start();

        foreach ($this->array_commands as $key => $value) {
            $bar->setMessage($value['message']);
            $value['function']();
            $bar->advance();
            // $this->newLine();
        }
        $bar->finish();
        $this->newLine();
        $this->writeInfos();
        $this->newLine();

    }

    private function writeInfos()
    {
        foreach ($this->array_commands as $key => $value) {
            $this->info($value['info']);
        }
    }

    function initArray()
    {
        array_push(
            $this->array_commands,
            [
                'message' => 'Generating APP KEY ......',
                'function' => function () {
                    Artisan::call('key:generate --force');
                },
                'info' => '1. App Key generated successfully',
            ],
            [
                'message' => 'Running optimize clear...',
                'function' => function () {
                    Artisan::call('optimize:clear -n');
                    Artisan::call('icons:clear');
                    Artisan::call('config:clear');
                    Artisan::call('cache:clear');
                    Artisan::call('clear-compiled');
                    Artisan::call('filament:clear-cached-components');

                },
                'info' => '2. App clear successfully',
            ],
            [
                'message' => 'Storage link to public..',
                'function' => function () {
                    Artisan::call('storage:link');
                },
                'info' => '3. Storage link created',
            ],
            [
                'message' => 'Wiping DB Data............',
                'function' => function () {
                    Artisan::call('db:wipe --force');
                },
                'info' => '4. Data wiped successfully',
            ],
            [
                'message' => 'Running Migrations........',
                'function' => function () {
                    Artisan::call('migrate:refresh --seed --force');
                },
                'info' => '5. Migrations ran successfully',
            ],
            [
                'message' => 'Running Deploy Seeders........',
                'function' => function () {
                    Artisan::call('apiato:seed-deploy');
                },
                'info' => '6. Seeders de prueba ejecutados.',
            ],
            [
                'message' => 'Cache!',
                'function' => function () {
                    Artisan::call('optimize');
                    Artisan::call('config:cache');
                    Artisan::call('icons:cache');
                    Artisan::call('filament:cache-components');
                },
                'info' => '7. Seeders de prueba ejecutados.',
            ],

        );
    }
}

