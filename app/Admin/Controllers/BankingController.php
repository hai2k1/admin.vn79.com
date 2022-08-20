<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Banking;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class BankingController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Banking(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('bank_id');
            $grid->column('bank_name');
            $grid->image('image');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
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
        return Show::make($id, new Banking(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('bank_id');
            $show->field('bank_name');
            $show->field('image');
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
        return Form::make(new Banking(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('bank_id');
            $form->text('bank_name');
            $form->text('image')->default('abc.jpg');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
