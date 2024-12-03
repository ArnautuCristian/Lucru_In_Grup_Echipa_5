<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Fundal deschis pentru contrast */
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Umbra subtilă */
        }

        .card-body {
            padding: 30px;
        }

        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .profile-info {
            margin-top: 20px;
        }

        .btn-custom {
            width: 31%;
            margin-top: 10px;
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
                <div class="card">
                    <div class="card-body text-center">
                        <!-- Imagine profil -->
                        <img src="https://via.placeholder.com/150" alt="Profile Image" class="profile-img">
                        <h3 class="card-title"><?= htmlspecialchars($user->nume) ?></h3>
                        <p class="text-muted"><?= htmlspecialchars($user->email) ?></p>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Profile Information</h5>
                        <table class="table">
                            <tr>
                                <th>First Name:</th>
                                <td><?= htmlspecialchars($user->nume) ?></td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td><?= htmlspecialchars($user->email) ?></td>
                            </tr>
                        </table>
                        <a href="/users/change-password" class="btn btn-primary btn-custom">Schimba Parola</a>
                    </div>
                </div>

                <!-- Butoane pentru vizualizarea comenzilor, review-urilor și wishlist-ului -->
                <div class="profile-info">
                    <a href="/orders/<?= $user->id ?>" class="btn btn-info btn-custom">View Orders</a>
                    <a href="/reviews/<?= $user->id ?>" class="btn btn-warning btn-custom">View Reviews</a>
                    <a href="/wishlists/<?= $user->id ?>" class="btn btn-success btn-custom">View Wishlist</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
