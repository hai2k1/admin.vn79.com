<?php

namespace App\Console\Commands;


use App\Admin\Repositories\HistoryBet;
use App\Jobs\checkkq;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class check_kqxs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kqxs:check {name} {value}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kiem tra kqxs';

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle()
    {
        $lo2so = [];
        $infor_bet = [];
        $lo4so = [];
        $lo3so = [];
        $value = $this->argument('value');
        $name = $this->argument('name');
        $response = Http::get("https://xskt.vip/api/front/open/lottery/history/list/1/$value");

        $start = Carbon::create($response->json()['t']['openTime'])->timestamp;
        $end = Carbon::create($response->json()['t']['serverTime'])->timestamp;

        $timeshow = Carbon::create($response->json()['t']['issueList'][0]['openTime'])->timestamp;
        if ($start - $end < $start - $timeshow) {
            sleep($start - $end+2);
        }
        $response = Http::get("https://xskt.vip/api/front/open/lottery/history/list/1/$value");
        Log::info($response);
        $bets = HistoryBet::getbets($name, $response->json()['t']['issueList'][0]['openTime'], $response->json()['t']['openTime']);
        $kqs = trim($response->json($key = null)['t']['issueList']['0']['detail'], '[]"');
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

        return true;
    }

}
