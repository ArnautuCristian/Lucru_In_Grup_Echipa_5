
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Wishlist</h1>
    <?php foreach ($wishlists as $wishlist): ?>
        <div>
            <h2><?= htmlspecialchars($wishlist->product->nume) ?></h2>
            <a href="/products/<?= $wishlist->product->id ?>">Vezi detalii</a>
        </div>
    <?php endforeach; ?>

</body>

</html>