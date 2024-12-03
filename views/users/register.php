<?php
$error = isset($_GET['error']) ? $_GET['error'] : null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

        .btn-dark {
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
                        <h3 class="text-center mb-4">Create an Account</h3>

                        <!-- Mesaj de eroare -->
                        <?php if ($error === 'email_taken'): ?>
                            <div class="alert alert-danger text-center" role="alert">
                                The email address is already in use. Please try another one.
                            </div>
                        <?php endif; ?>

                        <form action="/users/register" method="post">
                            <div class="mb-3">
                                <label for="nume" class="form-label">First Name</label>
                                <input type="text" name="nume" id="nume" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="parola" class="form-label">Password</label>
                                <input type="password" name="parola" id="parola" class="form-control" required>
                            </div>

                            <?php if (isset($_SESSION['user_id']) && User::find($_SESSION['user_id'])->isAdmin()): ?>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" id="role" class="form-select">
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            <?php endif; ?>

                            <button type="submit" class="btn btn-dark">Register</button>
                        </form>
                        <p class="mt-3 text-center">Already have an account? <a href="/users/login">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>