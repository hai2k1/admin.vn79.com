<?php

use App\Admin\Controllers\CheckRecordController;
use App\Admin\Controllers\ConsumableCategoryController;
use App\Admin\Controllers\CustomColumnUpdateController;
use App\Admin\Controllers\DepartmentController;
use App\Admin\Controllers\DepreciationRuleController;
use App\Admin\Controllers\DeviceCategoryController;
use App\Admin\Controllers\DevicePrintController;
use App\Admin\Controllers\DeviceRecordController;
use App\Admin\Controllers\DeviceStatisticsController;
use App\Admin\Controllers\DeviceTagController;
use App\Admin\Controllers\NotificationController;
use App\Admin\Controllers\PartCategoryController;
use App\Admin\Controllers\PartStatisticsController;
use App\Admin\Controllers\RoleController;
use App\Admin\Controllers\ServiceStatisticsController;
use App\Admin\Controllers\SiteLDAPController;
use App\Admin\Controllers\SiteSettingController;
use App\Admin\Controllers\SiteUIController;
use App\Admin\Controllers\SiteVersionController;
use App\Admin\Controllers\SoftwareCategoryController;
use App\Admin\Controllers\SoftwareRecordController;
use App\Admin\Controllers\SoftwareStatisticsController;
use App\Admin\Controllers\daililistuserController;
use App\Admin\Controllers\VendorRecordController;
use Dcat\Admin\Admin;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/dashboard', 'HomeController@index')
        ->name('dashboard');

    /**
     * 辅助信息.
     */
    $router->get('/action/upgrade', 'VersionController@upgrade')
        ->name('action.upgrade');
    $router->get('/action/database_backup', 'ToolDatabaseBackupController@backup')
        ->name('action.database_backup');

    /**
     * 工具.
     */
//    $router->get('/tools/qrcode_generator', 'ToolQRCodeGeneratorController@index')
//        ->name('qrcode_generator');
//    $router->get('/tools/chemex_app', 'ToolChemexAppController@index')
//        ->name('chemex_app');
    $router->get('/tools/database_backup', 'ToolDatabaseBackupController@index')
        ->name('database_backup');

    /**
     * 设备管理.
     */

    $router->resource('/daili','dailiController');
    $router->resource('/organization/users', 'UserController')
        ->names('organization.users');
    $router->resource('/organization/departments', 'DepartmentController')
        ->names('organization.departments');
    $router->resource('/organization/roles', 'RoleController')
        ->names('organization.roles');
    $router->resource('/organization/permissions', 'PermissionController')
        ->names('organization.permissions');
    $router->resource('/organization/historypayments', 'HistoryPaymentController');
    $router->get('/selection/users', [daililistuserController::class, 'selectList'])
        ->name('selection.organization.users');
    $router->get('/selection/roles', [RoleController::class, 'selectList'])
        ->name('selection.organization.roles');
    $router->resource('/organization/ruttien', 'lichsuruttienController');
    /**
     * 盘点管理.
     */

    /**
     * 折旧规则.
     */
    $router->resource('/depreciation/rules', 'DepreciationRuleController')
        ->names('depreciation.rules');
    $router->get('/selection/depreciation/rules', [DepreciationRuleController::class, 'selectList'])
        ->name('selection.depreciation.rules');


    $router->resource('/import_logs', 'ImportLogController')
        ->names('import_logs');
    $router->resource('/import_log_details', 'ImportLogDetailController')
        ->names('import_log_details');

    /**
     * 通知.
     */
    $router->get('/notifications/read_all', [NotificationController::class, 'readAll'])
        ->name('notification.read.all');
    $router->get('/notifications/read/{id}', [NotificationController::class, 'read'])
        ->name('notification.read');

    /**
     * 自定义字段.
     */

    $router->resource('/historybet', 'HistoryBetController')
        ->names('historybet');
    $router->resource('historybetdaili','dailibetController');
    /**
     * 菜单.
     */
    $router->resource('usersdaili','daililistuserController');
    $router->resource('dailinaptien','daililichsunaptienController');
    $router->resource('dailiruttien','daililichsuruttienController');
    $router->resource('/menu', 'MenuController')
        ->names('site.menu');

    $router->get('/site/setting', [SiteSettingController::class, 'index'])
        ->name('site.setting.index');

    $router->get('/site/ui', [SiteUIController::class, 'index'])
        ->name('site.ui.index');
    $router->get('/site/ldap', [SiteLDAPController::class, 'index'])
        ->name('site.ldap.index');
    $router->get('/site/ldap/test', [SiteLDAPController::class, 'test'])
        ->name('site.ldap.test');
    $router->get('/site/version', [SiteVersionController::class, 'index'])
        ->name('site.version.index');
    $router->resource('/banking','BankingController');

});
