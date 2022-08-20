<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class checkkq implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
    public function validate($dieukien, $capdonhan, $bet)
    {
        if (!is_array($dieukien)) {
            $dieukien = [1];
        }
        if ($dieukien) {
            $bet->thangthua = $bet->capdonhan * count($dieukien) * 1000 * $capdonhan - $bet->money;
            $bet->status = 0;
            $user = User::find($bet->user_id);
            if ($bet->thangthua > 0) {
                $user->money = $user->money + $bet->capdonhan * count($dieukien) * 1000 * $capdonhan;
                $user->save();
            }
            $bet->save();
        } else {
            $bet->status = 0;
            $bet->save();
        }
    }
}
