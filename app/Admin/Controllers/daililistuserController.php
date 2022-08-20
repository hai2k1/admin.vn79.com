<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\BatchAction\UserBatchDeleteAction;
use App\Admin\Actions\Grid\BatchAction\UserBatchForceDeleteAction;
use App\Admin\Actions\Grid\RowAction\UserDeleteAction;
use App\Admin\Actions\Grid\ToolAction\UserImportAction;
use App\Admin\Grid\Displayers\RowActions;
use App\Admin\Repositories\User;
use App\Form;
use App\Models\Department;
use App\Support\Data;
use App\Traits\ControllerHasTab;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\UserController as BaseUserController;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;
use Dcat\Admin\Widgets\Tab;
use Dcat\Admin\Widgets\Tree;
use Illuminate\Http\Request;

/**
 * @property int ad_tag
 */
class daililistuserController extends BaseUserController
{
    use ControllerHasTab;

    /**
     * 标签布局.
     * @return Row
     */
    public function tab(): Row
    {
        $row = new Row();
        $tab = new Tab();
        $tab->add(Data::icon('user') . 'Người dùng', $this->renderGrid(), true);
        $row->column(12, $tab);
        return $row;
    }

    /**
     * ajax联动选择.
     * @param Request $request
     * @return mixed
     */
    public function selectList(Request $request): mixed
    {
        $q = $request->get('q');

        return \App\Models\User::where('name', 'like', "%$q%")
            ->paginate(null, ['id', 'name as text']);
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    public function form()
    {

    }
    protected $title = 'Danh sách thành viên của đại lí';
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        $user = \App\Models\User::find(Admin::user()->id);
        return Grid::make(\App\Models\User::with(['roles', 'department'])->where('key',$user->key), function (Grid $grid) {
            $grid->column('id');
            $grid->column('username');
            $grid->column('name')->display(function ($name) {
                if ($this->ad_tag === 1) {
                    return "<span class='badge badge-primary mr-1'>AD</span>$name";
                }

                return $name;
            });
            $grid->column('gender');
            $grid->column('status')->using(['Tài khoản bị đóng băng', 'tài khoản bình thường'])->badge([
                'default' => 'success',
                0 => 'danger',
                1 => 'success'
            ]);
            $grid->column('money')->display(function ($money){
                return number_format($money). " vnđ";
            });
            $grid->column('department.name');
            $grid->column('title');
            $grid->column('mobile');
            $grid->column('email');
            $grid->showColumnSelector();
            $grid->hideColumns([
                'department.name',
                'title',
                'email',
            ]);
            $grid->disableCreateButton();

            $grid->batchActions(function (Grid\Tools\BatchActions $batchActions) {
                // @permissions
                if (Admin::user()->can('user.batch.delete')) {
                    $batchActions->add(new UserBatchDeleteAction());
                }
                // @permissions
                if (Admin::user()->can('user.batch.force.delete')) {
                    $batchActions->add(new UserBatchForceDeleteAction());
                }
            });

            /**
             * 行内操作.
             */
            $grid->actions(function (RowActions $actions) {
                // @permissions
                if (Admin::user()->can('user.delete')) {
                    $actions->append(new UserDeleteAction());
                }
            });

            /**
             * 工具按钮.
             */
            $grid->tools(function (Grid\Tools $tools) {
                // @permissions
                if (Admin::user()->can('user.import')) {
                    $tools->append(new UserImportAction());
                }
            });

            /**
             * 快速搜索.
             */
            $grid->quickSearch('id', 'username', 'name', 'department.name', 'gender', 'title', 'mobile', 'email')
                ->placeholder(trans('main.quick_search'))
                ->auto(false);

            /**
             * 筛选.
             */
            $grid->filter(function ($filter) {
                if (admin_setting('switch_to_filter_panel')) {
                    $filter->panel();
                }
                $filter->scope('history', admin_trans_label('Deleted'))->onlyTrashed();
                $filter->equal('department_id')->select(Department::pluck('name', 'id'));
            });

            /**
             * 按钮控制.
             */

            $grid->disableDeleteButton();
            $grid->disableBatchDelete();
            $grid->toolsWithOutline(false);
            // @permissions
//            if (!Admin::user()->can('user.create')) {
//                $grid->disabeCreateButton();
//            }
            // @permissions
            if (!Admin::user()->can('user.update')) {
                $grid->disableEditButton();
            }
            // @permissions
            if (Admin::user()->can('user.export')) {
                $grid->export();
            }

        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id): Show
    {
        return Show::make($id, User::with(['roles', 'department']), function (Show $show) {
            $show->field('id');
            $show->field('name')->unescape()->as(function ($name) {
                if ($this->ad_tag === 1) {
                    return "<span class='badge badge-primary mr-1'>AD</span>$name";
                }

                return $name;
            });
            $show->field('avatar', __('admin.avatar'))->image();
            $show->field('department.name');
            $show->field('gender');
            $show->field('status')->using(['账号冻结', '账号正常']);
            $show->field('title');
            $show->field('mobile');
            $show->field('email');

            if (config('admin.permission.enable')) {
                $show->field('roles')->as(function ($roles) {
                    if (!$roles) {
                        return;
                    }

                    return collect($roles)->pluck('name');
                })->label();

                $show->field('permissions')->unescape()->as(function () {
                    $roles = $this->roles->toArray();

                    $permissionModel = config('admin.database.permissions_model');
                    $roleModel = config('admin.database.roles_model');
                    $permissionModel = new $permissionModel();
                    $nodes = $permissionModel->allNodes();

                    $tree = Tree::make($nodes);

                    $isAdministrator = false;
                    foreach (array_column($roles, 'slug') as $slug) {
                        if ($roleModel::isAdministrator($slug)) {
                            $tree->checkAll();
                            $isAdministrator = true;
                        }
                    }

                    if (!$isAdministrator) {
                        $keyName = $permissionModel->getKeyName();
                        $tree->check(
                            $roleModel::getPermissionId(array_column($roles, $keyName))->flatten()
                        );
                    }

                    return $tree->render();
                });
            }

            $show->field('created_at');
            $show->field('updated_at');

            /**
             * 按钮控制.
             */
            $show->disableDeleteButton();
            // @permissions
            if (!Admin::user()->can('user.update')) {
                $show->disableEditButton();
            }
        });
    }
}
