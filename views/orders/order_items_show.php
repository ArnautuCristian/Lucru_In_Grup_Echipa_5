<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articole Comandă</title>
</head>

<body>
    <h3>Produse din comandă</h3>
    <?php if (!empty($orderItems)): ?>
        <table>
            <tr>
                <th>Produs</th>
                <th>Cantitate</th>
                <th>Preț</th>
                <th>Total</th>
            </tr>
            <?php foreach ($orderItems as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item->product->name) ?></td>
                    <td><?= $item->cantitate ?></td>
                    <td><?= number_format($item->product->pret, 2) ?> Lei</td>
                    <td><?= number_format($item->totalPrice(), 2) ?> Lei</td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Nu există produse în comandă.</p>
    <?php endif; ?>

</body>

</html>