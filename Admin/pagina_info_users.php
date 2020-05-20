<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="admin_page.css" rel="stylesheet" type="text/css">
    <title>GaL</title>
</head>
<body>

    <header>

        <p class="paragraf">GaL</p>

    </header>


    <main>

        <div class="content_stanga">

            <button class="buton" onclick=window.location.href='pagina_start_admin.html'>Home</button>
            <button class="buton_selected">Info Users</button>
            <button class="buton" onclick=window.location.href='pagina_top_users_categorii.php'>Top 10 Users</button>
            <button class="buton" onclick=window.location.href='pagina_change_pass.php'>Change password</button>
            <button class="buton" onclick=window.location.href='pagina_messages.html'>Messages</button>
            <button class="buton">Logout</button>

        </div>

        <div class="content_dreapta">

            <div class="form">
    
                <form action="pagina_search_info_users.php" method="GET">
                    <label for="user_name">UserName: </label>
                    <input type="text" id="user_name" name="user_name">
                    <input type="submit" value="Search" name="Search">
                </form>

                <p>Utilizatori:</p>

            </div>


            <div class="user_name">


                <?php

                    //realizam conectiunea cu baza de date
                    $conn = mysqli_connect("localhost", "root", "", "tw_gal");

                    // verificam conectiunea
                    if ($conn->connect_error) {

                    die("Connection failed: " . $conn->connect_error);

                    }

                    //interogarea sql
                    $sql = "SELECT email FROM tabela_urseri";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    
                        // output interogare
                        while($row = $result->fetch_assoc()) {
                        
                            echo "<div><h1>".$row["email"]."</h1></div>";
                        }
                    } else { echo "Nu sunt utilizatori"; }

                //inchidem conexiunea
                $conn->close();

                ?>
                

            </div>


        </div>

    </main>

    <footer>
    
    <p>Developers:</p>
    <button class="buton" onclick=window.location.href='https://www.facebook.com/cristi.anghel.10'>Anghel-Marius Cristi</button>
    <button class="buton" onclick=window.location.href='https://www.facebook.com/galatanu.mirceaandrei'>Galatanu Mircea Andrei</button>
    <button class="buton" onclick=window.location.href='https://www.facebook.com/felix.hugeanu'>Felix Hugeanu</button>

    </footer>
    
</body>
</html>