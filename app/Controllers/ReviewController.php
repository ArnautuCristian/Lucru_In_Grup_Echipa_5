<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Review;
use App\Models\Product;


class ReviewController
{
    public function store(Request $request, Response $response, $args)
    {
        $data = $request->getParsedBody();
        // Validează datele primite
        $validatedData = [
            'product_id' => filter_var($data['product_id'], FILTER_VALIDATE_INT),
            'user_id' => filter_var($data['user_id'], FILTER_VALIDATE_INT),
            'rating' => filter_var($data['rating'], FILTER_VALIDATE_INT),
            'comentariu' => trim($data['comentariu']),
            'data' => date('Y-m-d H:i:s')
        ];

        // Verifică dacă datele sunt valide
        if (!$validatedData['product_id'] || !$validatedData['user_id'] || !$validatedData['rating'] || !$validatedData['comentariu']) {
            return $response->withStatus(400)->getBody()->write('Invalid input data');
        }

        // Verifică dacă produsul există
        $product = Product::find($validatedData['product_id']);
        if (!$product) {
            return $response->withStatus(404)->getBody()->write('Product not found');
        }

        // Creează recenzia
        Review::create($validatedData);

        // Redirecționează utilizatorul la produsul pentru care a lăsat recenzia
        return $response
            ->withHeader('Location', '/products/' . $validatedData['product_id'])
            ->withStatus(302);
    }

    // Obține recenziile unui utilizator
    public function getUserReviews(Request $request, Response $response, $args)
    {
        $userId = $args['user_id']; // ID-ul utilizatorului

        // Obține recenziile utilizatorului și încarcă informațiile produsului asociat
        $reviews = Review::where('user_id', $userId)
            ->with('product')  // Încarcă produsul asociat pentru fiecare recenzie
            ->get();

        // Verifică dacă utilizatorul are recenzii
        if ($reviews->isEmpty()) {
            return $response->withStatus(404)->getBody()->write('No reviews found for this user');
        }

        // Transmite recenziile către vizualizare
        ob_start();
        require '../views/users/user_reviews.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

}
