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
            $(".afisare_utilizatori").click(function() {
                $.ajax({
                    url: "all_users.php",
                    success: function(result) {
                        $(".user_name").html(result);
                    }
                });
            });


            $('#form_cautare').on('submit', function(e) {
                //Stop the form from submitting itself to the server.
                e.preventDefault();
                var numeutil = $('#user_name').val();
                $.ajax({
                    type: "GET",
                    url: 'user_info.php',
                    data: {
                        user_name: numeutil
                    },
                    success: function(data) {
                        $(".info_user").html(data);
                    }
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
            <button class="buton_selected">Info Users</button>
            <button class="buton" onclick="window.location.href='../Admin/pagina_top_users_categorii.php'">Top 10 Users</button>
            <button class="buton" onclick="window.location.href='../Admin/pagina_change_pass.php'">Change password</button>
            <button class="buton" onclick="window.location.href='../Admin/pagina_messages.html'">Messages</button>
            <button class="buton" onclick="window.location.href='../Login/login.view.php'">Logout</button>

        </div>

        <div class="content_dreapta">

            <div class="form">

                <form action="pagina_search_info_users.php" method="GET" id="form_cautare">
                    <label for="user_name">UserName: </label>
                    <input type="text" id="user_name" name="user_name">
                    <input type="submit" value="Search" name="Search" #id="Search">
                </form>

                <button class="afisare_utilizatori">Afisare utilizatori</button>

            </div>

            <div class="info_user"></div>
            <div class="user_name"></div><br>


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