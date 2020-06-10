<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css">
    <title>GAL - Login</title>
</head>

<body>
    <div class="welcome">
        <h3>GaL </h3>
    </div>
    <main>
        <form action="login.controller.php" method="POST">
            <label for="email_1"></label>
            <input type="email" class="form-field" name="email" id="email_1" placeholder="Email" required>

            <label for="password_1"></label>
            <input type="password" class="form-field" name="password" placeholder="Parola" required>

            <input type="submit" class="form-button" name="submit" id="password_1" value="Login">
        </form>

        <form action="login.controller.php" method="POST">
            <label for="email_2"></label>
            <input type="email" class="form-field" name="email" id="email_2" placeholder="Email" required>

            <label for="password_2"></label>
            <input type="password" class="form-field" name="password" id="password_2" placeholder="Parola" required>

            <input type="submit" class="form-button" name="submit" value="Register">
        </form>
    </main>
</body>

</html>