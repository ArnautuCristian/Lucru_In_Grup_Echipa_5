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

        // Redirecționează utilizatorul sau trimite un mesaj de succes
        return $response
            ->withHeader('Location', '/products/show/' . $validatedData['product_id'])
            ->withStatus(302);
    }

    public function getUserReviews(Request $request, Response $response, $args)
    {
        $userId = $args['user_id']; // ID-ul utilizatorului

        // Obține recenziile utilizatorului și încarcă informațiile produsului asociat
        $reviews = Review::where('user_id', $userId)
            ->with('product')  // Încarcă produsul asociat pentru fiecare recenzie
            ->get();

        // Verifică dacă utilizatorul are recenzii
        if ($reviews->isEmpty()) {
            // În loc de eroare 404, afișează un mesaj personalizat
            $response->getBody()->write(
'<div class="container mt-5" style="max-width: 800px; margin: 0 auto;">
            <div class="alert alert-info text-center" role="alert" style="background-color: #f74856; color: #0c5460; border-color: #bee5eb; padding: 30px; border-radius: 10px;">
                <h4 class="alert-heading" style="font-size: 1.5rem; font-weight: bold;">No Reviews Yet!</h4>
                <p style="font-size: 1rem;">You havent added any reviews yet. Visit a product page and share your thoughts with others.</p>
                <hr style="border-color: #bee5eb;">
                <p class="mb-0" style="font-size: 1rem; color: #5a6268;">We would love to hear your feedback!</p>
            </div>
        </div>'
            );
            return $response;
        }

        // Transmite recenziile către vizualizare
        ob_start();
        require '../views/users/user_reviews.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }


    public function destroy(Request $request, Response $response, $args)
    {
        // Verifică dacă există 'id' în argumentele rutei
        if (!isset($args['id'])) {
            return $response->withStatus(400)->getBody()->write('ID parameter missing');
        }

        $reviewId = $args['id'];

        // Găsește recenzia după ID
        $review = Review::find($reviewId);

        if (!$review) {
            return $response->withStatus(404)->getBody()->write('Review not found');
        }

        // Verifică dacă utilizatorul curent este proprietarul recenziei
        session_start();
        if ($_SESSION['user_id'] != $review->user_id) {
            return $response->withStatus(403)->getBody()->write('You are not authorized to delete this review');
        }

        // Șterge recenzia
        $review->delete();

        // Redirecționează utilizatorul la produsul asociat
        return $response
            ->withHeader('Location', '/products/show/' . $review->product_id)
            ->withStatus(302);
    }

}

