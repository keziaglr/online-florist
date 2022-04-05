<?php
namespace App\Http\Controllers;
use App\Transaction;
use Illuminate\Support\Facades\Route;

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

//User section

Route::get('/', [UserController::class, 'showLoginForm']);
Route::get('user/login', [UserController::class, 'showLoginForm']);
Route::post('user/login', [UserController::class, 'login']);
Route::get('user/register', [UserController::class, 'showRegisterForm']);
Route::post('user/register', [UserController::class, 'register']);
Route::group(['middleware'=>['login']], function() {

    Route::get('user/profile', [UserController::class, 'showProfileForm']);
    Route::post('user/profile', [UserController::class, 'profile']);

    Route::get('user/update/{id}', [UserController::class, 'showUpdateForm']);
    Route::post('user/update/{id}', [UserController::class, 'update']);

    Route::get('user', [UserController::class, 'index']);

    Route::get('logout', [UserController::class, 'logout']);

    //Flower Type section
    Route::get('flower/type', [FlowertypeController::class, 'index']);

    Route::get('flower/type/insert', [FlowertypeController::class, 'showInsertForm']);
    Route::post('flower/type/insert', [FlowertypeController::class, 'insert']);

    Route::get('flower/type/update/{id}', [FlowertypeController::class, 'showUpdateForm']);
    Route::post('flower/type/update/{id}', [FlowertypeController::class, 'update']);

    Route::get('flower/type/delete/{id}', [FlowertypeController::class, 'delete']);

    //Flower section
    Route::get('home', [FlowerController::class, 'index']);
    Route::get('flower', [FlowerController::class, 'showManageFlower']);
    Route::get('flower/detail/{id}', [FlowerController::class, 'showDetail']);

    Route::get('flower/insert', [FlowerController::class, 'showInsertForm']);
    Route::post('flower/insert', [FlowerController::class, 'insert']);

    Route::get('flower/update/{id}', [FlowerController::class, 'showUpdateForm']);
    Route::post('flower/update/{id}', [FlowerController::class, 'update']);

    Route::get('flower/delete/{id}', [FlowerController::class, 'delete']);

    //Courier section
    Route::get('courier', [CourierController::class, 'index']);

    Route::get('courier/insert', [CourierController::class, 'showInsertForm']);
    Route::post('courier/insert', [CourierController::class, 'insert']);

    Route::get('courier/update/{id}', [CourierController::class, 'showUpdateForm']);
    Route::post('courier/update/{id}', [CourierController::class, 'update']);

    Route::get('courier/delete/{id}', [CourierController::class, 'delete']);

    //Cart section
    Route::get('cart/add/{id}', [CartController::class, 'addToCart']);
    Route::get('cart/order/{id}', [CartController::class, 'order']);
    Route::get('cart', [CartController::class, 'index']);
    Route::get('cart/delete/{id}', [CartController::class, 'delete']);

    //Transaction section
    Route::get('checkout', [TransactionController::class, 'checkout']);
    Route::get('transaction', [TransactionController::class, 'index']);
});
