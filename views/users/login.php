<?php 
$error = isset($_GET['error']) ? $_GET['error'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 30px;
        }
        .btn-primary {
            width: 100%;
        }
        .form-label {
            font-weight: 600;
        }
        .mt-3 {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <?php include '../views/navbar.php'; ?>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-4">Login</h3>
                        
                        <!-- Mesaj de eroare -->
                        <?php if ($error === 'invalid_credentials'): ?>
                            <div class="alert alert-danger text-center" role="alert">
                                Invalid email or password. Please try again.
                            </div>
                        <?php endif; ?>

                        <form action="/users/login" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="parola" class="form-label">Password</label>
                                <input type="password" name="parola" id="parola" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                        <p class="mt-3 text-center">Don't have an account? <a href="/users/register">Register here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
