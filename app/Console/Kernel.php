<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\LogDemo::class,
        //Commands\EmailSeq::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('log:demo')->everyMinute();
        $schedule->command('email:send')->everyMinute();
        $schedule->command('command:upost')->monthly();
        // $schedule->call(function () {
        //     //DB::table('business')->where('id', $this->id)->delete();
        //     $id = $this->id+1;
        //     echo $id;
        // })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
