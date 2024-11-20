<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form action="/register" method="post">
        <label for="nume">Nume</label>
        <input type="text" id="nume" name="nume" required>

        <label for="prenume">Prenume</label>
        <input type="text" id="prenume" name="prenume" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Parolă</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Înregistrare</button>
    </form>

</body>

</html>