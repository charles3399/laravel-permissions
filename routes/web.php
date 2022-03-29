<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersRolesController;
use App\Http\Controllers\RoleController;

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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Route::get('usersroles/index', [UsersRolesController::class, 'index'])->name('usersroles.index');
// Route::get('usersroles/create', [UsersRolesController::class, 'create'])->name('usersroles.create');
// Route::get('usersroles/{usersrole}', [UsersRolesController::class, 'show'])->name('usersroles.show');
// Route::patch('usersroles/{usersrole}', [UsersRolesController::class, 'update'])->name('usersroles.update');
// Route::delete('usersroles/{usersrole}', [UsersRolesController::class, 'destroy'])->name('usersroles.destroy');
// Route::get('usersroles/{usersrole}/edit', [UsersRolesController::class, 'edit'])->name('usersroles.edit');
Route::resource('usersroles', UsersRolesController::class);
Route::resource('roles', RoleController::class);
