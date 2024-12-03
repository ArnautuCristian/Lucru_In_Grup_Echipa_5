<?php
session_start();
use App\Models\Wishlist;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
            font-family: 'Arial', sans-serif;
        }

        .product-details {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .product-details h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
        }

        .product-details img {
            width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .product-info {
            margin-top: 20px;
            font-size: 1.1rem;
        }

        .product-info p {
            line-height: 1.8;
        }

        .product-actions {
            margin-top: 30px;
        }

        .btn {
            font-size: 1.1rem;
            padding: 10px 20px;
            border-radius: 8px;
            text-transform: uppercase;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .col-md-6,
        .col-md-12 {
            padding: 0;
        }

        .image-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .product-info strong {
            color: #007bff;
        }

        .wishlist-star {
            cursor: pointer;
            font-size: 2rem;
        }

        .wishlist-star.active {
            color: gold;
        }
    </style>
</head>

<body>

    <?php include '../views/navbar.php'; ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="product-details">
                    <h1><?= $product->nume ?></h1>

                    <div class="row">
                        <!-- Product Image -->
                        <div class="col-md-6">
                            <div class="image-container">
                                <img src="/uploads/<?= htmlspecialchars($product->imagine) ?>" alt="Product Image"
                                    class="img-fluid">
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="col-md-6">
                            <div class="product-info">
                                <p><strong>Description:</strong> <?= $product->descriere ?></p>
                                <p><strong>Price:</strong> <?= $product->pret ?> Lei</p>
                                <p><strong>Stock:</strong> <?= $product->stoc ?> units</p>
                                <p><strong>Category:</strong> <?= $product->categorie->nume ?></p>
                                <p><strong>Color:</strong> <?= $product->culoare ?></p>
                                <p><strong>Size:</strong> <?= $product->marime ?></p>
                                <p><strong>Collection:</strong> <?= $product->colectie ?></p>
                            </div>

                            <!-- Wishlist Star -->
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <?php
                                // Verifică dacă produsul este deja în wishlist-ul utilizatorului
                                $wishlistItem = Wishlist::where('user_id', $_SESSION['user_id'])
                                    ->where('product_id', $product->id)
                                    ->first();
                                $starClass = $wishlistItem ? 'active' : '';
                                ?>
                                <form action="/wishlist/store" method="POST" class="d-inline" id="wishlist-form">
                                    <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
                                    <input type="hidden" name="product_id" value="<?= $product->id ?>">
                                    <input type="hidden" name="_method" value="POST">
                                    <button type="submit" class="wishlist-star <?= $starClass ?>">
                                        <i class="fas fa-star"></i>
                                    </button>
                                </form>
                            <?php else: ?>
                                <p>Please <a href="/users/login">log in</a> to add products to your wishlist.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($_SESSION['user_id'])): ?> <!-- Verifică dacă utilizatorul este logat -->

        <div class="container mt-4">
            <h3>Lasa o recenzie</h3>
            <form action="/reviews/store" method="POST">
                <input type="hidden" name="product_id" value="<?= $product->id ?>">
                <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">

                <div class="mb-3">
                    <label for="rating" class="form-label">Rating (1-5):</label>
                    <select class="form-select" name="rating" required>
                        <option value="" selected disabled>Select a rating</option>
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="comentariu" class="form-label">Comentariu:</label>
                    <textarea class="form-control" name="comentariu" rows="5" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit Review</button>
            </form>
        </div>
    <?php else: ?>
        <p class="text-center mt-4">Va rog <a href="/users/login">logativa</a> pentru a lasa o recenzie.</p>
    <?php endif; ?>
    <div class="container mt-5">
        <h3>Reviews</h3>
        <?php if ($product->reviews->count() > 0): ?>
            <?php foreach ($product->reviews as $review): ?>
                <div class="review mb-4 p-3 border rounded shadow-sm">
                    <strong><?= htmlspecialchars($review->user->name ?? 'Anonymous') ?></strong>
                    <p>Rating: <?= $review->rating ?> / 5</p>
                    <p><?= htmlspecialchars($review->comentariu) ?></p>
                    <small class="text-muted">Posted on: <?= date('d M Y', strtotime($review->data)) ?></small>

                    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $review->user_id): ?>
                        <!-- Buton de ștergere -->
                        <form action="/reviews/delete/<?= $review->id ?>" method="POST" style="display: inline-block;"onsubmit="return confirmDelete()">
                            <input type="hidden" name="_METHOD" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-muted">No reviews yet. Be the first to leave one!</p>
        <?php endif; ?>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Sunteti sigur ca doriti sa stergeti recenzia?");
        }
        document.querySelectorAll('.wishlist-star').forEach(function (star) {
            star.addEventListener('click', function (e) {
                e.preventDefault();
                var form = this.closest('form');
                var productId = form.querySelector('input[name="product_id"]').value;
                var userId = form.querySelector('input[name="user_id"]').value;

                // Verifică dacă steaua este activă (adică produsul este în wishlist)
                var isActive = this.classList.contains('active');

                if (!isActive) {
                    // Adaugă produsul în wishlist
                    this.classList.add('active');
                    form.querySelector('input[name="_method"]').value = 'POST';  // Folosește metoda POST
                    form.action = '/wishlist/store';
                } else {
                    // Elimină produsul din wishlist
                    this.classList.remove('active');
                    form.querySelector('input[name="_METHOD"]').value = 'DELETE';  // Folosește metoda DELETE
                    form.action = '/wishlist/delete/' + productId;
                }

                form.submit();  // Trimite formularul pentru a actualiza wishlist-ul
            });
        });

    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>