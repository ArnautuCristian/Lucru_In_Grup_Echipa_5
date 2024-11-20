<?php
    use App\Controllers\UserController;

    $app->redirect('/', '/users');
    $app->get('/users', [UserController::class, 'users']);