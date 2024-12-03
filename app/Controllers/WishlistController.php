<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Wishlist;

class WishlistController
{
    public function index(Request $request, Response $response, $args)
    {
        // Obține wishlist-ul utilizatorului pe baza user_id
        $userId = $args['id']; // Obține id-ul utilizatorului din URL
        $wishlists = Wishlist::where('user_id', $userId)->get(); // Filtrează wishlist-ul în funcție de user_id

        ob_start();
        require '../views/wishlists/index.view.php'; // Arată wishlist-ul
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function store(Request $request, Response $response, $args)
    {
        // Obține datele din formular
        $data = $request->getParsedBody(); // Folosește getParsedBody() pentru a obține datele POST

        $userId = $data['user_id'];
        $productId = $data['product_id'];

        // Verifică dacă produsul este deja în wishlist
        $existingWishlistItem = Wishlist::where('user_id', $userId)
                                        ->where('product_id', $productId)
                                        ->first();

        if (!$existingWishlistItem) {
            // Dacă nu există, adaugă produsul în wishlist
            $wishlistItem = new Wishlist();
            $wishlistItem->user_id = $userId;
            $wishlistItem->product_id = $productId;
            $wishlistItem->save();
        }

        // Redirecționează sau returnează un răspuns
        return $response
            ->withHeader('Location', '/products/show/' . $productId)
            ->withStatus(302);
    }

    public function remove(Request $request, Response $response, $args)
    {
        $productId = $args['id'];
        $userId = $_SESSION['user_id']; // Presupunem că este deja setat

        // Găsește produsul în wishlist
        $wishlistItem = Wishlist::where('user_id', $userId)
                                ->where('product_id', $productId)
                                ->first();

        if ($wishlistItem) {
            // Dacă există, elimină-l
            $wishlistItem->delete();
        }

        // Redirecționează înapoi la pagina produsului
        return $response
            ->withHeader('Location', '/products/show/' . $productId)
            ->withStatus(302);
    }

}
