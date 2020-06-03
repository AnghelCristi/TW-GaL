<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../user.css">
    <title>GaL - My account</title>
</head>

<body>

    <header>
        <h3 class="game-name">GaL</h3>
    </header>

    <div class="content">
        <nav>
            <ul>
                <li>
                    <button class="nav-button button" onclick=window.location.href="../Learn/learn.view.php">
                        Learn about a game
                    </button>
                </li>

                <li>
                    <button class="nav-button" onclick=window.location.href="../Test/test.view.php">
                        Test your knowledge
                    </button>
                </li>

                <li>
                    <button class="nav-button button-selected" onclick=window.location.href="../MyAccount/my-account.view.php">
                        My account
                    </button>
                </li>

                <li>
                    <button class="nav-button" onclick=window.location.href="../Leaderboard/leaderboard.view.php">
                        Leaderboard
                    </button>
                </li>

                <li>
                    <button class="nav-button" onclick=window.location.href="../../Login/login.view.php">
                        Logout
                    </button>
                </li>
            </ul>
        </nav>

        <main>
            <form>
                <label for="password">New Password: </label><br><br>
                <input type="password" id="password" name="password"><br><br>
                <input type="button" value="Modify" onclick=window.location.href='my-account.html'>
            </form>
        </main>
    </div>
</body>

</html>