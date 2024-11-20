<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #333;
            color: white;
        }

        .navbar-brand {
            font-size: 20px;
            color: white;
            text-decoration: none;
        }

        .navbar-buttons a {
            margin-left: 10px;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-primary:hover,
        .btn-secondary:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <a href="#" class="navbar-brand">Clothing Store</a>
            <div class="navbar-buttons">
                <a href="/login" class="btn btn-primary">Logare</a>
                <a href="/register" class="btn btn-secondary">Înregistrare</a>
            </div>
        </div>
    </nav>
</body>

</html>