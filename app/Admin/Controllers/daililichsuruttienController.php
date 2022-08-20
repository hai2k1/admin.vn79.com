<?php

namespace App\Admin\Controllers;


use App\Models\HistoryPayment;
use App\Models\User;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class daililichsuruttienController extends AdminController
{

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected $title = 'Rút tiền';
    protected function grid()
    {
        $user = \App\Models\User::find(Admin::user()->id);
        return Grid::make(HistoryPayment::with('user')->whereRelation('user','key',$user->key)->where('type','Rút tiền')->orderByDesc('id'), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('user.name','tên người dùng');
            $grid->column('bank_id','Số tài khoản');
            $grid->column('user.mobile','số điện thoại');
            $grid->column('money','tiền')->display(function ($money){
                return number_format($money) .' vnđ';
            });
            $grid->column('bank_name','tên ngân hàng');
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

}
