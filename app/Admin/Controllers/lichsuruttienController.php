<?php

namespace App\Admin\Controllers;


use App\Models\HistoryPayment;
use App\Models\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class lichsuruttienController extends AdminController
{

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected $title = 'Rút tiền';
    protected function grid()
    {

        return Grid::make(HistoryPayment::with('user')->where('type','Rút tiền')->orderByDesc('id'), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('user.name','tên người dùng');
            $grid->column('bank_id','Số tài khoản');
            $grid->column('user.mobile','số điện thoại');
            $grid->column('money','tiền')->display(function ($money){
                return number_format($money) .' vnđ';
            });
            $grid->column('description','mô tả');
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

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new HistoryPayment(), function (Form $form) {
            $form->display('id');
            $form->text('user_id')->disable();
            $form->display('bank_id');
            $form->display('money');
            $form->display('bank_name');
            $form->display('banker');
            $form->display('type');
            if($form->model()->status == 1){
                $form->switch('status','trạng thái')
                    ->saving(function ($v) {
                        return $v;
                    })->disable()->default(0);
            }
            else{
                $form->switch('status','trạng thái')
                    ->saving(function ($v) {
                        return $v;
                    });
            }
            $form->display('created_at');
            $form->display('updated_at');

        });
    }
}
