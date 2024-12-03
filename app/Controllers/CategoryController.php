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

    public function create(Request $request, Response $response, $args)
    {
        // Obține toate categoriile din baza de date
        $categories = Category::all();
        // Trimite categoriile către vizualizare
        ob_start();
        require '../views/categories/create.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function store(Request $request, Response $response, $args)
    {
        $categoryData = $request->getParsedBody();
        Category::create($categoryData);
        return $response
            ->withHeader('Location', '/categories')
            ->withStatus(302);
    }

    public function edit(Request $request, Response $response, $args)
    {
        $category = Category::find($args['id']);
        ob_start();
        require '../views/categories/edit.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function update(Request $request, Response $response, $args)
    {
        $data = $request->getParsedBody();
        $category = Category::find($args['id']);
        $category->fill($data);
        $category->save();
        return $response
            ->withHeader('Location', '/categories')
            ->withStatus(302);
    }

    public function delete(Request $request, Response $response, $args)
    {
        $category = Category::find($args['id']);
        $category->delete();
        return $response
            ->withHeader('Location', '/categories')
            ->withStatus(302);
    }
}
