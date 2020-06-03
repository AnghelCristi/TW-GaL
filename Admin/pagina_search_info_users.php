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

            <button class="buton" onclick="window.location.href='../Admin/pagina_start_admin.html'">Home</button>
            <button class="buton_selected">Info Users</button>
            <button class="buton" onclick="window.location.href='../Admin/pagina_top_users_categorii.php'">Top 10 Users</button>
            <button class="buton" onclick="window.location.href='../Admin/pagina_change_pass.php'">Change password</button>
            <button class="buton" onclick="window.location.href='../Admin/pagina_messages.html'">Messages</button>
            <button class="buton" onclick="window.location.href='../Login/login.view.php'">Logout</button>

        </div>

        <div class="content_dreapta">

            <div class="form">
    
                <form action="pagina_search_info_users.php" method="GET">
                    <label for="user_name">UserName: </label>
                    <input type="text" id="user_name" name="user_name">
                    <input type="submit" value="Search" name="Search">
                </form>

            </div>


            <div class="info_user">
                
                <?php

                    if(empty($_GET['user_name'])==TRUE){
                        
                        echo "<p>Trebuie sa completezi campul</p>";
                    
                    }else{ 

                        if(isset($_GET['Search'])){

                            $username = $_GET['user_name'];

                            //realizam conectiunea cu baza de date
                            $conn = mysqli_connect("localhost", "root", "", "tw_gal");

                            // verificam conectiunea
                            if ($conn->connect_error) {

                            die("Connection failed: " . $conn->connect_error);

                            }

                            //interogarea sql
                            $query = "select u.email,l.id_joc,l.nivel_dificultate,l.puncte from tabela_urseri u,tabela_learn l where l.id_user = u.id_user and email = '".$username."' ";
                            $result = mysqli_query($conn,$query);

                            if ($result->num_rows > 0) {
                                // output interogare
                                $row = $result->fetch_assoc();
                                echo '<h1>Username: '.$row["email"].'</h1>';
                                echo '<div class="info_game"><p>Id_jpc: '.$row["id_joc"].'</p><p>nivel dificultate:'.$row["nivel_dificultate"].'</p><p>puncte: '.$row["puncte"].'</p></div>';
                                
                                while($row = $result->fetch_assoc()) {

                                echo '<div class="info_game"><p>Id_jpc: '.$row["id_joc"].'</p><p>nivel dificultate:'.$row["nivel_dificultate"].'</p><p>puncte: '.$row["puncte"].'</p></div>';
                                
                                }
                                
                            } else { echo "<p>Nu am gasit informatii despre utilizatorul respectiv</p>"; }

                            //inchidem conexiunea
                            $conn->close();
                        }

                    }

                ?>

                
            </div>


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