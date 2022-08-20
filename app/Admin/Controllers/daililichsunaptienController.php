<?php

namespace App\Admin\Controllers;


use App\Models\HistoryPayment;
use App\Models\User;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class daililichsunaptienController extends AdminController
{

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected $title = 'Nạp tiền';
    protected function grid()
    {
        $user = \App\Models\User::find(Admin::user()->id);

        return Grid::make(HistoryPayment::with('user')->whereRelation('user','key',$user->key)->where('type','Nạp Tiền')->orderByDesc('id'), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('user.name','tên người dùng');
            $grid->column('bank_id','tên ngân hàng');
            $grid->column('user.mobile');
            $grid->column('money')->display(function ($money){
                return number_format($money) .' vnđ';
            });
            $grid->column('bank_name','tên tài khoản');
            $grid->column('banker','chủ tài khoản');
            $grid->column('status')->using([ 'Đang chờ duyệt','đã duyệt'])->badge([
                'default' => 'success',
                0 => 'danger',
                1 => 'success'
            ]);
            $grid->column('type');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->like('bank_id','ngân hàng');
            });
            $grid->disableCreateButton();
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
        return Show::make($id, new HistoryPayment(), function (Show $show) {
            $show->field('id');
            $show->field('user_id');
            $show->field('bank_id');
            $show->field('money');
            $show->field('bank_name');
            $show->field('banker');
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
    }
}
