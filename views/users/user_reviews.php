<?php
session_start(); // Asigură-te că sesiunea este activată pentru gestionarea sesiunii utilizatorului

// Încearcă să obții recenziile utilizatorului din controller
// Presupunem că $reviews este deja disponibil în vizualizare

// Dacă recenziile nu au fost transmise corect, poți seta o valoare implicită
$reviews = $reviews ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Reviews</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 30px;
        }
        .table th {
            background-color: #343a40;
            color: white;
        }
        .table td {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <?php include '../views/navbar.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Recenziile mele</h3>

                <?php if (count($reviews) > 0): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Rating</th>
                                <th>Comment</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($reviews as $review): ?>
                                <tr>
                                    <!-- Asigură-te că ai acces la numele produsului asociat -->
                                    <td><?= htmlspecialchars($review->product->name) ?></td> <!-- Aici presupunem că ai definit corect relația product -->
                                    <td><?= htmlspecialchars($review->rating) ?> stars</td>
                                    <td><?= htmlspecialchars($review->comentariu) ?></td>
                                    <td><?= htmlspecialchars($review->data) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No reviews found for this user.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
