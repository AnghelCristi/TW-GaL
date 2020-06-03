<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../user.css">
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
                    <button class="nav-button button-selected" onclick=window.location.href="../learn.view.php">
                        Learn about a game
                    </button>
                </li>

                <li>
                    <button class="nav-button" onclick=window.location.href="../../Test/test.view.php">
                        Test your knowledge
                    </button>
                </li>

                <li>
                    <button class="nav-button" onclick=window.location.href="../../MyAccount/my-account.view.php">
                        My account
                    </button>
                </li>

                <li>
                    <button class="nav-button" onclick=window.location.href="../../Leaderboard/leaderboard.view.php">
                        Leaderboard
                    </button>
                </li>

                <li>
                    <button class="nav-button" onclick=window.location.href="../../../Login/login.view.php">
                        Logout
                    </button>
                </li>
            </ul>
        </nav>


        <main>
            <div class="info">
                <button type="submit" class="mark-as-read" onclick=window.location.href="../learn.controller.php">
                    <img src="../../tick.jpg" alt="Mark as read">
                </button>
                Câștigătorul este acela care rămâne primul fără cărți în mână. Când doi, trei sau patru oameni joacă,
                ultimul jucător care mai are cărți în mână pierde jocul. Când cinci sau șase oameni joacă, jocul
                este oprit atunci când al treilea om termină jocul.
            </div>


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