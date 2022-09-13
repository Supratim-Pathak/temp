<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Permission\PermissionController;
use App\Http\Controllers\Users\Forms\RfqFormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('appPages/dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// USER BASED PERMISSION RELATED ROUTES

Route::group(['middleware' => ['permission:asign userBasedPermission']], function () {

    Route::get('/user-permissionAsign-list',[PermissionController::class, 'userPermissionAsignList',])->middleware(['auth'])->name('userPermissionAsignList');
    Route::get('/permission-asign-to-user/{role}',[PermissionController::class, 'PermissionAsignToUser'])->name('PermissionAsignToUser');
    Route::post('/asign-permission-to-user',[PermissionController::class, 'PermissionAsignToUserAction'])->name('PermissionAsignToUserAction');

});


// ROLE BASED PERMISSION RELATED ROUTES
Route::group(['middleware' => ['permission:asign roleBasedPermission']], function () {

    Route::get('/permission-asign/{role}',[PermissionController::class, 'PermissionAsign'])->name('PermissionAsign');
    Route::post('/asign-permission',[PermissionController::class, 'asignPermission'])->name('asignPermission');

});

// CRUD OPERATION OF ROLE RELATED ROUTE

    // VIEW ROLE
Route::group(['middleware' => ['permission:view role']], function () {

    Route::get('/role-list',[RoleController::class, 'index'])->name('roleList');

});

    // ADD ROLE
Route::group(['middleware' => ['permission:add role']], function () {

    Route::post('/add-role',[RoleController::class, 'addRole'])->name('addRole');

});
    // DELETE ROLE
Route::group(['middleware' => ['permission:delete role']], function () {

    Route::post('/delete-role',[RoleController::class, 'deleteRole'])->name('deleteRole');

});
    // EDIT ROLE
Route::group(['middleware' => ['permission:edit role']], function () {

    Route::get('/edit-role/{id}',[RoleController::class, 'editRole'])->name('editRole');
    Route::post('/edit-role-action',[RoleController::class, 'editRoleAction'])->name('editRoleAction');

});
    
// ROLE ASIGNMENT TO USER RELATED ROUTES

Route::group(['middleware' => ['permission:asign roleToUser|revoke roleToUser']], function () {

    Route::get('/asign-role',[RoleController::class, 'asignRole'])->name('asignRole');

});

Route::group(['middleware' => ['permission:asign roleToUser']], function () {

    Route::post('/asign-role-action',[RoleController::class, 'asignRoleAction'])->name('asignRoleAction');

});

// ROLE REVOKE TO USER RELATED ROUTES
Route::group(['middleware' => ['permission:revoke roleToUser']], function () {
    
    Route::post('/revoke-role-action',[RoleController::class, 'revokeRoleAction'])->name('revokeRoleAction');
    Route::post('/usr-role-check',[RoleController::class, 'getRole'])->name('getRole');

});

// CRUD OPERATION OF PRTMISSION RELATED ROUTE
    // VIEW PERMISSION
Route::group(['middleware' => ['permission:view permission']], function () {

    Route::get('/permission-list',[PermissionController::class, 'index'])->name('PermissionList');

});
    // DELETE PERMISSION
Route::group(['middleware' => ['permission:delete permission']], function () {

    Route::post('/delete-permission',[PermissionController::class, 'deletePermission'])->name('deletePermission');
    
});
    // ADD PERMISSION
Route::group(['middleware' => ['permission:add permission']], function () {

    Route::post('/add-permission',[PermissionController::class, 'addPermission'])->name('addPermission');

});
    // EDIT PERMISSION
Route::group(['middleware' => ['permission:edit permission']], function () {

    Route::get('/permission-edit/{id}',[PermissionController::class, 'editPermission'])->name('permissionEdit');
    Route::post('/permission-edit-action',[PermissionController::class, 'editPermissionAction'])->name('permissionEditAction');

});

//RFQ FORM RELATED ROUTES
Route::get('/RfqForm',[RfqFormController::class, 'RfqForm'])->name('RfqForm');
Route::post('/RfqFormAction',[RfqFormController::class, 'RfqFormAction'])->name('RfqFormAction');