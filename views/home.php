<!-- views/home.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            padding: 50px;
        }
        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 300px;
            margin: 0 auto;
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
        }
        a {
            color: #007bff;
            font-weight: bold;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Bine ati venit pe Website-ul noustru!</h1>
        <p>Pentru a utiliza pe deplin toate serviciile noastre, trebuie să vă creați un cont sau sa intrati in contul vostru existen.Faceți clic mai jos pentru a vă înregistra sau loga in cont.</p>
        <a href="/users/register" class="btn btn-primary btn-sm">Creaza un Cont</a>
        <a href="/users/login" class="btn btn-success btn-sm">Intra in Cont</a>
    </div>

</body>
</html>
