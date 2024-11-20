<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\User;

class UserController
{
    public function login(Request $request, Response $response, $args)
    {
        ob_start();
        require '../views/login.view.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function register(Request $request, Response $response, $args)
    {
        ob_start();
        require '../views/register.view.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function store(Request $request, Response $response, $args)
    {
        $data = $request->getParsedBody();
        $data['parola'] = password_hash($data['parola'], PASSWORD_BCRYPT);
        User::create($data);
        return $response
            ->withHeader('Location', '/login')
            ->withStatus(302);
    }

    public function profile(Request $request, Response $response, $args)
    {
        $user = User::find($args['id']);
        ob_start();
        require '../views/profile.view.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }
}
