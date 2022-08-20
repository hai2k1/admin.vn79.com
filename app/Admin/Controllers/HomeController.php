<?php

namespace App\Admin\Controllers;

use App\Admin\Metrics\AllWorth;
use App\Admin\Metrics\AssetsWorthTrend;
use App\Admin\Metrics\BannerMaintenanceRecordCounts;
use App\Admin\Metrics\BannerMyAssetsWorth;
use App\Admin\Metrics\BannerMyTodoCounts;
use App\Admin\Metrics\BannerServiceIssueCounts;
use App\Admin\Metrics\BannerUserCount;
use App\Admin\Metrics\DefectTrend;
use App\Admin\Metrics\DeviceWorth;
use App\Admin\Metrics\Doanhthu;
use App\Admin\Metrics\naptien;
use App\Admin\Metrics\rutien;
use App\Admin\Metrics\PartWorth;
use App\Admin\Metrics\ServiceWorth;
use App\Admin\Metrics\SoftwareWorth;
use App\Admin\Metrics\WorthTrend;
use App\Http\Controllers\Controller;
use App\Support\Support;
use Dcat\Admin\Admin;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Card;

class HomeController extends Controller
{
    public function index(Content $content): Content
    {
        return $content
            ->title('Dashboard')
            ->description('Quản lí')
            ->body(function (Row $row) {

                // @permissions
                if (Admin::user()->can('home.asset.admin')) {
                    $row->column(3, new BannerUserCount());
                    $row->column(3, new BannerMyTodoCounts());
                }
                // @permissions
                if (Admin::user()->can('home.dashboard')) {
                    $row->column(12, '<hr>');
                    $row->column(12, function (Column $column) {
                        $column->row(function (Row $row) {
                            $row->column(4, function (Column $column) {
                                $column->row(new naptien());
                            });
                            $row->column(4, function (Column $column) {
                                $column->row(new rutien());
                            });
                            $row->column(4, function (Column $column) {
                                $column->row(new Doanhthu());
                            });
                        });
                    });
                }
            });
    }
}
