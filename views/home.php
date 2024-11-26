<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazin Online de Vestimentație</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        
        body {
            background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
            font-family: Arial, sans-serif;
        }

        .hero-section {
            background: url('https://via.placeholder.com/1920x400?text=Welcome+to+MyClothingStore') center/cover no-repeat;
            height: 600px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero-section p {
            font-size: 1.3rem;
            margin-top: 10px;
        }

        .content-section {
            text-align: center;
            margin-top: 30px;
        }

        .footer {
            margin-top: 57px;
        }
    </style>
</head>
<body>
    <?php include '../views/navbar.php'?> 
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="text-center">
            <h1>Bine ați venit la MyClothingStore!</h1>
            <p>Cea mai bună alegere pentru vestimentația dumneavoastră!</p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="content-section container">
        <h2 class="text-primary">Aceasta este pagina principală</h2>
        <p class="lead">Pentru a vizualiza produsele noastre, vă rugăm să vă autentificați sau să vă înregistrați.</p>
        <div class="d-flex justify-content-center">
            <a href="#" class="btn btn-outline-primary btn-lg me-3">Login</a>
            <a href="#" class="btn btn-primary btn-lg">Register</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer bg-light text-center py-3 shadow-sm">
        <p>&copy; 2024 MyClothingStore. Toate drepturile rezervate.</p>
    </footer>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
