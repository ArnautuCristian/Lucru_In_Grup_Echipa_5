<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
<form action="/login" method="post">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>
    
    <label for="password">Parolă</label>
    <input type="password" id="password" name="password" required>
    
    <button type="submit">Autentificare</button>
</form>

</body>

</html>