<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="admin_page.css" rel="stylesheet" type="text/css">
    <title>GaL</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tipuri').change(function() {
                console.log("se schimba");
                var select = $('#tipuri').val();
                console.log(select);
                $.ajax({
                    type: 'GET',
                    url: 'search_categorii.php',
                    data: {
                        tipuri: select
                    },
                    success: function(data) {
                        $(".top_categorii").html(data);
                    },
                });

            });
        });
    </script>

</head>

<body>

    <header>

        <p class="paragraf">GaL</p>

    </header>


    <main>

        <div class="content_stanga">

            <button class="buton" onclick="window.location.href='../Admin/pagina_start_admin.html'">Home</button>
            <button class="buton" onclick="window.location.href='../Admin/pagina_info_users.php'">Info Users</button>
            <button class="buton_selected">Top 10 Users</button>
            <button class="buton" onclick="window.location.href='../Admin/pagina_change_pass.php'">Change password</button>
            <button class="buton" onclick="window.location.href='../Admin/pagina_messages.html'">Messages</button>
            <button class="buton" onclick="window.location.href='../Login/login.view.php'">Logout</button>

        </div>

        <div class="content_dreapta">

            <div class="form">

                <form action="pagina_top_users_categorii.php" method="GET">
                    <label for="Categorie_joc">Categorie joc: </label>
                    <select id="tipuri" name="select_tip">
                        <option value="Strategie">Strategie</option>
                        <option value="Carti">Carti</option>
                        <option value="boardgame">Board game</option>
                    </select>
                </form>

            </div><br>

            <div class="top_categorii"></div>


        </div>


    </main>

    <footer>

        <p>Developers:</p>

        <button class="buton" onclick="window.location.href='https://www.facebook.com/cristi.anghel.10'">Anghel-Marius Cristi</button>
        <button class="buton" onclick="window.location.href='https://www.facebook.com/galatanu.mirceaandrei'">Galatanu Mircea Andrei</button>
        <button class="buton" onclick="window.location.href='https://www.facebook.com/felix.hugeanu'">Felix Hugeanu</button>

    </footer>

</body>

</html>