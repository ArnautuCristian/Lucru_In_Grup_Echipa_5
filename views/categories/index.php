<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f7fb;
            font-family: 'Arial', sans-serif;
        }

        .btn {
            font-size: 1rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: #007bff;
            color: #fff;
            text-align: center;
        }

        .table td {
            text-align: center;
        }

        .table {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .table-bordered td, .table-bordered th {
            border: 1px solid #ddd;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background: linear-gradient(135deg, #ffffff, #f3f4f6);
            margin-bottom: 30px;
            padding: 20px;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            border-radius: 10px;
        }

        .card-body {
            text-align: center;
        }

        .card-footer {
            background-color: #f9f9f9;
            text-align: center;
            padding: 10px;
            border-radius: 10px;
        }

        .row {
            margin-top: 30px;
        }

        .no-categories {
            text-align: center;
            font-size: 1.5rem;
            color: #888;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <?php include '../views/navbar.php'; ?>
    <div class="container">
        <div class="row py-2 justify-content-center h5">
            <h3>List of Categories</h3>
        </div>

        <?php if($categories->count() > 0): ?>
            <div class="row">
                <?php foreach($categories as $category): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <?= htmlspecialchars($category->nume) ?>
                            </div>
                            <div class="card-body">
                                <a href="/categories/edit/<?=$category->id?>" class="btn btn-warning btn-sm">Edit</a>
                                <form action="/categories/delete/<?=$category->id?>" method="post" style="display:inline;">
                                    <input type="hidden" name="_METHOD" value="DELETE"/>
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                            <div class="card-footer">
                                Category ID: <?= $category->id ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="no-categories">
                <p>No categories available</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
