<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\EmployeeController;

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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });
    Route::post('/employee/add', [EmployeeController::class, 'store'])->name('addEmployee');
    Route::get('/employee/all/{id}', [EmployeeController::class, 'index']);
});

Route::get('/index', function () {
    return view('member.index');
});
Route::get('/checkin', function () {
    return view('member.checkin');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $employee = DB::table('employees')->get();
        return view('dashboard', compact('employee'));
    })->name('dashboard');
});
