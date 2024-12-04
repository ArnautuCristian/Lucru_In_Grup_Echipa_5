<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
class OrderItemController
{
    public function add(Request $request, Response $response, $args)
    {
        // Preia datele din cerere (ID-ul produsului și cantitatea dorită)
        $data = $request->getParsedBody();
        $productId = $data['product_id'];
        $cantitate = $data['cantitate'];

        // Găsește produsul
        $product = Product::find($productId);

        if (!$product) {
            return $response->withStatus(404)->write('Product not found');
        }

        // Căutăm comanda activă a utilizatorului (presupunând că există un ID de utilizator în sesiune)
        $order = Order::where('user_id', $_SESSION['user_id'])
            ->where('status', 'pending')
            ->first();

        // Dacă nu există o comandă activă, creează una nouă
        if (!$order) {
            $order = Order::create([
                'user_id' => $_SESSION['user_id'],
                'status' => 'pending',
                'data_comenzii' => date('Y-m-d H:i:s')
            ]);
        }

        // Adaugă produsul în comandă
        $orderItem = OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'cantitate' => $cantitate
        ]);

        // Redirecționează sau returnează un răspuns de succes
        return $response->withHeader('Location', '/orders/show/' . $order->id)->withStatus(302);
    }

    public function remove(Request $request, Response $response, $args)
    {
        // Preia ID-ul articolului de comandă
        $orderItemId = $args['id'];

        // Căutăm articolul de comandă
        $orderItem = OrderItem::find($orderItemId);

        if (!$orderItem) {
            return $response->withStatus(404)->write('Order item not found');
        }

        // Șterge articolul din comandă
        $orderItem->delete();

        // Redirecționează utilizatorul la pagina comenzii
        return $response->withHeader('Location', '/orders/show/' . $orderItem->order_id)->withStatus(302);
    }

    // În controllerul tău
    public function showOrderItems(Request $request, Response $response, $args)
{
    // Preia ID-ul comenzii
    $orderId = $args['id'];

    // Verifică dacă există articole în comandă
    $orderItems = OrderItem::where('order_id', $orderId)->get();

    // Verifică ce date sunt obținute
    if ($orderItems->isEmpty()) {
        echo "Nu există produse în comandă.";
    } else {
        print_r($orderItems->toArray()); // Vezi structura articolelor
    }

    // Transmite datele către view
    return $this->view->render($response, 'orders/order_items_show.php', [
        'orderItems' => $orderItems
    ]);
}



}