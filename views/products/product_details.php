<?php
// Assuming $product contains the product data passed from the controller
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .btn:hover {
            opacity: 0.9;
        }
        .col-md-6, .col-md-12 {
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
    </style>
</head>
<body>

<?php include '../views/navbar.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="product-details">
                <h1><?=$product->nume?></h1>

                <div class="row">
                    <!-- Product Image -->
                    <div class="col-md-6">
                        <div class="image-container">
                            <img src="/uploads/<?=$product->image?>" alt="<?=$product->nume?>" class="img-fluid">
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="col-md-6">
                        <div class="product-info">
                            <p><strong>Description:</strong> <?=$product->descriere?></p>
                            <p><strong>Price:</strong> <?=$product->pret?> Lei</p>
                            <p><strong>Stock:</strong> <?=$product->stoc?> units</p>
                            <p><strong>Category:</strong> <?=$product->categorie->nume?></p>
                            <p><strong>Color:</strong> <?=$product->culoare?></p>
                            <p><strong>Size:</strong> <?=$product->marime?></p>
                            <p><strong>Collection:</strong> <?=$product->colectie?></p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="product-actions">
                            <a href="/products/edit/<?=$product->id?>" class="btn btn-primary">Edit Product</a>
                            <form action="/products/delete/<?=$product->id?>" method="post" style="display:inline;">
                                <input type="hidden" name="_METHOD" value="DELETE"/>
                                <button type="submit" class="btn btn-danger">Delete Product</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
