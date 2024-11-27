<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include '../views/navbar.php'; ?>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <h3>Profile of <?= htmlspecialchars($user->nume) ?> <?= htmlspecialchars($user->prenume) ?></h3>
                <table class="table table-bordered">
                    <tr>
                        <td><strong>First Name:</strong></td>
                        <td><?= htmlspecialchars($user->nume) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Last Name:</strong></td>
                        <td><?= htmlspecialchars($user->prenume) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td><?= htmlspecialchars($user->email) ?></td>
                    </tr>
                </table>
                <a href="/orders/<?= $user->id ?>" class="btn btn-info">View Orders</a>
                <a href="/reviews/<?= $user->id ?>" class="btn btn-warning">View Reviews</a>
                <a href="/wishlists/<?= $user->id ?>" class="btn btn-success">View Wishlist</a>
            </div>
        </div>
    </div>
</body>
</html>
