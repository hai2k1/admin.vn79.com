<?php

namespace App\Console;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        Commands\check_kqxs::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->command('kqxs:check "Siêu Tốc 45 Giây" st45g')->runInBackground();
        $schedule->command('kqxs:check "Siêu Tốc 1 Phút" st1p')  ->runInBackground();
        $schedule->command('kqxs:check "Siêu Tốc 2 Phút" st2p')->cron("2 * * * *")->runInBackground();
        $schedule->command('kqxs:check "Siêu tốc 1.5 phút" st90p')->runInBackground();

//        $schedule->command('kqxs:check "Miền Bắc" miba')->cron("30 * * * *");
//        $schedule->command('kqxs:check "Hà Nội" hano')->daily();
//        $schedule->command('kqxs:check "Bạc Liêu" bali')->daily();

    }


    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
