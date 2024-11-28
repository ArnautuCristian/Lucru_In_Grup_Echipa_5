<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\User;

class UserController
{
    public function index(Request $request, Response $response, $args)
    {
        $users = User::all();  // Obține toți utilizatorii
        ob_start();
        require '../views/users/index.php';  // Vei încărca pagina HTML care va afișa utilizatorii
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function login(Request $request, Response $response, $args)
    {
        session_start();
        // Verificăm dacă utilizatorul este deja autentificat
        if (isset($_SESSION['user_id'])) {
            return $response->withHeader('Location', '/users/profile/' . $_SESSION['user_id'])->withStatus(302);
        }

        if ($request->getMethod() == 'POST') {
            $data = $request->getParsedBody();
            $user = User::where('email', $data['email'])->first();

            if ($user && password_verify($data['parola'], $user->parola)) {
                $_SESSION['user_id'] = $user->id;
                return $response->withHeader('Location', '/users/profile/' . $user->id)->withStatus(302);
            } else {
                return $response->withRedirect('/login?error=invalid_credentials');
            }
        }

        ob_start();
        require '../views/users/login.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function register(Request $request, Response $response, $args)
    {
        ob_start();
        require '../views/users/register.php';
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
            ->withHeader('Location', '/users/login')
            ->withStatus(302);
    }

    public function profile(Request $request, Response $response, $args)
    {
        session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != $args['id']) {
            return $response->withHeader('Location', '/users/login')->withStatus(302);
        }
        $user = User::find($args['id']);
        ob_start();
        require '../views/users/profile.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }


    public function logout(Request $request, Response $response, $args)
    {
        session_start();
        session_destroy();
        error_log("Sesiunea a fost distrusă. User ID: " . ($_SESSION['user_id'] ?? 'None'));
        $_SESSION = [];
        return $response->withHeader('Location', '/')->withStatus(302);
    }


}
