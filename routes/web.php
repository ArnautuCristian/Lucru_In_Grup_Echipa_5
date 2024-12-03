<?php
use App\Controllers\UserController;
use App\Controllers\ProductController;
use App\Controllers\CategoryController;
use App\Controllers\OrderController;
use App\Controllers\ReviewController;
use App\Controllers\WishlistController;
// Rutele pentru ProductController
$app->redirect('/', '/products');
$app->get('/products', [ProductController::class, 'index']);
$app->get('/products/create', [ProductController::class, 'create']);
$app->post('/products/store', [ProductController::class, 'store']);
$app->get('/products/edit/{id}', [ProductController::class, 'edit']);
$app->put('/products/update/{id}', [ProductController::class, 'update']);
$app->delete('/products/delete/{id}', [ProductController::class, 'delete']);
$app->get('/products/show/{id}', [ProductController::class, 'show']);
// Rutele pentru CategoryController
$app->get('/categories', [CategoryController::class, 'index']);
$app->get('/categories/create', [CategoryController::class, 'create']);
$app->post('/categories/store', [CategoryController::class, 'store']);
$app->get('/categories/edit/{id}', [CategoryController::class, 'edit']);
$app->put('/categories/update/{id}', [CategoryController::class, 'update']);
$app->delete('/categories/delete/{id}', [CategoryController::class, 'delete']);

// Rutele pentru UserController
$app->get('/users', [UserController::class, 'index']);
$app->get('/users/login', [UserController::class, 'login']);
$app->post('/users/login', [UserController::class, 'login']);
$app->get('/users/register', [UserController::class, 'register']);
$app->post('/users/register', [UserController::class, 'store']);
$app->get('/users/profile/{id}', [UserController::class, 'profile']);
$app->get('/users/logout', [UserController::class, 'logout']);
$app->get('/users/change-password', [UserController::class, 'changePassword']);
$app->post('/users/change-password', [UserController::class, 'changePassword']);


// Rutele pentru ReviewController
$app->post('/reviews/store', [ReviewController::class, 'store']);
$app->get('/reviews/{user_id}', [ReviewController::class, 'getUserReviews']);
$app->delete('/reviews/delete/{id}', [ReviewController::class, 'destroy']);



// Rutele pentru WishlistController
$app->get('/wishlist', [WishlistController::class, 'index']); // Vizualizează wishlist-ul utilizatorului
$app->post('/wishlist/store', [WishlistController::class, 'store']); // Adaugă un produs în wishlist
$app->delete('/wishlist/remove/{id}', [WishlistController::class, 'remove']); // Șterge un produs din wishlist

