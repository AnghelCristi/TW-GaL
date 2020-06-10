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
            var pinfo = document.getElementById("topcategorii");
            let xmlhttp = window.XMLHttpRequest ?
                new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");

            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200)
                    pinfo.innerHTML = xmlhttp.responseText;
                    //console.log(xmlhttp.responseText);
                }

            let tipuri = document.getElementById('tipuri').value;
            console.log(tipuri);

            xmlhttp.open("GET", "search_categorii.php?tipuri=" + tipuri, true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send();
        }


        window.onload = function() {
            document.getElementById("tipuri").addEventListener("change", function(event) {
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
            <button class="buton_selected">Top 10 Users</button>
            <button class="buton" onclick="window.location.href='../Admin/pagina_change_pass.php'">Change password</button>
            <button class="buton" onclick="window.location.href='../Login/login.view.php'">Logout</button>

        </div>

        <div class="content_dreapta">

            <div class="form">

                <form action="pagina_top_users_categorii.php" method="GET">
                    <label for="tipuri">Categorie joc: </label>
                    <select name="tipuri" id="tipuri">
                        <option value="Strategie">Strategie</option>
                        <option value="Carti">Carti</option>
                        <option value="boardgame">Board game</option>
                    </select>
                </form>


            </div><br>

            <div class="top_categorii" id="topcategorii"></div>


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