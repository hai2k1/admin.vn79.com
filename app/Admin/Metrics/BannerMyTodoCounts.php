<?php

namespace App\Admin\Metrics;

use App\Models\TodoRecord;
use Closure;
use Dcat\Admin\Grid\LazyRenderable as LazyGrid;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Card;
use Illuminate\Contracts\Support\Renderable;

class BannerMyTodoCounts extends Card
{
    /**
     * @param string|Closure|Renderable|LazyWidget $content
     *
     * @return BannerMyTodoCounts
     */
    public function content($content): BannerMyTodoCounts
    {
        if ($content instanceof LazyGrid) {
            $content->simple();
        }
        $value = TodoRecord::where('user_id', auth('admin')->user()->id)->count();
        $text = trans('main.my_todo_counts');
//        $route = admin_route('todo.records.index', ['user_id' => auth('admin')->user()->id]);
        $bg = url('static/images/blue.png');
        $html = <<<HTML


HTML;

        $this->content = $this->formatRenderable($html);
        $this->noPadding();

        return $this;
    }
}
