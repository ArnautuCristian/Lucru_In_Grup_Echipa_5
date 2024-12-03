<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .btn {
            width: 100px;
            font-size: 0.9rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 20px;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            overflow: hidden;
            background: linear-gradient(135deg, #ffffff, #f3f4f6);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .card-img-top {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 15px 15px 0 0;
            border: 3px solid rgba(0, 0, 0, 0.15);
            border-radius: 15px 15px 0 0;
        }

        .card-body {
            padding: 25px;
            background-color: #fff;
            text-align: center;
            flex: 1;
        }

        .card-title {
            font-size: 1.4rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
            margin-bottom: 20px;
        }

        .d-flex {
            justify-content: space-between;
        }

        .row {
            margin-top: 20px;
        }

        .no-products {
            text-align: center;
            font-size: 1.5rem;
            color: #888;
            margin-top: 40px;
        }

        .card-footer {
            background-color: #f9f9f9;
            padding: 15px;
            border-top: 1px solid #ddd;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 30px;
        }

        .product-container .col-md-4 {
            max-width: 320px;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <?php include '../views/navbar.php'; ?>
    <div class="container">
        <div class="row py-2 justify-content-center h5">
            List of Products
        </div>
        <form action="/products" method="GET" class="container mt-4 mb-4">
            <div class="row">
                <div class="col-md-3">
                    <label for="query" class="form-label">Căutare după nume:</label>
                    <input type="text" name="query" id="query" class="form-control"
                        value="<?= htmlspecialchars($query) ?>" placeholder="Căutați un produs...">
                </div>

                <div class="col-md-3">
                    <label for="categorie_id" class="form-label">Filtrează după categorie:</label>
                    <select name="categorie_id" id="categorie_id" class="form-select">
                        <option value="">Toate categoriile</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category->id ?>" <?= isset($_GET['categorie_id']) && $_GET['categorie_id'] == $category->id ? 'selected' : '' ?>>
                                <?= $category->nume ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-2 mt-4">
                    <button type="submit" class="btn btn-primary w-100">Filtrează</button>
                </div>
            </div>
        </form>


        <div class="product-container">
            <?php if (count($products) > 0): ?>
                <?php foreach ($products as $product): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="/uploads/<?= htmlspecialchars($product->imagine) ?>" alt="Product Image"
                                class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($product->nume) ?></h5>
                                <p class="card-text">
                                    <strong>Description:</strong> <?= htmlspecialchars($product->descriere) ?><br>
                                    <strong>Price:</strong> <?= number_format($product->pret, 2) ?> MLD<br>
                                    <strong>Stock:</strong> <?= $product->stoc ?><br>
                                    <strong>Category:</strong> <?= htmlspecialchars($product->categorie->nume ?? 'N/A') ?><br>
                                    <strong>Color:</strong> <?= htmlspecialchars($product->culoare) ?><br>
                                    <strong>Size:</strong> <?= htmlspecialchars($product->marime) ?><br>
                                    <strong>Collection:</strong> <?= htmlspecialchars($product->colectie) ?>
                                </p>
                                <div class="d-flex justify-content-between">
                                    <a href="/products/edit/<?= $product->id ?>" class="btn btn-warning">Edit</a>
                                    <a href="/products/show/<?= $product->id ?>" class="btn btn-primary">Details</a>
                                    <form action="/products/delete/<?= $product->id ?>" method="POST" class="d-inline"
                                        onsubmit="return confirmDelete()">
                                        <input type="hidden" name="_METHOD" value="DELETE" />
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Added on:
                                    <?= date('d M Y', strtotime($product->created_at)) ?></small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 no-products">
                    <p>No products available</p>
                </div>
            <?php endif; ?>
        </div>


        <script>
            function confirmDelete() {
                return confirm("Esti sigur ca doresti sa stergi acest produs?");
            }
        </script>
</body>

</html>