<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Главная страница

Route::get('/', function () {
    return view('home');
});

// Админ-панель

Route::get('/admin', function () {
    return view('admin');
});

Route::post('/admin', [AdminController::class, 'login']); // Вход в админ-панель

Route::post('/category', [CategoryController::class, 'store']); // Создать категорию
Route::post('/category/{categoryId}', [CategoryController::class, 'destroy']); // Удалить категорию

// Корзина

Route::get('/cart', function () {
    return view('cart');
});

// Каталог

Route::get('/catalog', function () {
    return view('catalog');
});

// Авторизация

Route::get('/login', function () {
    return view('login');
});

// Заказы

Route::get('/order', function () {
    return view('order');
});

// Продукт

Route::get('/product', function () {
    return view('product');
});

// Регистрация

Route::get('/register', function () {
    return view('register');
});

// Где нас найти

Route::get('/where-are', function () {
    return view('where-are');
});





