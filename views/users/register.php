<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include '../views/navbar.php'; ?>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h3>Create an Account</h3>
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
                    <button type="submit" class="btn btn-dark">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
