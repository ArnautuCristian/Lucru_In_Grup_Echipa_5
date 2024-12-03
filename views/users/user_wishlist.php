<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Wishlist</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include '../views/navbar.php'; ?>

    <div class="container mt-5">
        <h3>Your Wishlist</h3>
        <?php if (count($wishlists) > 0): ?>
            <div class="row">
                <?php foreach ($wishlists as $wishlist): ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="<?= htmlspecialchars($wishlist->product->image_url) ?>" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($wishlist->product->name) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($wishlist->product->description) ?></p>
                                <a href="/products/show/<?= $wishlist->product->id ?>" class="btn btn-primary">View Product</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>You have no items in your wishlist.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
