<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\HistoryBet;
use App\Models\User;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class dailibetController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */

    protected $title = 'danh sách cá cược';

    protected function grid()
    {
        $user = User::find(Admin::user()->id);
        return Grid::make(\App\Models\HistoryBet::with('user')->whereRelation('user','key',$user->key)->orderByDesc('id'), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('user.name');
            $grid->column('user.mobile');
            $grid->column('category');
            $grid->column('luotso');
            $grid->column('cachchoi');
            $grid->column('infor_bet');
            $grid->column('sodoncuoc');
            $grid->column('capdonhan');
            $grid->column('money');
            $grid->column('status');
            $grid->column('thangthua');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
            });
            $grid->disableCreateButton();
            $grid->disableEditButton();
            $grid->disableDeleteButton();
            $grid->quickSearch('user.name','user.mobile');
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new HistoryBet(), function (Show $show) {
            $show->field('id');
            $show->field('user_id');
            $show->field('category');
            $show->field('luotso');
            $show->field('cachchoi');
            $show->field('infor_bet');
            $show->field('sodoncuoc');
            $show->field('capdonhan');
            $show->field('money');
            $show->field('status');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new HistoryBet(), function (Form $form) {

        });
    }
}
