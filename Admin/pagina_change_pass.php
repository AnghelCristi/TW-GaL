<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="admin_page.css" rel="stylesheet" type="text/css">
    <title>GaL</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        function submitFormAjax() {
            var pinfo = document.getElementById("paragraf");
            let xmlhttp = window.XMLHttpRequest ?
                new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");

            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200)
                    pinfo.innerHTML = xmlhttp.responseText;
                    console.log(xmlhttp.responseText);
            }

            let user_name = document.getElementById('user_name').value;
            let password = document.getElementById('password').value;
            console.log(user_name);
            console.log(password);

            xmlhttp.open("POST", "change_pass.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("user_name=" + user_name + "&password=" + password);
        }


        window.onload = function() {
            document.getElementById("modify").addEventListener("click", function(event) {
                event.preventDefault();
                submitFormAjax();
            });

        };
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
            <button class="buton" onclick="window.location.href='../Admin/pagina_top_users_categorii.php'">Top 10 Users</button>
            <button class="buton_selected">Change password</button>
            <button class="buton" onclick="window.location.href='../Login/login.view.php'">Logout</button>
        </div>

        <div class="content_dreapta">

            <h1>Schimbare parola user/admin</h1>

            <div class="form">

                <form action="pagina_change_pass.php" method="POST" id="form_changepass">
                    <label for="user_name">Username: </label><br><br>
                    <input type="text" id="user_name" name="user_name"><br><br>
                    <label for="password">New Password: </label><br><br>
                    <input type="password" id="password" name="password"><br><br>
                    <input type="submit" value="Modify" name="Modify" id="modify">
                </form>

            </div>

            <p id="paragraf"></p>
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