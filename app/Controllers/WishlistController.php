<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Wishlist;

class WishlistController
{
    public function index(Request $request, Response $response, $args)
    {
        $wishlists = Wishlist::all();
        ob_start();
        require '../views/wishlists/index.view.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function store(Request $request, Response $response, $args)
    {
        $data = $request->getParsedBody();
        Wishlist::create($data);
        return $response
            ->withHeader('Location', '/wishlist')
            ->withStatus(302);
    }

    public function delete(Request $request, Response $response, $args)
    {
        $wishlist = Wishlist::find($args['id']);
        $wishlist->delete();
        return $response
            ->withHeader('Location', '/wishlist')
            ->withStatus(302);
    }
}
