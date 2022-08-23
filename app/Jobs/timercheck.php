<?php

namespace App\Jobs;

use App\Admin\Repositories\HistoryBet;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class timercheck implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $value;
    protected $name;
    public function __construct($value,$name)
    {
        //
        $this->value = $value;
        $this->name = $name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $value = $this->value;
        $name = $this->name;
        $data = Http::get("https://xskt.vip/api/front/open/lottery/history/list/1/$value");
        $bets = HistoryBet::getbets($name, $data->json()['t']['issueList'][0]['openTime'], $data->json()['t']['openTime']);
        $kqs = trim($data->json($key = null)['t']['issueList']['0']['detail'], '[]"');
        $kqs = str_replace('"', '', $kqs);
        $arraykq = explode(',', $kqs);
        foreach ($arraykq as $kq) {
            $lo2so[] = substr($kq, -2);
            if (strlen($kq) > 2) {
                $lo3so[] = substr($kq, -3);
            }
            if (strlen($kq) > 3) {
                $lo4so[] = substr($kq, -4);
            }
        }
        foreach ($bets as $bet) {
            checkkq::dispatch($bet,$lo2so,$lo3so,$lo4so);
        }
    }
}
