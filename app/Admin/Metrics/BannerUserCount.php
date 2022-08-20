<?php

namespace App\Admin\Metrics;

use App\Models\TodoRecord;
use App\Models\User;
use Closure;
use Dcat\Admin\Grid\LazyRenderable as LazyGrid;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Card;
use Illuminate\Contracts\Support\Renderable;

class BannerUserCount extends Card
{
    /**
     * @param string|Closure|Renderable|LazyWidget $content
     *
     * @return BannerMyTodoCounts
     */
    public function content($content): BannerUserCount
    {
        if ($content instanceof LazyGrid) {
            $content->simple();
        }
        $value = User::count();
        $text = 'Tổng người dùng';
        $this->noPadding();

        return $this;
    }
}
