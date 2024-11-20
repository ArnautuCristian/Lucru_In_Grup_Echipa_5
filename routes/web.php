<?php
use App\Controllers\UserController;
use App\Controllers\ProductController;
use App\Controllers\CategoryController;
use App\Controllers\OrderController;
use App\Controllers\ReviewController;
use App\Controllers\WishlistController;

$app->redirect('/', '/products');
$app->get('/products', [ProductController::class, 'index']);
$app->get('/products/{id}', [ProductController::class, 'show']);

$app->get('/login', [UserController::class, 'login']);
$app->get('/register', [UserController::class, 'register']);
$app->post('/register', [UserController::class, 'store']);
$app->get('/profile/{id}', [UserController::class, 'profile']);

$app->get('/categories', [CategoryController::class, 'index']);
$app->get('/categories/{id}', [CategoryController::class, 'show']);

$app->get('/orders', [OrderController::class, 'index']);
$app->get('/orders/{id}', [OrderController::class, 'show']);
$app->post('/orders', [OrderController::class, 'store']);

$app->get('/reviews', [ReviewController::class, 'index']);
$app->post('/reviews', [ReviewController::class, 'store']);

$app->get('/wishlists', [WishlistController::class, 'index']);
$app->post('/wishlists', [WishlistController::class, 'store']);



