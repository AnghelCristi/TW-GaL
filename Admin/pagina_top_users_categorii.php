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
            <button class="buton" onclick=window.location.href='pagina_info_users.php'>Info Users</button>
            <button class="buton_selected">Top 10 Users</button>
            <button class="buton" onclick=window.location.href='pagina_change_pass.php'>Change password</button>
            <button class="buton" onclick=window.location.href='pagina_messages.html'>Messages</button>
            <button class="buton" >Logout</button>

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
                    <input type="submit" value="Search" name="Search">
                </form>

            </div>

            <?php

                if(isset($_GET['select_tip'])){

                    $selectoption = $_GET['select_tip'];

                    //realizam conectiunea cu baza de date
                    $conn = mysqli_connect("localhost", "root", "", "tw_gal");

                    // verificam conectiunea
                    if ($conn->connect_error) {

                    die("Connection failed: " . $conn->connect_error);

                    }

                    //interogarea sql
                    $query = "select u.email,j.nume_joc,l.puncte from tabela_jocuri j,tabela_urseri u,tabela_learn l where j.id_joc = l.id_joc and l.id_user = u.id_user and tip_joc = '".$selectoption."' ";
                    $result = mysqli_query($conn,$query);

                    if ($result->num_rows > 0) {
                        // output interogare
                        while($row = $result->fetch_assoc()) {
                            echo '<div class ="info_user"><div class="info_game"><p>Nume: '.$row["email"].'</p><p>joc :'.$row["nume_joc"].'</p><p>puncte: '.$row["puncte"].'</p></div></div>';
                        }
                    }else { echo "<p>Nu avem utilizatori la aceasta categorie<p>"; }


                    //inchidem conexiunea
                    $conn->close();

                }

            ?>

        

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