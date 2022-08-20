<?php

namespace App\Admin\Metrics;

use App\Models\DeviceRecord;
use App\Models\HistoryPayment;
use App\Models\PartRecord;
use App\Models\ServiceRecord;
use App\Models\SoftwareRecord;
use App\Models\User;
use App\Support\Support;
use Carbon\Carbon;
use Dcat\Admin\Admin;
use Dcat\Admin\Widgets\Metrics\Line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class naptien extends Line
{
    /**
     * 图表默认高度.
     *
     * @var int
     */
    protected $chartHeight = 53;
    protected $height = 53;
    protected $chartMarginRight = 1;

    /**
     * 处理请求
     *
     * @param Request $request
     *
     * @return mixed|void
     */
    public function handle(Request $request)
    {
        $year_all = 0;
        $history = HistoryPayment::with('user');
        $time = Carbon::now();
        $user = User::find(Admin::user()->id);

        try {
            if ($request->get('option') == 'current_year') {
                $totalmoney = $history->whereRelation('user', 'key', $user->key)->whereYear('created_at', $time->year());
                $year_all = $totalmoney->where('type', 'Nạp Tiền')->sum('money');
            }
            if ($request->get('option') == 'month') {
                $totalmoney = $history->whereRelation('user', 'key', $user->key)->whereBetween('created_at', [$time->startOfMonth(), $time->endOfMonth()]);
                $year_all = $totalmoney->where('type', 'Nạp Tiền')->sum('money');
            }
            if ($request->get('option') == 'day') {
                $totalmoney = $history->whereRelation('user', 'key', $user->key)->whereBetween('created_at', [$time->startOfDay(), $time->endOfDay()]);
                $year_all = $totalmoney->where('type', 'Nạp Tiền')->sum('money');
            }
        }
        catch (\Exception $e) {

        }

        $data = [];
         $this->withContent("tổng: $year_all");

        // 图表数据
        $this->withChart($data);
    }

    /**
     * 设置卡片内容.
     *
     * @param string $content
     *
     * @return naptien
     */
    public function withContent(string $content): naptien
    {
        return $this->content(
            <<<HTML
<div class="d-flex justify-content-between align-items-center mt-1" style="margin-bottom: 2px">
    <h4 class="ml-1">{$content}</h4>
</div>
HTML
        );
    }

    /**
     * 设置图表数据.
     *
     * @param array $data
     *
     * @return naptien
     */
    public function withChart(array $data): naptien
    {
        $this->chartOptions['tooltip']['x']['show'] = true;

        return $this->chart([
            'series' => [
                [
                    'name' => 'Tháng',
                    'data' => $data,
                ],
            ],
            'tooltip' => [
                'x' => [
                    'show' => true,
                ],
            ],
        ]);
    }

    /**
     * 初始化卡片内容.
     *
     * @return void
     */
    protected function init()
    {
        parent::init();

        $this->title('Nạp tiền');
        $this->dropdown([
            'current_year' => '1 năm',
            'month' => '1 tháng',
            'day' => '1 ngày',
        ]);
    }
}
