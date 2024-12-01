<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Store</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .nav-link {
            font-size: 1.1rem;
        }

        .btn {
            margin-left: 10px;
        }
        .container{
            margin-top: 0;
            width: 1320px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <!-- Denumirea magazinului -->
            <a class="navbar-brand" href="#">MyClothingStore</a>
            <!-- Buton pentru meniul responsive -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Meniurile principale -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categories">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/products/create">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categories/create">Create Category</a>
                    </li>
                </ul>
                <!-- Butoanele Login și Register -->
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="/users/profile/<?= $_SESSION['user_id'] ?>" class="btn btn-primary ">Profile</a>
                    <a href="/users/logout" class="btn btn-outline-danger">Logout</a>
                <?php else: ?>
                    <div class="d-flex">
                        <a href="/users/login" class="btn btn-outline-primary ">Login</a>
                        <a href="/users/register" class="btn btn-primary ml-1">Register</a>
                    </div>
                <?php endif; ?>


            </div>
        </div>
    </nav>
</body>

</html>