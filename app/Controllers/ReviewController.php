<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Review;

class ReviewController
{
    public function store(Request $request, Response $response, $args)
    {
        $data = $request->getParsedBody();
        Review::create($data);
        return $response
            ->withHeader('Location', '/products/' . $data['product_id'])
            ->withStatus(302);
    }
}
