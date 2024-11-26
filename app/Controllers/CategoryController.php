<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Category;

class CategoryController
{
    public function index(Request $request, Response $response, $args)
    {
        $categories = Category::all();
        ob_start();
        require '../views/categories/index.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function show(Request $request, Response $response, $args)
    {
        $category = Category::find($args['id']);
        $products = $category->products;
        ob_start();
        require '../views/categories/show.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }
}
