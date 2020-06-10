<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../user.css">
    <title>GaL - Learn</title>
</head>

<body>

    <header>
        <h3 class="game-name">GaL</h3>
    </header>

    <div class="content">
        <nav>
            <ul>
                <li>
                    <button class="nav-button button-selected" onclick="window.location.href='learn.view.php'">
                        Learn about a game
                    </button>
                </li>

                <li>
                    <button class="nav-button" onclick="window.location.href='../Test/test.view.php'">
                        Test your knowledge
                    </button>
                </li>

                <li>
                    <button class="nav-button" onclick="window.location.href='../MyAccount/my-account.view.php'">
                        My account
                    </button>
                </li>

                <li>
                    <button class="nav-button" onclick="window.location.href='../Leaderboard/leaderboard.view.php'">
                        Leaderboard
                    </button>
                </li>

                <li>
                    <button class="nav-button" onclick="window.location.href='../../Login/login.view.php'">
                        Logout
                    </button>
                </li>
            </ul>
        </nav>


        <?php
        $cookie_name = "game_name";
        $cookie_value = "macao";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        ?>

        <main>

            <form action="#" method="POST">
                <label for="difficulty">Choose a difficulty:</label>
                <select name="difficulty" id="difficulty">
                    <option value="easy">Easy</option>
                    <option value="medium">Medium</option>
                    <option value="hard">Hard</option>
                </select>
                <input type="submit" value="Search" name="search">
            </form>


            <?php
            include_once 'learn.model.php';
            $questions = getQuestions("macao", $_POST['difficulty']);
            foreach ($questions as $q) {
                echo '<div class="info">
                <form action="learn.controller.php" method="POST">
                <button type="submit" name="mark-as-read" class="mark-as-read">
                    <img src="../tick.jpg" alt="Mark as read">
                </button> </form>' . $q . '</div>';
            }
            ?>


        </main>
    </div>



    <!-- <footer>
        <p class="developers">Developers:</p>
        <button class="nav-button" onclick=window.location.href='https://www.facebook.com/cristi.anghel.10'>Anghel-Marius
            Cristi</button>
        <button class="nav-button" onclick=window.location.href='https://www.facebook.com/galatanu.mirceaandrei'>Galatanu
            Mircea Andrei</button>
        <button class="nav-button" onclick=window.location.href='https://www.facebook.com/felix.hugeanu'>Felix
            Hugeanu</button>
    </footer> -->

</body>

</html>