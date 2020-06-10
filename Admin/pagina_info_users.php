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
            var divinfo = document.getElementById("infouser");
            let xmlhttp = window.XMLHttpRequest ?
                new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");

            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200)
                    divinfo.innerHTML = xmlhttp.responseText;
            }

            let name = document.getElementById('user_name').value;

            xmlhttp.open("GET", "user_info.php?user_name=" + name, true);
            xmlhttp.send();
        }


        window.onload = function() {
            (function() {
                var httpRequest;
                var element = document.getElementById("afisareutil");
                element.addEventListener('click', makeRequest);

                function makeRequest()  {
                    httpRequest = new XMLHttpRequest();

                    if (!httpRequest) {
                        alert('Cannot create an XMLHTTP instance');
                        return false;
                    }
                    httpRequest.onreadystatechange = alertContents;
                    httpRequest.open('GET', 'all_users.php');
                    httpRequest.send();
                }

                function alertContents() {
                    if (httpRequest.readyState === XMLHttpRequest.DONE) {
                        if (httpRequest.status === 200) {
                            var div = document.getElementById("username");
                            div.innerHTML = httpRequest.responseText;
                        } else {
                            alert('There was a problem with the request.');
                        }
                    }
                }

            })();

            document.getElementById("Search").addEventListener("click", function(event) {
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
            <button class="buton_selected">Info Users</button>
            <button class="buton" onclick="window.location.href='../Admin/pagina_top_users_categorii.php'">Top 10 Users</button>
            <button class="buton" onclick="window.location.href='../Admin/pagina_change_pass.php'">Change password</button>
            <button class="buton" onclick="window.location.href='../Login/login.view.php'">Logout</button>

        </div>

        <div class="content_dreapta">

            <div class="form">

                <form action="pagina_info_users.php" method="GET" id="form_cautare">
                    <label for="user_name">UserName: </label>
                    <input type="text" id="user_name" name="user_name">
                    <input type="submit" value="Search" name="Search" id="Search">
                </form>

                <button class="afisare_utilizatori" id="afisareutil">Afisare utilizatori</button>
            </div>

            <div class="info_user" id="infouser"></div>
            <div class="user_name" id="username"></div><br>


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