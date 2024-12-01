<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
        }

        .form-container .form-control {
            border-radius: 10px;
            box-shadow: none;
        }

        .form-container .btn {
            width: 100%;
            font-size: 1.1rem;
            padding: 12px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .form-container .btn-dark {
            background-color: #343a40;
            border: none;
        }

        .form-container .btn-dark:hover {
            background-color: #23272b;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            font-weight: bold;
            color: #555;
        }

        .form-container .mb-3 {
            margin-bottom: 20px;
        }

        .form-container .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .form-container .form-control::placeholder {
            color: #888;
        }

        .form-container .btn-sm {
            width: auto;
            margin-top: 20px;
        }

        .form-container .form-select, .form-control {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <?php include '../views/navbar.php'; ?>
    
    <div class="container">
        <div class="row py-2 justify-content-center h5">
            <h3 class="text-center">Edit Category</h3>
        </div>
        <div class="row">
            <div class="col-md-6 m-auto form-container">
                <!-- Formular pentru editarea categoriei -->
                <form action="/categories/update/<?=$category->id?>" method="post">
                    <input type="hidden" name="_METHOD" value="PUT"/>
                    <div class="mb-3">
                        <label for="nume">Category Name</label>
                        <input type="text" name="nume" id="nume" class="form-control" value="<?=$category->nume?>" placeholder="Enter category name" required>
                    </div>
                    <button type="submit" class="btn btn-dark btn-sm">Update Category</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
