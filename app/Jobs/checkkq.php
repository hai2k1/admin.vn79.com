<?php

namespace App\Jobs;

use App\Models\HistoryBet;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class checkkq implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $historyBet;
    protected $lo2so;
    protected $lo3so;
    protected $lo4so;

    public function __construct(HistoryBet $historyBet,$lo2so,$lo3so,$lo4so)
    {
         $this->historyBet = $historyBet;
         $this->lo2so = $lo2so;
         $this->lo3so = $lo3so;
         $this->lo4so = $lo4so;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $bet =$this->historyBet;
        $lo2so = $this->lo2so;
        $lo3so = $this->lo3so;
        $lo4so = $this->lo4so;
        if (strpos($bet->infor_bet, ',')) {
            $infor_bet = explode(',', $bet->infor_bet);
        } else {
            $infor_bet[] = $bet->infor_bet;
        }
        switch ($bet->cachchoi) {
            case 'Bao Lô - Lô 2 Số':

                if ($result = array_intersect($lo2so, $infor_bet)) {
                    $this->validate($result, 99.5, $bet);

                } else {
                    $this->validate(false, 0, $bet);
                }
                break;
            case 'Bao Lô - Lô 2 Số 1K':
                if ($result = array_intersect($lo2so, $infor_bet)) {
                    $this->validate($result, 5.5, $bet);
                } else {
                    $this->validate(false, 0, $bet);
                }
                break;
            case 'Bao Lô - Lô 3 Số':
                if ($result = array_intersect($lo3so, $infor_bet)) {
                    $this->validate($result, 5.5, $bet);
                } else {
                    $this->validate(false, 0, $bet);
                }
                break;
            case 'Bao Lô - Lô 4 Số':
                if ($result = array_intersect($lo4so, $infor_bet)) {
                    $this->validate($result, 8880, $bet);
                } else {
                    $this->validate(false, 0, $bet);
                }
                break;
            case 'Lô Xiên - Xiên 3':
                if ($result = array_diff($infor_bet, $lo2so)) {
                    if (count($result) == 0) {
                        $this->validate($result, 150, $bet);

                    } else {
                        $this->validate(false, 0, $bet);
                    }

                } else {
                    $this->validate(false, 0, $bet);
                }
                break;
            case 'Lô Xiên - Xiên 4':
                if ($result = array_diff($infor_bet, $lo2so)) {
                    if (count($result) == 0) {
                        $this->validate($result, 750, $bet);
                    } else {
                        $this->validate(false, 0, $bet);
                    }
                } else {
                    $this->validate(false, 0, $bet);
                }
                break;
            case 'Đánh Đề - Đề đầu':
                if (in_array($lo2so[-1], $infor_bet)) {
                    $this->validate(true, 99, $bet);
                } else {
                    $this->validate(false, 0, $bet);
                }
                break;
            case 'Đánh Đề - Đề đặc biệt':
                if (in_array($lo2so[0], $infor_bet)) {
                    $this->validate(true, 99, $bet);
                } else {
                    $this->validate(false, 0, $bet);
                }
                break;
            case 'Đánh Đề - Đề đầu đuôi':
                if (in_array($lo2so[0], $infor_bet) or in_array($lo2so[-1], $infor_bet)) {
                    $this->validate(true, 99, $bet);
                } else {
                    $this->validate(false, 0, $bet);
                }
                break;
            case 'Đầu Đuôi - Đầu':
                if (in_array($lo2so[0][0], $infor_bet)) {
                    $this->validate(true, 9.9, $bet);
                } else {
                    $this->validate(false, 0, $bet);
                }
                break;
            case 'Đầu Đuôi - Đuôi':
                if (in_array($lo2so[0][-1], $infor_bet)) {
                    $this->validate(true, 9.9, $bet);
                } else {
                    $this->validate(false, 0, $bet);
                }
                break;
            case'3 Càng - 3 Càng Đầu':
                if (in_array($lo3so[-1], $infor_bet)) {
                    $this->validate(true, 960, $bet);
                } else {
                    $this->validate(false, 0, $bet);
                }
                break;
            case '3 Càng - 3 Càng Đặc Biệt':
                if (in_array($lo3so[0], $infor_bet)) {
                    $this->validate(true, 960, $bet);
                } else {
                    $this->validate(false, 0, $bet);
                }
                break;
            case '3 Càng - 3 Càng Đầu Đuôi':
                if (in_array($lo3so[0], $infor_bet) or in_array($lo3so[-1], $infor_bet)) {
                    $this->validate(true, 960, $bet);
                } else {
                    $this->validate(false, 0, $bet);
                }
                break;
            case '4 Càng - 4 Càng Đặc Biệt':
                if (in_array($lo4so[0], $infor_bet)) {
                    $this->validate(true, 9000, $bet);
                } else {
                    $this->validate(false, 0, $bet);
                }
                break;
            case'Lô Trượt - Trượt Xiên 4':
                if ($result = array_intersect($lo4so, $infor_bet)) {
                    if (count($result) == 4) {
                        $this->validate(true, 2, $bet);
                    } else {
                        $this->validate(false, 0, $bet);
                    }
                } else {
                    $this->validate(false, 0, $bet);
                }
                break;
            case'Lô Trượt - Trượt Xiên 8':
                if ($result = array_intersect($lo4so, $infor_bet)) {
                    if (count($result) == 8) {
                        $this->validate(true, 3.5, $bet);
                    } else {
                        $this->validate(false, 0, $bet);
                    }
                } else {
                    $this->validate(false, 0, $bet);
                }
                break;
            case'Lô Trượt - Trượt Xiên 10':
                if ($result = array_intersect($lo4so, $infor_bet)) {
                    if (count($result) == 10) {
                        $this->validate(true, 4.5, $bet);
                    } else {
                        $this->validate(false, 0, $bet);
                    }
                } else {
                    $this->validate(false, 0, $bet);
                }
                break;
            case 'Trò chơi thú vị - Tổng Giá Trị':

                $total = $lo2so[0][1] + $lo2so[0][0];

                $capdonhan = 0;
                $result = [];
                if($total > 9){
                    $result = ['tai'];
                }
                else{
                    $result = ['xiu'];
                }
                if($lo2so[0]%2== 0){
                    $result[] = 'chan';
                }
                else{
                    $result[] = 'le';
                }
                if(in_array($total,$infor_bet)){
                    $capdonhan += 2;
                    $result[] = "$total";
                }
                if($check = array_intersect($result, $infor_bet)){
                    $this->validate($check, 1.95+$capdonhan, $bet);
                }
                else{
                    $this->validate(false, 0, $bet);
                }

                break;
            case 'Trò chơi thú vị - Lớn Nhỏ Chẳn Lẻ':
                $total = $lo2so[0][1] + $lo2so[0][0];
                if($total > 9){
                    $result = ['tai'];
                }
                else{
                    $result = ['xiu'];
                }
                if($lo2so[0]%2== 0){
                    $result[] = 'chan';
                }
                else{
                    $result[] = 'le';
                }
                if($check = array_intersect($result, $infor_bet)){

                    $this->validate($check, 1.99, $bet);
                }
                else{
                    $this->validate(false, 0, $bet);
                }
                break;
            default:
                $this->validate(true, 0, $bet);
                break;
        }
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
