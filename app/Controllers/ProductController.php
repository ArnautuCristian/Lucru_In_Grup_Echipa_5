<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Product;
use App\Models\Category;

class ProductController
{
    public function index(Request $request, Response $response, $args)
    {

        $products = Product::all();
        ob_start();
        require '../views/products/index.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function create(Request $request, Response $response, $args)
    {
        $categories = Category::all();
        ob_start();
        require '../views/products/create.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function store(Request $request, Response $response, $args)
    {
        // Preia datele din formular
        $productData = $request->getParsedBody();

        // Verifică dacă fișierul imagine a fost încărcat
        $uploadedFiles = $request->getUploadedFiles();
        $image = $uploadedFiles['imagine'];

        if ($image->getError() === UPLOAD_ERR_OK) {
            // Nume unic pentru imagine
            $filename = uniqid() . '_' . $image->getClientFilename();
            $targetPath = '../public/uploads/' . $filename;

            // Mută fișierul în directorul de destinație
            $image->moveTo($targetPath);

            // Adaugă calea imaginii în datele produsului
            $productData['imagine'] = $filename;
        } else {
            // Gestionarea erorilor (opțional)
            $productData['imagine'] = 'default.png';  // Imagine implicită
        }

        // Creează produsul
        Product::create($productData);

        // Redirecționează utilizatorul
        return $response
            ->withHeader('Location', '/products')
            ->withStatus(302);
    }

    public function edit(Request $request, Response $response, $args)
    {
        $categories = Category::all();
        $product = Product::find($args['id']);
        ob_start();
        require '../views/products/edit.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function update(Request $request, Response $response, $args)
    {
        $data = $request->getParsedBody();
        $product = Product::find($args['id']);

        // Verifică dacă a fost încărcată o nouă imagine
        $uploadedFiles = $request->getUploadedFiles();
        if (isset($uploadedFiles['imagine']) && $uploadedFiles['imagine']->getError() === UPLOAD_ERR_OK) {
            $image = $uploadedFiles['imagine'];

            // Nume unic pentru noua imagine
            $filename = uniqid() . '_' . $image->getClientFilename();
            $targetPath = '../public/uploads/' . $filename;
            $image->moveTo($targetPath);

            // Șterge imaginea veche dacă există și nu este imaginea implicită
            if ($product->imagine && $product->imagine !== 'default.png') {
                unlink('../public/uploads/' . $product->imagine);
            }

            // Actualizează calea imaginii în datele produsului
            $data['imagine'] = $filename;
        }

        // Actualizează produsul cu noile date
        $product->fill($data);
        $product->save();

        // Redirecționează utilizatorul
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
        require '../views/products/product_details.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }
}
