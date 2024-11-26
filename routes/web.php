<?php
use App\Controllers\UserController;
use App\Controllers\ProductController;
use App\Controllers\CategoryController;
use App\Controllers\OrderController;
use App\Controllers\ReviewController;
use App\Controllers\WishlistController;

$app->redirect('/', '/products');
$app->get('/products', [ProductController::class, 'index']);
$app->get('/products/create', [ProductController::class, 'create']);
$app->post('/products/store', [ProductController::class, 'store']);
$app->get('/products/edit/{id}', [ProductController::class, 'edit']);
$app->put('/products/update/{id}', [ProductController::class, 'update']);
$app->delete('/products/delete/{id}', [ProductController::class, 'delete']);
$app->get('/products/show/{id}', [ProductController::class, 'show']);



