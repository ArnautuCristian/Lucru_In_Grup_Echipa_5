<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Product;

class ProductController
{
    public function index(Request $request, Response $response, $args)
    {
        $products = Product::all();
        ob_start();
        require '../views/products/index.view.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function create(Request $request, Response $response, $args)
    {
        ob_start();
        require '../views/products/create.view.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function store(Request $request, Response $response, $args)
    {
        $productData = $request->getParsedBody();
        Product::create($productData);
        return $response
            ->withHeader('Location', '/products')
            ->withStatus(302);
    }

    public function edit(Request $request, Response $response, $args)
    {
        $product = Product::find($args['id']);
        ob_start();
        require '../views/products/edit.view.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function update(Request $request, Response $response, $args)
    {
        $data = $request->getParsedBody();
        $product = Product::find($args['id']);
        $product->fill($data);
        $product->save();
        return $response
            ->withHeader('Location', '/products')
            ->withStatus(302);
    }

    public function delete(Request $request, Response $response, $args)
    {
        $product = Product::find($args['id']);
        $product->delete();
        return $response
            ->withHeader('Location', '/products')
            ->withStatus(302);
    }

    public function show(Request $request, Response $response, $args)
    {
        $product = Product::find($args['id']);
        ob_start();
        require '../views/products/show.view.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }
}
